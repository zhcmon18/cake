<?php
$urlToRestApi = $this->Url->build('/api/subscriptions', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Subscriptions/index', ['block' => 'scriptBottom']);
echo $this->Html->css([
    'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
    'Subscriptions/basic.css'
]);

?>
<div class="container">
    <div class="row">
        <div class="panel panel-default subscriptions-content">
            <div class="panel-heading">Subscriptions <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Subscription</h2>
                <form class="form" id="subscriptionAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="subscriptionAction('add')">Add Subscription</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Subscription" -->
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Subscription</h2>
                <form class="form" id="subscriptionEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="nameEdit"/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="subscriptionAction('edit')">Update Subscription</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Subscription" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="subscriptionData">
                <?php
                $count = 0;
                foreach ($subscriptions as $subscription): $count++;
                    ?>
                    <tr>
                        <td><?php echo '#' . $count; ?></td>
                        <td><?php echo $subscription['name']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editSubscription('<?php echo $subscription['id']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? subscriptionAction('delete', '<?php echo $subscription['id']; ?>') : false;"></a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
                <tr><td colspan="5">No subscription(s) found......</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>