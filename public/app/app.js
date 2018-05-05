'use strict';
/**
 * Created by NEVHAV on 19/04/18.
 */
angular.module('abc-fe', [
    'oc.lazyLoad',
    'ui.router'
])
    .constant('API_URL', '/')
    .config(['$urlRouterProvider', '$stateProvider', function ($urlRouterProvider, $stateProvider) {
        $urlRouterProvider
            .otherwise('/');
        $stateProvider
            .state('home', {
                url: '/',
                templateUrl: 'app/components/home/homeView.html',
                controller: 'homeController',
                resolve: {
                    loadMyFiles: function ($ocLazyLoad) {
                        return $ocLazyLoad.load (
                            {
                                files: ['app/components/home/homeController.js']
                            }
                        )
                    }
                }
            })
    }]);