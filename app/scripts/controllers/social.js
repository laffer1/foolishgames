angular.module('foolishgamesApp')
        .controller('SocialCtrl', function ($scope, $routeParams) {
            $scope.page = null;
            $scope.slug = $routeParams.page;

            if (typeof $routeParams.page != 'undefined') {
                $scope.page = 'views/guest/' + $routeParams.page + '.htm';
            }
        });
