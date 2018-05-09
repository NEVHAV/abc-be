/**
 * Created by NEVHAV on 19/04/18.
 */
angular.module('abc-fe')
    .controller('homeController', function ($scope, $http, $timeout, API_URL, $state, $cookieStore, $cacheFactory, test) {
        // materialize option
        $(document).ready(function () {
            $('.slider').slider({
                height: 280,
                indicators: true
            });
        });

        setTimeout(function () {
            $(document).ready(function () {
                $('.tabs').tabs({
                    swipeable: false
                });
            });
        }, 100);

        $scope.title = 'ABC - Trang chủ';
        $scope.phoneNumber = '(+84) 24-888-888';

        //language
        $scope.lang = $cookieStore.get('lang');
        if ($scope.lang !== 'vn' && $scope.lang !== 'jp') {
            $scope.lang = 'vn';
        }
        $cookieStore.put('lang', $scope.lang);
        console.log($scope.lang);
        $scope.changeLang = function (id_lang) {
            if ($scope.lang !== id_lang) {
                $scope.lang = id_lang;
                console.log($scope.lang);
                $cookieStore.put('lang', $scope.lang);
                $state.reload();
            }
        };

        //content
        //get categories
        $http.get(API_URL + $scope.lang + '/' + 'topics').then(function (response) {
            $scope.categories = response.data.data;
        }, function (error) {
            console.log('Categories error!');
        });

        //get data
        $http.get(API_URL + $scope.lang + '/' + 'home').then(function (response) {
            $scope.data = response.data.data;
        }, function (error) {
            console.log('Get data', error);
        });

        // getLatestPosts
        $http.get(API_URL + $scope.lang + '/' + 'latestPosts/').then(function (response) {
            $scope.latestPosts = response.data.data;
        }, function (error) {
            console.log('Latest posts error!');
        });

        //show topic
        $scope.showTopic = function ($slug) {
            $state.go('topic', {slug: $slug});
        };

        //show post
        $scope.showPost = function ($slug) {
            $state.go('post', {slug: $slug});
        };

        //test
        $scope.test2 = function () {
            console.log(test.value);
            test.value = 'value';
            console.log(test.value);
            $state.go('post', { cate: 1, subcate: 1 });
        };
    });