function getSubscriptions() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
            function (subscriptions) {
                var subscriptionTable = $('#subscriptionData');
                subscriptionTable.empty();
                var count = 1;
                $.each(subscriptions.data, function (key, value)
                {
                    var editDeleteButtons = '</td><td>' +
                        '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editSubscription(' + value.id + ')"></a>' +
                        '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? subscriptionAction(\'delete\', ' + value.id + ') : false;"></a>' +
                        '</td></tr>';
                    subscriptionTable.append('<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + editDeleteButtons);
                    count++;
                });

            }
    });
}

/* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

function subscriptionAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var subscriptionData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        subscriptionData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        id = document.getElementById("idEdit").value;
        ajaxUrl = ajaxUrl + "/" + id;
        subscriptionData = convertFormToJSON($("#editForm").find('.form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(subscriptionData),
        success: function (msg) {
            if (msg) {
                alert('Subscription data has been ' + statusArr[type] + ' successfully.');
                getSubscriptions();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

function editSubscription(id) {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi + '/' + id,
        success: function (data) {
            $('#idEdit').val(data.data.id);
            $('#nameEdit').val(data.data.name);
            $('#editForm').slideDown();
        }
    });
}