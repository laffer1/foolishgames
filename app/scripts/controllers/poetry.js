angular.module('foolishgamesApp')
        .controller('PoetryCtrl', function ($scope, $routeParams) {
            $scope.page = null;
            $scope.slug = $routeParams.page;

            if (typeof $routeParams.page != 'undefined') {
                $scope.page = 'views/poetry/' + $routeParams.section + '/' + $scope.slug + '.html';
            }
        });
