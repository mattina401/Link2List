<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./img/logo.png">
    <title>Link2List</title>


    <!--jquery-->
    <script type="text/javascript" src="./js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap core js -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!--Angular-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-messages.js"></script>
    <script type="text/javascript" src="./app/app.js"></script>

    <!--helper-->
    <script type="text/javascript" src="./js/helper.js"></script>

    <!-- Custom styles for this template -->
    <link href="./css/styles.css" rel="stylesheet">
    <link href="./css/taskman.css" rel="stylesheet">
    <link href="./css/font-awesome.min.css" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel="stylesheet" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

</head>


<body ng-app="myApp" ng-controller="cntrl">

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <p class="blog-nav-item" style="font-size: large; padding-right: 20px;">Link2List</p>
            <a class="blog-nav-item" href="index.php">Home</a>
            <a class="blog-nav-item notvisible" style="display: <?php
            if ($_SESSION['userId'] == null)
                echo "none"
            ?>" href="manage.php">Manage Task</a>
            <a class="blog-nav-item notvisible glyphicon  glyphicon-cog" style="float: right; display:<?php
            if ($_SESSION['userId'] == null)
                echo "none"
            ?>" data-toggle="modal" data-target=".bs-modal-setting"></a>
            <a class="blog-nav-item notvisible" style="float: right; display:<?php
            if ($_SESSION['userId'] == null)
                echo "none"
            ?>" ng-click="logout()"> Log out</a>

            <a class="blog-nav-item" id="btn-signup" style="float: right; display:<?php
            if ($_SESSION['userId'] != null)
                echo "none"
            ?>" href="#signUp" data-toggle="modal" data-target=".bs-modal-sm">Sign
                up</a>
            <a class="blog-nav-item" id="btn-signin" style="float: right; display:<?php
            if ($_SESSION['userId'] != null)
                echo "none"
            ?>" href="#signin" data-toggle="modal" data-target=".bs-modal-sm">Log
                in</a>

        </nav>
    </div>
</div>


<!-- Modal for login, signUp -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <div class="bs-example bs-example-tabs">
                <ul class="nav nav-tabs" id="modal">
                    <li class="active" id="signinTab"><a href="#signin" data-toggle="tab">Sign In</a></li>
                    <li class="" id="signupTab"><a href="#signup" data-toggle="tab">Register</a></li>
                </ul>
            </div>
            <div class="modal-body">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="signin">
                        <form class="form-horizontal" name="signInForm">
                            <fieldset>
                                <!-- Sign In Form -->
                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="loginEmail">E-mail:</label>
                                    <div class="controls">
                                        <input id="loginEmail" ng-model="loginEmail" name="loginEmail"
                                               type="text" class="form-control" placeholder="example@example.com"
                                               class="input-medium">
                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="loginPassword">Password:</label>
                                    <div class="controls">
                                        <input required="" id="loginPassword" ng-model="loginPassword"
                                               name="loginPassword" class="form-control" type="password"
                                               placeholder="********" class="input-medium">
                                    </div>
                                </div>

                                <!-- error -->
                                <div>
                                    <p style="color: red; font-size: 12px">{{errorLogin}} </p>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="signin"></label>
                                    <div class="controls">
                                        <button id="signinbtn" ng-click="login(loginEmail,loginPassword)" name="signin" class="btn btn-success">
                                            Sign In
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="signup">
                        <form class="form-horizontal">
                            <fieldset>
                                <!-- Sign Up Form -->
                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="signupEmail">Email:</label>
                                    <div class="controls">
                                        <input id="signupEmail" ng-model="signupEmail" name="signupEmail" class="form-control"
                                               type="text" placeholder="example@example.com" class="input-large"
                                               required="">
                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="signupPassword">Password:</label>
                                    <div class="controls">
                                        <input id="signupPassword" ng-model="signupPassword" name="signupPassword"
                                               class="form-control" type="password" placeholder="********"
                                               class="input-large" required="">
                                        <em>1-8 Characters</em>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="signupConfirmPassword">Re-Enter Password:</label>
                                    <div class="controls">
                                        <input id="signupConfirmPassword" class="form-control"
                                               ng-model="signupConfirmPassword" name="signupConfirmPassword"
                                               type="password" placeholder="********" class="input-large" required="">
                                    </div>
                                </div>

                                <!-- error -->
                                <div>
                                    <p style="color: red; font-size: 12px">{{signupMsg}} </p>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="confirmsignup"></label>
                                    <div class="controls">
                                        <button id="confirmsignup" ng-click="signup(signupEmail,signupPassword,signupConfirmPassword)" value="add"
                                                name="confirmsignup" class="btn btn-success">Sign Up
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </center>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Setting menu-->
<div class="modal fade bs-modal-setting" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <div class="bs-example bs-example-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#setting" data-toggle="tab">Change password</a></li>
                </ul>
            </div>
            <div class="modal-body">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="setting">
                        <form class="form-horizontal">
                            <fieldset>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="newPassword">New password:</label>
                                    <div class="controls">
                                        <input id="newPassword" ng-model="newPassword" name="newPassword"
                                               class="form-control" type="password" placeholder="********"
                                               class="input-large" required="">
                                        <em>1-8 Characters</em>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="updateConfirmPassword">Re-Enter Password:</label>
                                    <div class="controls">
                                        <input id="updateConfirmPassword" class="form-control"
                                               ng-model="updateConfirmPassword" name="updateConfirmPassword"
                                               type="password" placeholder="********" class="input-large" required="">
                                    </div>
                                </div>
                                {{updatePasswordMsg}}
                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="confirmsignup"></label>
                                    <div class="controls">
                                        <button id="confirmsignup" ng-click="updatePassword(newPassword,updateConfirmPassword)" value="add"
                                                name="confirmsignup" class="btn btn-success">Submit
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </center>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        var pgurl = window.location.href.substr(window.location.href
                .lastIndexOf("/") + 1);
        $("nav a").each(function () {
            if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
                $(this).addClass("active");
        })
    });

</script>