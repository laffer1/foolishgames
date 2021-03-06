angular.module('foolishgamesApp')
  .controller('MainCarouselCtrl', ['$scope', function ($scope) {
    'use strict';

    $scope.myInterval = 5000;
     $scope.noWrapSlides = false;
     $scope.active = 1;

    $scope.slides = [
      {
         id: 0,
         image: 'http://www.foolishgames.com/images/pics/013102/013102gaycrisis01.jpg',
         width: 240,
         text: '',
         active: true
       },
      {
        id: 1,
        image: 'http://www.foolishgames.com/images/pics/pickingupthepieces/pickingupthepieces_small.png',
        width: 300,
        text: '',
        active: true
      },
      {
        id: 2,
        image: 'http://www.foolishgames.com/images/books/never_broken.jpg',
        width: 298,
        text: '',
        active: true
      },
      {
        id: 3,
        image: 'http://www.foolishgames.com/images/jewelroof.jpg',
        width: 300,
        text: 'Jewel',
        active: true
      },
      {
        id: 4,
        image: 'http://www.foolishgames.com/images/pics/rso/jewel2z.jpg',
        width: 315,
        text: '',
        active: true
      },
      {
        id: 5,
        image: 'http://www.foolishgames.com/images/pics/rso/jewel4z.jpg',
        width: 335,
        text: '',
        active: true
      },
      {
        id: 6,
        image: 'http://www.foolishgames.com/images/pics/photoshoot2/photoshoot1.jpg',
        width: 300,
        text: '',
        active: true
      },
      {
        id: 7,
        image: 'http://www.foolishgames.com/images/pics/photoshoot2/jewel_052.jpg',
        width: 292,
        text: '',
        active: true
      }
    ];
  }]
);
