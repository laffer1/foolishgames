angular.module('foolishgamesApp')
        .controller('PicturesCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
            'use strict';

            $scope.page = null;
            $scope.slug = $routeParams.page;

            if (typeof $routeParams.page !== 'undefined') {
                $scope.page = 'views/pics/' + $routeParams.section + '/' + $scope.slug + '.html';
            }
        }]);
