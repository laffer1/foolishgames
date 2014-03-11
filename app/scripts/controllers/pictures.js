angular.module('foolishgamesApp')
        .controller('PicturesCtrl', function ($scope, $routeParams) {
            $scope.page = null;
            $scope.slug = $routeParams.page;

            if (typeof $routeParams.page != 'undefined') {
                $scope.page = 'views/pics/' + $routeParams.section + '/' + $scope.slug + '.html';
            }
        });
