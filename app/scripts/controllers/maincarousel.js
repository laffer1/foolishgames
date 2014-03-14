angular.module('foolishgamesApp')
        .controller('MainCarouselCtrl', ['$scope', function ($scope) {
            'use strict';
            $scope.myInterval = 5000;

            $scope.slides = [
                {
                    image: 'http://www.foolishgames.com/images/pics/high_school/hs_2.jpg',
                    width: 350,
                    text: 'Jewel in High School',
                    active: true
                },
                {
                    image: 'http://www.foolishgames.com/images/jewelroof.jpg',
                    width: 300,
                    text: 'Jewel',
                    active: true
                },
                {
                    image: 'http://www.foolishgames.com/images/pics/013102/013102gaycrisis01.jpg',
                    width: 240,
                    text: '',
                    active: true
                }
            ];
        }]
        );