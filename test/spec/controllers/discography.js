'use strict';

describe('Controller: DiscographyCtrl', function () {

  // load the controller's module
  beforeEach(module('foolishgamesApp'));

  var DiscographyCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    DiscographyCtrl = $controller('DiscographyCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(scope.awesomeThings.length).toBe(3);
  });
});
