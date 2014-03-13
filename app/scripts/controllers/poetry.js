angular.module('foolishgamesApp')
        .controller('PoetryCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
            'use strict';
            $scope.page = null;
            $scope.slug = $routeParams.page;

            if (typeof $routeParams.page !== 'undefined') {
                $scope.page = 'views/poetry/' + $routeParams.section + '/' + $scope.slug + '.html';
            }
        }]);
