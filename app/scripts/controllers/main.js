angular.module('foolishgamesApp')
        .controller('MainCtrl', ['$scope', 'NewsService', function ($scope, NewsService) {
            'use strict';

            $scope.news = NewsService.query();
        }]);
