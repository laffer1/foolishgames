angular.module('foolishgamesApp')
        .controller('PicturesCtrl', ['$scope', '$routeParams', '$location', '$window',
            function ($scope, $routeParams, $location, $window) {
                'use strict';

                $scope.page = null;
                $scope.slug = $routeParams.page;

                if (typeof $routeParams.page !== 'undefined') {
                    $scope.page = 'views/pics/' + $routeParams.section + '/' + $scope.slug + '.html';
                }

                $scope.$on('$viewContentLoaded', function () {
                    $window.ga('send', 'pageview');
                });
            }]);
