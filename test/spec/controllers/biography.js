'use strict';

describe('Controller: BiographyCtrl', function () {

  // load the controller's module
  beforeEach(module('foolishgamesApp'));

  var BiographyCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    BiographyCtrl = $controller('BiographyCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
