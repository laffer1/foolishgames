angular.module('foolishgamesApp')
        .controller('MainCarouselCtrl', function ($scope) {
            "use strict";
            $scope.myInterval = 5000;

            var slides = $scope.slides = [
                {
                    image: 'http://www.foolishgames.com/images/jewelroof.jpg',
                    width: 300,
                    text: "Jewel"  ,
                    active: true
                }   ,
                {
                                  image: 'http://www.foolishgames.com/images/jewelroof.jpg',
                                  width: 300,
                                  text: ""  ,
                                  active: true
                              }
            ];

        }
);