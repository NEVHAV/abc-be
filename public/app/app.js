/**
 * Created by NEVHAV on 19/04/18.
 */
angular.module('abc-fe', [
    'oc.lazyLoad',
    'ui.router',
    'ngCookies'
])
    .constant('API_URL', '/api/')
    .value('test', {value: '0'})
    .config(['$urlRouterProvider', '$stateProvider', function ($urlRouterProvider, $stateProvider) {
        $urlRouterProvider.otherwise('/home');
        $stateProvider
            .state('home', {
                url: '/home',
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

            .state('post', {
                abstract: true,
                url: '/post',
                templateUrl: 'app/components/post/postView.html',
                controller: 'postController',
                resolve: {
                    loadMyFiles: function ($ocLazyLoad) {
                        return $ocLazyLoad.load (
                            {
                                files: ['app/components/post/postController.js']
                            }
                        )
                    }
                }
            })
            .state('post.detail', {
                url: '/:title',
                templateUrl: 'app/components/post/postView.html',
                controller: 'postController',
                resolve: {
                    loadMyFiles: function ($ocLazyLoad) {
                        return $ocLazyLoad.load (
                            {
                                files: ['app/components/post/postController.js']
                            }
                        )
                    }
                }
            })

            .state('submenu', {
                abstract: true,
                url: '/submenu',
                templateUrl: 'app/components/submenu/submenuView.html',
                controller: 'submenuController',
                resolve: {
                    loadMyFiles: function ($ocLazyLoad) {
                        return $ocLazyLoad.load (
                            {
                                files: ['app/components/submenu/submenuController.js']
                            }
                        )
                    }
                }
            })
            .state('submenu.detail', {
                url: '/:subcate',
                cache: false,
                templateUrl: 'app/components/submenu/submenuView.html',
                controller: 'submenuController',
                resolve: {
                    loadMyFiles: function ($ocLazyLoad) {
                        return $ocLazyLoad.load (
                            {
                                files: ['app/components/submenu/submenuController.js']
                            }
                        )
                    }
                }
            })
    }]);