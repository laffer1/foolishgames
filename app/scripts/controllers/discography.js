angular.module('foolishgamesApp')
        .controller('DiscographyCtrl', ['$scope', '$location', '$window', function ($scope, $location, $window) {
            'use strict';

            $scope.$on('$viewContentLoaded', function () {
                $window._gaq.push(['_trackPageview', $location.path()]);
            });
        }]);