angular.module('foolishgamesApp')
        .controller('NewsCtrl', ['$scope', '$routeParams', 'NewsService', function ($scope, $routeParams, NewsService) {
            'use strict';

            if (typeof $routeParams.id !== 'undefined') {
                $scope.id = $routeParams.id;
                $scope.news = [];
                $scope.news.push(NewsService.get({id: $routeParams.id}));
            } else {
                $scope.news = NewsService.query();
            }
        }]);
