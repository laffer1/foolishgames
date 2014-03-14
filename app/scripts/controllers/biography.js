angular.module('foolishgamesApp')
        .controller('BiographyCtrl', ['$scope', '$routeParams', '$location', '$window',
            function ($scope, $routeParams, $location, $window) {
            'use strict';

            $scope.page = null;
            $scope.slug = $routeParams.page;

            if (typeof $routeParams.page !== 'undefined') {
                $scope.page = 'views/biography/' + $routeParams.page + '.html';
            }

            $scope.getClass = function (s) {

                if (s === $scope.slug) {
                    return 'active';
                }
                return '';
            };

            $scope.$on('$viewContentLoaded', function() {
                $window._gaq.push(['_trackPageview', $location.path()]);
              });
        }]);
