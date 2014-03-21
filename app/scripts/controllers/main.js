angular.module('foolishgamesApp')
        .controller('MainCtrl', ['$scope', '$location', '$window', 'NewsService',
            function ($scope, $location, $window, NewsService) {
                'use strict';
                $scope.news = NewsService.query();

                $scope.$on('$viewContentLoaded', function () {
                    $window.ga('send', 'pageview');
                });
            }]);