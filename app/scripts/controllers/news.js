angular.module('foolishgamesApp')
        .controller('NewsCtrl', ['$scope', '$routeParams', '$location', '$window', 'NewsService',
            function ($scope, $routeParams, $location, $window, NewsService) {
                'use strict';

                $scope.page = 1;

                if (typeof $routeParams.id !== 'undefined') {
                    $scope.id = $routeParams.id;
                    $scope.news = [];
                    $scope.news.push(NewsService.get({id: $routeParams.id}));
                } else {
                    $scope.total = NewsService.get({total: true}, function () {
                        $scope.pageCount = Math.ceil($scope.total.count / 10);
                    });
                    $scope.loadNews();
                }

                $scope.setPage = function (pg) {
                    $scope.page = pg;
                    $scope.loadNews();
                };

                $scope.loadNews = function () {
                    $scope.news = NewsService.query({pg: $scope.page});
                };

                $scope.$on('$viewContentLoaded', function () {
                    $window._gaq.push(['_trackPageview', $location.path()]);
                });
            }]);


