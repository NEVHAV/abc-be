<!DOCTYPE html>
<html lang="en" ng-app="abc-fe" ng-cloak>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="app/lib/font-awesome/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="app/lib/materialize/dist/css/materialize.min.css" media="screen,projection">

    <link type="text/css" rel="stylesheet" href="css/small-medium.css">
    <link type="text/css" rel="stylesheet" href="css/app.css" media="screen,projection">
</head>
<body ui-view>

    <!--luon dat jQuery truoc bootstrap vi bootstrap require den no-->
    <script src="app/lib/jquery/dist/jquery.min.js"></script>
    <script src="app/lib/angular/angular.min.js"></script>
    <script src="app/lib/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="app/lib/angular-cookies/angular-cookies.js"></script>
    <script src="app/lib/oclazyload/dist/ocLazyLoad.min.js"></script>

    <!--main script-->
    <script src="app/lib/materialize/dist/js/materialize.min.js"></script>
    <script src="app/app.js"></script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>

</html>