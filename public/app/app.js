/**
 * Created by NEVHAV on 19/04/18.
 */
angular.module('abc-fe', [
    'oc.lazyLoad',
    'ui.router',
    'ngCookies',
    'ngSanitize'
])
    .constant('API_URL', '/api/')
    .value('test', { value: '0' })
    // .config(['$pusherProvider', function ($pusherProvider) {
    //     $pusherProvider.setApiKey('23ba442d12a08b8bf208');
    //     $pusherProvider.option({
    //         debug: true,
    //         cluster: 'ap1'
    //     });
    // }])
    .config(['$urlRouterProvider', '$stateProvider', '$locationProvider',
        function ($urlRouterProvider, $stateProvider, $locationProvider) {
            $locationProvider.hashPrefix(''); // by default '!'
            $locationProvider.html5Mode(true);
            $urlRouterProvider.otherwise('/');
            $stateProvider
                .state('home', {
                    url: '/',
                    templateUrl: 'app/components/home/homeView.html',
                    controller: 'homeController',
                    resolve: {
                        loadMyFiles: function ($ocLazyLoad) {
                            return $ocLazyLoad.load(
                                {
                                    files: ['app/components/home/homeController.js']
                                }
                            );
                        }
                    }
                })

                .state('post', {
                    url: '/post/:slug',
                    templateUrl: 'app/components/post/postView.html',
                    controller: 'postController',
                    resolve: {
                        loadMyFiles: function ($ocLazyLoad) {
                            return $ocLazyLoad.load(
                                {
                                    files: ['app/components/post/postController.js'],
                                }
                            );
                        }
                    }
                })

                .state('topic', {
                    url: '/topic/:slug',
                    templateUrl: 'app/components/submenu/submenuView.html',
                    controller: 'submenuController',
                    resolve: {
                        loadMyFiles: function ($ocLazyLoad) {
                            return $ocLazyLoad.load(
                                {
                                    files: ['app/components/submenu/submenuController.js']
                                }
                            );
                        }
                    }
                });
        }]);