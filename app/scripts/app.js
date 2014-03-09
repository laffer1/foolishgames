angular.module('foolishgamesApp',
                [
                    'ngSanitize',
                    'ngResource',
                    'ui',
                    'ui.bootstrap'
                ])
        .config(function ($routeProvider) {
            $routeProvider
                    .when('/', {
                        templateUrl: 'views/main.html',
                        controller: 'MainCtrl'
                    })
                    .when('/biography/:page', {
                        controller: 'BiographyCtrl',
                        templateUrl: 'views/biography.html'
                    })
                    .when('/biography', {
                        templateUrl: 'views/biography.html',
                        controller: 'BiographyCtrl'
                    })
                    .when('/discography', {
                        templateUrl: 'views/discography.html',
                        controller: 'DiscographyCtrl'
                    })
                    .when('/download', {
                        templateUrl: 'views/download.html',
                        controller: 'DownloadCtrl'
                    })
                    .when('/links', {
                        templateUrl: 'views/links.html',
                        controller: 'LinksCtrl'
                    })
                    .when('/news', {
                        templateUrl: 'views/news.html',
                        controller: 'NewsCtrl'
                    })
                    .when('/pictures', {
                        templateUrl: 'views/pictures.html',
                        controller: 'PicturesCtrl'
                    })
                    .when('/social', {
                        templateUrl: 'views/social.html',
                        controller: 'SocialCtrl'
                    })
                    .otherwise({
                        redirectTo: '/'
                    });
        });
