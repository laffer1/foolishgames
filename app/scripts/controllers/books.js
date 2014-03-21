angular.module('foolishgamesApp')
        .controller('BooksCtrl', ['$scope', '$location', '$window', function ($scope, $location, $window) {
            'use strict';

            $scope.$on('$viewContentLoaded', function() {
                $window.ga('send', 'pageview');
              });
        }]);
