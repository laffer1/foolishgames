angular.module('foolishgamesApp')
        .controller('NewsCtrl', ['$scope', '$routeParams', '$location', '$window', 'NewsService',
            function ($scope, $routeParams, $location, $window, NewsService) {
                'use strict';

                $scope.currentPage = 1;
                $scope.pageCount = 1;

                $scope.loadNews = function () {
                    $scope.news = NewsService.query({pg: $scope.currentPage - 1});
                };

                $scope.setPage = function (pg) {
                    $scope.currentPage = pg;
                    $scope.loadNews();
                };


                if (typeof $routeParams.id !== 'undefined') {
                    $scope.id = $routeParams.id;
                    $scope.news = [];
                    $scope.news.push(NewsService.get({id: $routeParams.id}));
                } else {
                    $scope.total = NewsService.get({total: true}, function () {
                        $scope.pageCount = Math.ceil($scope.total.count / 10);
                        $scope.setPage(1);
                    });
                }

                $scope.$on('$viewContentLoaded', function () {
                    $window.ga('send', 'pageview');
                });
            }]);


