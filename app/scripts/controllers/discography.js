angular.module('foolishgamesApp')
        .controller('DiscographyCtrl', ['$scope', '$location', '$window', function ($scope, $location, $window) {
            'use strict';

            $scope.$on('$viewContentLoaded', function () {
                $window.ga('send', 'pageview');
            });
        }]);