app.config(['$routeProvider', function($routeProvider) {
    $routeProvider.
    when('/', {
        template: '<elements></elements>',
        title: 'Elements',
    });
}]);

app.component('elements', {
    templateUrl: uitoux_theme4_home_template_url,
    controller: function($http, $location, HelperService, $scope, $routeParams, $rootScope, $location) {
        $scope.theme = theme;
    }
});
