angular.module('foolishgamesApp')
        .controller('MainCtrl', function ($scope, NewsService) {
            'use strict';

            $scope.news = NewsService.query();
        });
