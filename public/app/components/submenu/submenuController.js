/**
 * Created by NEVHAV on 07/05/18.
 */
angular.module('abc-fe')
    .controller ('submenuController', function ($scope, $http, $timeout, $state, $stateParams, API_URL, $cookieStore, test) {
        //materialize option
        $(document).ready(function () {
            $('.slider').slider({
                height: 280,
                indicators: true,
            });
        });

        //language
        $scope.lang = $cookieStore.get('lang');
        if ($scope.lang !== 'vn' && $scope.lang !== 'jp'){
            $scope.lang = 'vn';
        }
        $cookieStore.put('lang', $scope.lang);
        console.log($scope.lang);
        $scope.changeLang = function (id_lang) {
            if ($scope.lang !== id_lang){
                $scope.lang = id_lang;
                console.log($scope.lang);
                $cookieStore.put('lang', $scope.lang);
                $state.reload();
            }
        };

        // $scope.subId = $cookieStore.get('subId');
        // $scope.subname = $cookieStore.get('subname');
        //
        // $scope.title = 'ABC - ' + $scope.subname;
        $scope.phoneNumber = '(+84) 24-888-888';

        //get submenu
        $http.get(API_URL + $scope.lang + '/' + 'topics/' + $state.params.slug).then(function (response) {
            $scope.topic = response.data.data;
        }, function (error) {
            console.log('Submenus error!');
        });

        //get categories
        $http.get(API_URL + $scope.lang + '/' + 'topics').then(function (response) {
            $scope.categories = response.data.data;
        }, function (error) {
            console.log('Categories error!');
        });

        //show topic
        $scope.showTopic = function ($slug) {
            $state.go('topic', {slug: $slug});
        };
        //
        //show post
        $scope.showPost = function ($slug) {
            $state.go('post', {slug: $slug});
        };

        // getLatestPosts
        $http.get(API_URL + $scope.lang + '/' + 'latestPosts/').then(function (response) {
            $scope.latestPosts = response.data.data;
        }, function (error) {
            console.log('Latest posts error!');
        });
    });