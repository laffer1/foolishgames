angular.module('foolishgamesApp').factory('NewsService', ['$resource', function ($resource) {
	'use strict';
	return $resource('/api/news.php', {});
}]);