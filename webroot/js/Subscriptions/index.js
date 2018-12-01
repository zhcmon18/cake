var app = angular.module('app',[]);

app.controller('SubscriptionCRUDCtrl', ['$scope','SubscriptionCRUDService', function ($scope,SubscriptionCRUDService) {

    $scope.updateSubscription = function () {
        SubscriptionCRUDService.updateSubscription($scope.subscription.id,$scope.subscription.name)
            .then(function success(response){
                    $scope.message = 'Subscription data updated!';
                    $scope.errorMessage = '';
                },
                function error(response){
                    $scope.errorMessage = 'Error updating subscription!';
                    $scope.message = '';
                });
    };

    $scope.getSubscription = function () {
        var id = $scope.subscription.id;
        SubscriptionCRUDService.getSubscription($scope.subscription.id)
            .then(function success(response){
                    $scope.subscription = response.data;
                    $scope.subscription.id = id;
                    $scope.message='';
                    $scope.errorMessage = '';
                },
                function error (response ){
                    $scope.message = '';
                    if (response.status === 404){
                        $scope.errorMessage = 'Subscription not found!';
                    }
                    else {
                        $scope.errorMessage = "Error getting subscription!";
                    }
                });
    };

    $scope.addSubscription = function () {
        if ($scope.subscription != null && $scope.subscription.name) {


            SubscriptionCRUDService.addSubscription($scope.subscription.name)
                .then (function success(response){
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
    };

    $scope.deleteSubscription = function () {
        SubscriptionCRUDService.deleteSubscription($scope.subscription.id)
            .then (function success(response){
                    $scope.message = 'Subscription deleted!';
                    $scope.subscription = null;
                    $scope.errorMessage='';
                },
                function error(response){
                    $scope.errorMessage = 'Error deleting subscription!';
                    $scope.message='';
                });
    };

    $scope.getAllSubscriptions = function () {
        SubscriptionCRUDService.getAllSubscriptions()
            .then(function success(response){
                    console.log(response.data.data);
                    $scope.subscriptions = response.data.data;
                    $scope.message=''
                    $scope.errorMessage = '';
                },
                function error (response ){
                    $scope.message='';
                    $scope.errorMessage = 'Error getting subscriptions!';
                });
    };

}]);

app.service('SubscriptionCRUDService',['$http', function ($http) {

    'use strict';
    this.getSubscription = function getSubscription(subscriptionId){

        return $http({
            method: 'GET',
            url: 'api/subscriptions/'+subscriptionId,
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
