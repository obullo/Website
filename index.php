<?php
ini_set('display_errors', 1);
error_reporting(1);

/**
 * Created by PhpStorm.
 * User: batuhancimen
 * Date: 2/20/15
 * Time: 10:11 AM
 */
include_once('database.php');

if (isset($_POST['email'])) {
    $errors = array();
    $email = trim($_POST['email']);

    if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'The e-mail is not valid.';
    }
    $db = new PDO('sqlite:database.sqlite3');
    $stmt = $db->query("SELECT * FROM emails WHERE email = ".$db->quote($email));
    $emails = $stmt->fetch();

    if ($emails !== false) {
        $errors[] =  'You are already subscribed with this email.';
    }
    if (empty($errors)) {
        $success = insert_data($email);
        if ($success) {
            $_SESSION['success'] = "Subscription is done. Thank you !";
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

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon/favicon-16.ico">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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
        <h1 class="col-xs-12 divider" id="Coming"><span>New version is coming !</span></h1>
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
            if (isset($errors) AND ! empty($errors)) {
                echo '<center><h5 class="login-error sign-up-input">', implode('<h5 class="login-error sign-up-input"></h5>', $errors), '</h5></center>';
            }
            if (isset($_SESSION['success'])){
                echo '<center><h5 class="login-success sign-up-input">', implode('<h5 class="login-success sign-up-input"></h5>', array($_SESSION['success'])), '</h5></center>';
            }
        ?>

        <?php if ( ! isset($_SESSION['success'])) { ?>
        <form action="index.php" method="POST">
            <div class="input-box-done">
                <input name="email" type="text" placeholder="Your e-mail address" class="sign-up-input"/>
            </div>
            <div class="input-box-done" id="submit">
                <input type="submit" value="Subscribe!" class="btn btn-default btn-xecron"/>
            </div>
        </form>
        <?php } ?>
    </div>
    <div class="row" id="twitter-section">
        <h1 class="col-xs-12 divider" id="Coming"><span>Follow <a href="https://twitter.com/obullo">@Obullo</a>  on Twitter</span></h1>
        <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/obullo" data-widget-id="426705711972638721">Tweets by @obullo</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
</div>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="js/vendor/jquery-1.11.0.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>