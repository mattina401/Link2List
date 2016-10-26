<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Link2List</title>

    <!--jquery-->
    <script src="js/jquery-3.1.1.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!--Angular-->
    <script src="js/angular.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/taskman.css" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel="stylesheet" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body ng-app="myApp" ng-controller="cntrl">

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <p class="blog-nav-item" style="font-size: large; padding-right: 20px;">Link2List</p>
            <a class="blog-nav-item" href="index.php">Home</a>
            <a class="blog-nav-item" href="#">New features</a>
            <a class="blog-nav-item" href="#">About</a>
            <a class="blog-nav-item notvisible" style="display: <?php
            if ($_SESSION['userinfo'] == null)
                echo "none"
            ?>" href="manage.php">Manage Task</a>
            <a class="blog-nav-item notvisible glyphicon  glyphicon-cog" style="float: right; display:<?php
            if ($_SESSION['userinfo'] == null)
                echo "none"
            ?>" data-toggle="modal" data-target=".bs-modal-setting"></a>
            <a class="blog-nav-item notvisible" style="float: right; display:<?php
            if ($_SESSION['userinfo'] == null)
                echo "none"
            ?>" ng-click="logout()"> Log out</a>

            <a class="blog-nav-item" id="btn-signup" style="float: right; display:<?php
            if ($_SESSION['userinfo'] != null)
                echo "none"
            ?>" href="#signUp" data-toggle="modal" data-target=".bs-modal-sm">Sign
                up</a>
            <a class="blog-nav-item" id="btn-signin" style="float: right; display:<?php
            if ($_SESSION['userinfo'] != null)
                echo "none"
            ?>" href="#signin" data-toggle="modal" data-target=".bs-modal-sm">Log
                in</a>

        </nav>
    </div>
</div>


<!-- Modal -->
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
                        <form class="form-horizontal">
                            <fieldset>
                                <!-- Sign In Form -->
                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="userEmail">E-mail:</label>
                                    <div class="controls">
                                        <input required="" id="userEmail" ng-model="loginInfo.email" name="userEmail"
                                               type="text" class="form-control" placeholder="JoeSixpack"
                                               class="input-medium" required="">
                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input required="" id="inputPassword" ng-model="loginInfo.password"
                                               name="inputPassword" class="form-control" type="password"
                                               placeholder="********" class="input-medium">
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="signin"></label>
                                    <div class="controls">
                                        <button id="signinbtn" ng-click="login()" name="signin" class="btn btn-success">
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
                                    <label class="control-label" for="email">Email:</label>
                                    <div class="controls">
                                        <input id="email" ng-model="signUpInfo.email" name="email" class="form-control"
                                               type="text" placeholder="example@example.com" class="input-large"
                                               required="">
                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="password">Password:</label>
                                    <div class="controls">
                                        <input id="password" ng-model="signUpInfo.password" name="password"
                                               class="form-control" type="password" placeholder="********"
                                               class="input-large" required="">
                                        <em>1-8 Characters</em>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
                                    <div class="controls">
                                        <input id="reenterpassword" class="form-control"
                                               ng-model="signUpInfo.confirmPassword" name="reenterpassword"
                                               type="password" placeholder="********" class="input-large" required="">
                                    </div>
                                </div>


                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="confirmsignup"></label>
                                    <div class="controls">
                                        <button id="confirmsignup" ng-click="insertUser()" value="add"
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


<!-- Modal -->
<div class="modal fade bs-modal-setting" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <div class="bs-example bs-example-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#signin" data-toggle="tab">Change password</a></li>
                </ul>
            </div>
            <div class="modal-body">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="signin">
                        <form class="form-horizontal">
                            <fieldset>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="password">New password:</label>
                                    <div class="controls">
                                        <input id="password" ng-model="change.password" name="password"
                                               class="form-control" type="password" placeholder="********"
                                               class="input-large" required="">
                                        <em>1-8 Characters</em>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
                                    <div class="controls">
                                        <input id="reenterpassword" class="form-control"
                                               ng-model="change.confirmPassword" name="reenterpassword"
                                               type="password" placeholder="********" class="input-large" required="">
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="confirmsignup"></label>
                                    <div class="controls">
                                        <button id="confirmsignup" ng-click="changePassword()" value="add"
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
    $(function() {
        var pgurl = window.location.href.substr(window.location.href
                .lastIndexOf("/")+1);
        $("nav a").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
                $(this).addClass("active");
        })
    });

</script>

<!--
<script>

    $(document).ready(function(){
        $("#btn-signup").click(function(){
            $("#modal #signupTab").addClass("active");
        });
    });

    $(document).ready(function(){
        $("#btn-signin").click(function(){
            $("#modal #signinTab").addClass("active");
        });
    });



</script>
-->



