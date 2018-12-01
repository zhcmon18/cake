var app = angular.module('linkedlists', []);

app.controller('subscriptionsController', function ($scope, $http) {
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.subscriptions = response.data;

    });
});
