angular.module('foolishgamesApp')
        .controller('DownloadCtrl', ['$scope', '$location', '$window', function ($scope, $location, $window) {
            'use strict';

            $scope.$on('$viewContentLoaded', function () {
                $window._gaq.push(['_trackPageview', $location.path()]);
            });
        }]);