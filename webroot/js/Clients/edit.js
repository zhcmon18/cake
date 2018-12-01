$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter
    $('#subscription-id').on('change', function () {
        var subscriptionId = $(this).val();
        if (subscriptionId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'subscription_id=' + subscriptionId,
                success: function (promotions) {
                    $select = $('#promotion-id');
                    $select.find('option').remove();
                    $.each(promotions, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#promotion-id').html('<option value="">Select Subscription first</option>');
        }
    });
});