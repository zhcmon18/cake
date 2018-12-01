<?php
$urlToRestApi = $this->Url->build('/api/subscriptions', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
//echo $this->Html->script('Subscriptions/index', ['block' => 'scriptBottom']);
?>
<script
        src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js">
</script>
<script src="webroot/js/Subscriptions/index.js"></script>

<div class="container">
    <div class="row">
        <div class="panel panel-default subscriptions-content">
            <div ng-app = "app" ng-controller = "SubscriptionCRUDCtrl">
                <table>
                    <tr>
                        <td width="100">ID:</td>
                        <td><input type="text" id="id" ng-model="subscription.id" /></td>
                    </tr>
                    <tr>
                        <td width="100">Name:</td>
                        <td><input type="text" id="name" ng-model="subscription.name"/></td>
                    </tr>
                </table>
                <br /> <br />
                <a ng-click="getSubscription(subscription.id)">Get Subscription</a>
                <a ng-click="updateSubscription(subscription.id,subscription.name)">Update Subscription</a>
                <a ng-click="addSubscription(subscription.name)">Add Subscription</a>
                <a ng-click="deleteSubscription(subscription.id)">Delete Subscription</a>

                <br /> <br />
                <p style="color: green">{{message}}</p>
                <p style="color: red">{{errorMessage}}</p>

                <br />
                <br />
                <a ng-click="getAllSubscriptions()">Get all Subscriptions</a><br />
                <br /> <br />
                <div ng-repeat="subscription in subscriptions">
                    {{subscription.name}}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>