angular.module('foolishgamesApp')
        .controller('SocialCtrl', ['$scope', '$location', '$window', function ($scope, $location, $window) {
                    'use strict';

                    $scope.$on('$viewContentLoaded', function () {
                        $window._gaq.push(['_trackPageview', $location.path()]);
                    });
                }]);