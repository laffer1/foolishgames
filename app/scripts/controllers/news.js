angular.module('foolishgamesApp')
        .controller('NewsCtrl', ['$scope', 'NewsService', function ($scope, NewsService) {
            'use strict';

            $scope.news = NewsService.query();
        }]);
