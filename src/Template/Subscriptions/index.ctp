<?php
$urlToRestApi = $this->Url->build('/api/subscriptions', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->css([
    'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
    'Subscriptions/basic.css'
]);

?>
<script
    src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js">
</script>
<?php $this->Html->script('Subscriptions/index', ['block' => 'scriptBottom']); ?>

<div class="container" ng-app = "app" >

    <div class="row">

        <div class="panel panel-default subscriptions-content">

            <div ng-controller = "usersCtrl">

                <div id="logDiv" style="margin: 10px 0 20px 0;"><a href="javascript:void(0);" class="glyphicon glyphicon-log-in" id="login-btn" onclick="javascript:$('#loginForm').slideToggle();">Login</a></div>

                <div class="none formData" id="loginForm">
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>Username</label>
                            <input ng-model="username" type="text" class="form-control" id="username" name="username" style="width: 250px" />
                            <label>Password</label>
                            <input ng-model="password" type="password" class="form-control" id="password" name="password"  style="width: 250px"/>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#loginForm').slideUp(); emptyInput();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="login()">Submit</a>
                    </form>
                </div>

                <div class="panel-body none formData" id="changeForm">
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>New password</label>
                            <input ng-model="newPassword" type="password" class="form-control" id="form-password" name="form-password" style="width: 250px" />
                        </div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#changeForm').slideUp(); emptyInput();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="changePassword()">Submit</a>
                        <a href="javascript:void(0);" class="btn btn-warning" ng-click="logout()">Logout</a>
                    </form>
                </div>
                <br>
                <div>
                    <p style="color: green;">{{messageLogin}}</p>
                    <p style="color: red;">{{errorLogin}}</p>
                </div>
                <br>

            </div>

            <div class="panel-heading">Subscriptions <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>

            <div ng-controller = "SubscriptionCRUDCtrl">

                <div class="panel-body none formData" id="addForm">
                    <h2 id="actionLabel">Add Subscription</h2>
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" ng-model="subscription.name"/>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="addSubscription(subscription.name)">Add Subscription</a>

                    </form>
                </div>

                <div class="panel-body none formData" id="editForm">
                    <h2 id="actionLabel">Edit Subscription</h2>
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" ng-model="subscription.name"/>
                        </div>
                        <input type="hidden" id="id" ng-model="subscription.id" />
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="updateSubscription(subscription.id, subscription.name)">Update Subscription</a>

                    </form>
                </div>

                <br />
                <p style="color: green">{{message}}</p>
                <p style="color: red">{{errorMessage}}</p>
                <br />

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody ng-init="getAllSubscriptions()">
                    <tr ng-repeat="sub in subscriptions">
                        <td>{{sub.id}}</td>
                        <td>{{sub.name}}</td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit"  ng-click="getSubscription(sub.id)"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" ng-click="deleteSubscription(sub.id)"></a>
                        </td>
                    </tr>
                    <tr><td colspan="5">No subscription(s) found......</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
