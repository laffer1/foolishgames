angular.module('foolishgamesApp')
        .controller('NewsCtrl', ['$scope', '$routeParams', '$location', '$window', 'NewsService',
            function ($scope, $routeParams, $location, $window, NewsService) {
                'use strict';

                if (typeof $routeParams.id !== 'undefined') {
                    $scope.id = $routeParams.id;
                    $scope.news = [];
                    $scope.news.push(NewsService.get({id: $routeParams.id}));
                } else {
                    $scope.news = NewsService.query();
                }

                $scope.$on('$viewContentLoaded', function () {
                    $window._gaq.push(['_trackPageview', $location.path()]);
                });
            }]);


