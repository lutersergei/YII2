<?php

/* @var $this \yii\web\View */
/* @var $content string */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Material Blog</title>

    <!-- Loading animation -->
    <script src="js/pace.min.js"></script>

    <!-- Bootstrap core CSS and Material Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-material-design.css" rel="stylesheet">
    <link href="css/ripples.min.css" rel="stylesheet">
    <link href="css/material-scrolltop.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/material-blog.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="landing-header" class="container">
    <div class="text-center">
        <i class="material-icons">&#xE871;</i>
        <h1>Material Blog</h1>
    </div>
</div>

<div id="landing-styles">
    <div class="container">

        <div class="row">
            <div class="style col-sm-6 text-center">
                <h2 class="h3">Travel</h2>
                <p>One column + Sidebar</p>
                <div class="macbook">
                    <div class="inner">
                        <a href="home-travel.html" class="demo" style="background-image:url('img/landing/travel.png');"></a>
                    </div>
                </div>
            </div><!-- /.style -->

            <div class="style col-sm-6 text-center">
                <h2 class="h3">Technology</h2>
                <p>Two column + Sidebar</p>
                <div class="macbook">
                    <div class="inner">
                        <a href="home-technology.html" class="demo" style="background-image:url('img/landing/technology.png');"></a>
                    </div>
                </div>
            </div><!-- /.style -->
        </div>

        <div class="row">
            <div class="style col-sm-6 text-center">
                <h2 class="h3">Photography</h2>
                <p>Two column</p>
                <div class="macbook">
                    <div class="inner">
                        <a href="home-photography.html" class="demo" style="background-image:url('img/landing/photography.png');"></a>
                    </div>
                </div>
            </div><!-- /.style -->

            <div class="style col-sm-6 text-center">
                <h2 class="h3">Fashion</h2>
                <p>Thee column</p>
                <div class="macbook">
                    <div class="inner">
                        <a href="home-fashion.html" class="demo" style="background-image:url('img/landing/fashion.png');"></a>
                    </div>
                </div>
            </div><!-- /.style -->
        </div><!-- /.row -->

        <div class="row">
            <div class="style col-sm-6 text-center">
                <h2 class="h3">Food</h2>
                <p>One column + Sidebar</p>
                <div class="macbook">
                    <div class="inner">
                        <a href="home-food.html" class="demo" style="background-image:url('img/landing/food.png');"></a>
                    </div>
                </div>
            </div><!-- /.style -->

            <div class="style col-sm-6 text-center">
                <h2 class="h3">Music</h2>
                <p>Two column + Sidebar</p>
                <div class="macbook">
                    <div class="inner">
                        <a href="home-music.html" class="demo" style="background-image:url('img/landing/music.png');"></a>
                    </div>
                </div>
            </div><!-- /.style -->
        </div><!-- /.row -->

    </div><!-- /.container -->

</div><!-- /#landing-styles -->

<div id="landing-footer" class="container">
    <div class="text-center">

        <h2>Like our theme?</h2>
        <a class="btn btn-warning btn-raised btn-lg" href="https://wrapbootstrap.com/user/paullaros" target="_blank">Purchase now</a>

    </div>
</div>

<button class="material-scrolltop" type="button"></button>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ripples.min.js"></script>
<script src="js/material.min.js"></script>
<script src="js/material-scrolltop.js"></script>
<script src="js/main.js"></script>

<script>
    $.material.init();
    $('body').materialScrollTop();
</script>

</body>
</html>
