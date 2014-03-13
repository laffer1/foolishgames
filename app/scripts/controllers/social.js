angular.module('foolishgamesApp')
        .controller('SocialCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
            'use strict';
            $scope.page = null;
            $scope.slug = $routeParams.page;

            if (typeof $routeParams.page !== 'undefined') {
                $scope.page = 'views/guest/' + $routeParams.page + '.htm';
            }
        }]);
