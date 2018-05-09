/**
 * Created by NEVHAV on 03/05/18.
 */
angular.module('abc-fe')
    .controller ('postController', function ($scope, $http, $timeout, $state, $stateParams, API_URL, $cookieStore, test) {
        //materialize option
        $(document).ready(function () {
            $('.slider').slider({
                height: 280,
                indicators: true,
            });
        });

        //language
        $scope.lang = $cookieStore.get('lang');
        if ($scope.lang === null){
            $scope.lang = 'vn';
        }
        $cookieStore.put('lang', $scope.lang);
        $scope.changeLang = function (id_lang) {
            if ($scope.lang !== id_lang){
                $scope.lang = id_lang;
                $cookieStore.put('lang', $scope.lang);
                $state.reload();
            }
        };

        // //header
        // $scope.postId = $cookieStore.get('postId');
        // $scope.title = $cookieStore.get('postTitle');
        // $scope.IdSub = $cookieStore.get('subId');

        // $scope.title = 'ABC - ' + $scope.title;
        $scope.phoneNumber = '(+84) 24-888-888';

        //get post detail
        $http.get(API_URL + $scope.lang + '/' + 'posts/' + $state.params.slug).then(function (response) {
            $scope.post = response.data.data;
        }, function (error) {
            console.log(error);
        });

        //get categories
        $http.get(API_URL + $scope.lang + '/' + 'topics').then(function (response) {
            $scope.categories = response.data.data;
        }, function (error) {
            console.log('Categories error!');
        });

        //show submenu
        // $scope.showSubmenu = function ($subId, $subname) {
        //     $cookieStore.put('subId', $subId);
        //     $cookieStore.put('subname', $subname);
        //     $state.go('submenu.detail', {subcate: $subname});
        // };

        //show post
        // $scope.showPost = function ($postId, $title, $subId) {
        //     $cookieStore.put('postId', $postId);
        //     $cookieStore.put('postTitle', $title);
        //     $cookieStore.put('subId', $subId);
        //     $state.go('post.detail', {title: $title}, {reload: true});
        // };
        //
        // getLatestPosts
        $http.get(API_URL + $scope.lang + '/' + 'latestPosts/').then(function (response) {
            $scope.latestPosts = response.data.data;
        }, function (error) {
            console.log('Latest posts error!');
        });

        //getBreadcrumbs
        // $http.get(API_URL + $scope.lang + '/' + 'breadcrumbs/' + $scope.IdSub).then(function (response) {
        //     $scope.breadcrumbs = response.data.data;
        // }, function (error) {
        //     console.log('Breadbrumbs error!');
        // });
    });