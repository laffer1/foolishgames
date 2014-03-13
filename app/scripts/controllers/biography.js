angular.module('foolishgamesApp')
        .controller('BiographyCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
            'use strict';

            $scope.page = null;
            $scope.slug = $routeParams.page;

            if (typeof $routeParams.page !== 'undefined') {
                $scope.page = 'views/biography/' + $routeParams.page + '.htm';
            }

            $scope.getClass = function (s) {

                if (s === $scope.slug) {
                    return 'active';
                }
                return '';
            };
        }]);
