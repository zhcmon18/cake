var onloadCallback = function() {
    widgetId1 = grecaptcha.render('captcha', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};

var app = angular.module('app',[]);

var logIn = '<a href="javascript:void(0);" style="text-decoration: none; font-size: 1.2em;" id="login-btn" ' +
    'onclick="javascript:$(\'#loginForm\').slideToggle();"><span class="glyphicon glyphicon-log-in"></span> Login</a>';

var logOut = '<a href="javascript:void(0);" style="text-decoration: none; font-size: 1.2em;" id="login-btn" ' +
    'onclick="javascript:$(\'#changeForm\').slideToggle();"><span class="glyphicon glyphicon-log-out"></span> Logout or Change password</a>';

app.controller('usersCtrl', function ($scope, $compile, $http) {

    $scope.login = function () {

        if (grecaptcha.getResponse(widgetId1) == '') {
            $scope.captcha_status = 'Please verify captha.';
            return;
        }

        var req = {
            method: 'POST',
            url: 'api/users/token',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {username: $scope.username, password: $scope.password}
        }
        // fields in key-value pairs
        $http(req)
            .success(function (jsonData, status, headers, config) {

                localStorage.setItem('token', jsonData.data.token);
                localStorage.setItem('user_id', jsonData.data.id);

                // Switch button for Logout
                $('#logDiv').html(
                    $compile(logOut)($scope)
                );

                emptyInput();

                $('#loginForm').slideUp();

                $scope.messageLogin = 'Welcome!';
                $scope.errorLogin = '';
            })

            .error(function (data, status, headers, config) {
                $scope.messageLogin = '';
                $scope.errorLogin = 'Invalid credentials';
            });

    }

    $scope.logout = function () {
        localStorage.setItem('token', "no token");

        // Switch button for Login
        $('#logDiv').html(
            $compile(logIn)($scope)
        );

        $('#changeForm').slideUp();
        $scope.messageLogin = 'You have logged out';
        $scope.errorLogin = '';
        grecaptcha.reset();

    }
    $scope.changePassword = function () {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem("user_id"),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            },
            data: {'password': $scope.newPassword}
        }
        $http(req)
            .success(function (response) {
                $('#changeForm').slideUp();
                $scope.messageLogin = 'Password successfully changed! ';
                emptyInputPass();
            })
            .error(function (response) {
                $scope.errorLogin = 'Impossible to change the password!';

            });
    };
});


app.controller('SubscriptionCRUDCtrl', ['$scope','SubscriptionCRUDService', function ($scope,SubscriptionCRUDService) {

    $scope.updateSubscription = function () {
        SubscriptionCRUDService.updateSubscription($scope.subscription.id,$scope.subscription.name)
            .then(function success(response){
                    $scope.getAllSubscriptions();
                    $scope.message = 'Subscription data updated!';
                    $scope.errorMessage = '';
                },
                function error(response){
                    $scope.errorMessage = 'Error updating subscription!';
                    $scope.message = '';
                });
    };

    $scope.getSubscription = function (id) {

        if (localStorage.getItem("token") === "no token") {
            $scope.errorMessage = 'Please login';
            $scope.message = '';
        } else {
            SubscriptionCRUDService.getSubscription(id)
                .then(function success(response) {
                        $('#editForm').slideDown();
                        $scope.subscription = response.data.data;
                        $scope.subscription.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                    function error(response) {
                        $scope.message = '';
                        if (response.status === 404) {
                            $scope.errorMessage = 'Subscription not found!';
                        }
                        else {
                            $scope.errorMessage = "Error getting subscription!";
                        }
                    });
        }
    };

    $scope.addSubscription = function () {
        if (localStorage.getItem('token') === 'no token') {
            $scope.errorMessage = 'Please login';
            $scope.message = '';
        } else {
            if ($scope.subscription != null && $scope.subscription.name) {

                SubscriptionCRUDService.addSubscription($scope.subscription.name)
                    .then (function success(response){
                            $scope.getAllSubscriptions();
                            $scope.message = 'Subscription added!';
                            $scope.errorMessage = '';
                        },
                        function error(response){
                            $scope.errorMessage = 'Error adding subscription!';
                            $scope.message = '';
                        });
            }
            else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

    };


    $scope.deleteSubscription = function (id) {

        if (localStorage.getItem('token') === 'no token') {
            $scope.errorMessage = 'Please login';
            $scope.message = '';
        } else {
            // ask the user if he is sure to delete the record
            if (confirm('Are you sure?')) {
                SubscriptionCRUDService.deleteSubscription(id)
                    .then (function success(response){
                            $scope.getAllSubscriptions();
                            $scope.message = 'Subscription deleted!';
                            $scope.subscription = null;
                            $scope.errorMessage='';
                        },
                        function error(response){
                            //$scope.errorMessage = 'Error deleting subscription!';
                            $scope.message='';
                        });
            }
        }

    };

    $scope.getAllSubscriptions = function () {
        SubscriptionCRUDService.getAllSubscriptions()
            .then(function success(response){
                    $scope.subscriptions = response.data.data;
                    //$scope.message=''
                    $scope.errorMessage = '';
                },
                function error (response ){
                    $scope.message='';
                    $scope.errorMessage = 'Error getting subscriptions!';
                });
    };

}]);

app.service('SubscriptionCRUDService',['$http', function ($http) {

    //'use strict';
    this.getSubscription = function getSubscription(subscriptionId){

        return $http({
            method: 'GET',
            url: 'api/subscriptions/'+ subscriptionId,
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    };

    this.addSubscription = function addSubscription(name){
        return $http({
            method: 'POST',
            url: 'api/subscriptions',
            data: {name:name},
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    };

    this.deleteSubscription = function deleteSubscription(id){
        return $http({
            method: 'DELETE',
            url: 'api/subscriptions/'+id,
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    };

    this.updateSubscription = function updateSubscription(id,name){
        return $http({
            method: 'PATCH',
            url: 'api/subscriptions/'+id,
            data: {name:name},
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    };

    this.getAllSubscriptions = function getAllSubscriptions(){
        return $http({
            method: 'GET',
            url: 'api/subscriptions',
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    };

}]);

$(document).ready(function () {
    localStorage.setItem('token', "no token");
    $('#changePass').hide();
});

function emptyInput() {
    $('#password').val('');
    $('#username').val('');
    emptyInputPass();
};

function emptyInputPass() {
    $('#form-password').val('');
};


