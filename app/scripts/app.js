angular.module('foolishgamesApp',
                [
                    'ngSanitize',
                    'ngResource',
                    'ui',
                    'ui.bootstrap'
                ])
        .config(function ($routeProvider) {
            'use strict';

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
                    .when('/books', {
                        templateUrl: 'views/books.html',
                        controller: 'BooksCtrl'
                    })
                    .when('/discography', {
                        templateUrl: 'views/discography.html',
                        controller: 'DiscographyCtrl'
                    })
                    .when('/download', {
                        templateUrl: 'views/download.html',
                        controller: 'DownloadCtrl'
                    })
                    .when('/legal', {
                        templateUrl: 'views/disclaimer.html',
                        controller: 'DisclaimerCtrl'
                    })
                    .when('/links', {
                        templateUrl: 'views/links.html',
                        controller: 'LinksCtrl'
                    })
                    .when('/lyrics', {
                        templateUrl: 'views/lyrics/index.html',
                        controller: 'LyricsCtrl'
                    })
                    .when('/news/tour/1999', {
                        templateUrl: 'views/tour/1999.html',
                        controller: 'NewsCtrl'
                    })
                    .when('/news/tour/2002', {
                        templateUrl: 'views/tour/2002.html',
                        controller: 'NewsCtrl'
                    })
                    .when('/news/chart', {
                        templateUrl: 'views/chart.html',
                        controller: 'NewsCtrl'
                    })
                    .when('/news/review_sessions', {
                        templateUrl: 'views/review_sessions.html',
                        controller: 'NewsCtrl'
                    })
                    .when('/news/article/:id', {
                        templateUrl: 'views/news.html',
                        controller: 'NewsCtrl'
                    })
                    .when('/news', {
                        templateUrl: 'views/news.html',
                        controller: 'NewsCtrl'
                    })
                    .when('/pictures/:section/:page', {
                        templateUrl: 'views/pictures.html',
                        controller: 'PicturesCtrl'
                    })
                    .when('/pictures', {
                        templateUrl: 'views/pictures.html',
                        controller: 'PicturesCtrl'
                    })
                    .when('/poetry/:section/:page', {
                        templateUrl: 'views/poetry.html',
                        controller: 'PoetryCtrl'
                    })
                    .when('/poetry', {
                        templateUrl: 'views/poetry.html',
                        controller: 'PoetryCtrl'
                    })
                    .when('/privacy', {
                        templateUrl: 'views/privacy.html',
                        controller: 'PrivacyCtrl'
                    })
                    .when('/social/gbook1', {
                        templateUrl: 'views/guest/gbook1.html',
                        controller: 'SocialCtrl'
                    })
                    .when('/social/gbook2', {
                        templateUrl: 'views/guest/gbook2.html',
                        controller: 'SocialCtrl'
                    })
                    .when('/social/gbook3', {
                        templateUrl: 'views/guest/gbook3.html',
                        controller: 'SocialCtrl'
                    })
                    .when('/social/gbook4', {
                        templateUrl: 'views/guest/gbook4.html',
                        controller: 'SocialCtrl'
                    })
                    .when('/social/gbook5', {
                        templateUrl: 'views/guest/gbook5.html',
                        controller: 'SocialCtrl'
                    })
                    .when('/social/gbook6', {
                        templateUrl: 'views/guest/gbook6.html',
                        controller: 'SocialCtrl'
                    })
                    .when('/social', {
                        templateUrl: 'views/social.html',
                        controller: 'SocialCtrl'
                    })
                    .otherwise({
                        redirectTo: '/'
                    });
        });
