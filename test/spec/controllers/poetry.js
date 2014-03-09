'use strict';

describe('Controller: PoetryCtrl', function () {

  // load the controller's module
  beforeEach(module('foolishgamesApp'));

  var PoetryCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    PoetryCtrl = $controller('PoetryCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
