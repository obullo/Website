<?php
/**
 * Created by PhpStorm.
 * User: batuhancimen
 * Date: 2/20/15
 * Time: 10:11 AM
 */
include_once('database.php');


if(isset($_POST['email'])){
    $errors = array();

    $email = trim($_POST['email']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'The e-mail is not valid.';
    }
    if(empty($errors)){
        $success = insert_data($email);
        if($success){
            $_SESSION['success'] = "Subscription is done.";
        }
        header('Location : index.php');
    }
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylesheets/main.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="container">
    <div class="row">
        <div class="col-xs-12" id="Obullo-logo">
            <img src="img/obullo-logo-1.png" alt="Obullo Logo"/>
        </div>
        <div class="col-xs-12" id="Obullo-title">
            <h3>PHP framework that works with php 5.4 version. Fastest and simple development.</h3>
        </div>

    </div>
    <div class="row">
        <h1 class="col-xs-12 divider" id="Coming"><span>We are coming!</span></h1>
        <div class="col-xs-12" id="loading-bar">
            <div class="obullo-progress-bar red">
                <!--Each span increase %10 progress-->
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="col-xs-12">
            <div id="progress-info">
                <!--Static absolute info-->
                <div class="rotated">
                    <div>Publish the website</div>
                    <div>Release the 1.0 version</div>
                    <div>Get the feedbacks and fix bugs</div>
                    <div>Release the close beta</div>
                    <div>Continuous integration</div>
                    <div>Write tests</div>
                    <div>Update the codes to new tech</div>
                    <div>Use the framework in real apps</div>
                    <div>Write Core of framework</div>
                    <div>Architecture Design</div>
                </div>

            </div>
        </div>
    </div>
    <div class="row" id="subscribe">
        <h1 class="col-xs-12 divider" id="Coming"><span>Subscribe!</span></h1>
        <?php
            if(isset($errors) && !empty($errors)) {
                echo '<div class="input-box-done"><h5 class="login-error sign-up-input">', implode('<h5 class="login-error sign-up-input"></h5>', $errors), '</h5></div>';
            }
            if(isset($_SESSION['success'])){
                echo '<div class="input-box-done"><h5 class="login-success login-error sign-up-input">', implode('<h5 class="login-success login-error sign-up-input"></h5>', $_SESSION['success']), '</h5></div>';
            }
        ?>
        <form action="">
            <div class="input-box-done">
                <input name="email" type="text" placeholder="Your e-mail address" class="sign-up-input"/>
            </div>
            <div class="input-box-done" id="submit">
                <input type="submit" value="Subscribe!" class="btn btn-default btn-xecron"/>
            </div>
        </form>
    </div>
    <div class="row" id="twitter-section">
        <h1 class="col-xs-12 divider" id="Coming"><span>Follow <a href="https://twitter.com/obullo">@Obullo</a>  on Twitter</span></h1>
        <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/obullo" data-widget-id="426705711972638721">Tweets by @obullo</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="js/vendor/jquery-1.11.0.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>

