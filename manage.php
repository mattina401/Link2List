<?php include("header.php"); ?>
<div style="display: <?php
if($_SESSION['userinfo'] == null)
    echo "none"
?>">


    <section ng-controller="listController">
        <div class="container">
            <h1 class="text-center">Manage your lists</h1>
            <a class="blog-nav-item glyphicon glyphicon-comment" href="#mesagge" data-toggle="modal"
               data-target=".bs-modal-message" ng-controller="invite" ng-click="getInvite()">invitation</a>
            <br>
            <div class="col-md-3" ng-repeat="list in lists">
                <h2>{{list.listName}}</h2>
                <div ng-show="list.listName != null">
                    <p>Owner:{{list.userId}}</p>
                    <p>description</p>
                    <p>updated time</p>
                    <p># of items</p>
                    <input type="button" name="go" value="go" ng-click="goTable(list.listId)">

                    <input type="button" name="share" value="share" class="blog-nav-item"
                           href="#signUp" data-toggle="modal" data-target=".share" ng-controller="MainCtrl"
                           ng-click="send(list.listId)">
                </div>
            </div>
            <div>
                <input type="text" value="list name" ng-model="listName">
                <input type="button" value="add list" ng-click="addList(listName)">
            </div>
        </div>
    </section>


    <section ng-controller="listController">
        <div class="container">
            <h1 class="text-center">Shared lists</h1>
            <br>
            <div class="col-md-3" ng-repeat="list in sharedLists">
                <h2>{{list.listName}}</h2>
                <div ng-show="list.listName != null">
                    <p>Owner:{{list.ownerId}}</p>
                    <p>description</p>
                    <p>updated time</p>
                    <p># of items</p>
                    <input type="button" name="go" value="go" ng-click="goTable(list.listId)">

                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade share" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true" ng-controller="MainCtrl2">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <br>
                <div class="bs-example bs-example-tabs">
                    <ul class="nav nav-tabs">
                        <h1>Share {{inviteInfo.listId}}</h1>
                    </ul>
                </div>
                <div class="modal-body">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="invite">
                            <form class="form-horizontal">
                                <fieldset>
                                    <!-- Sign In Form -->
                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="userEmail">E-mail:</label>
                                        <div class="controls">
                                            <input required="" id="userEmail" ng-model="inviteInfo.email"
                                                   name="userEmail"
                                                   type="text" class="form-control" placeholder=""
                                                   class="input-medium" required="">
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="control-group">
                                        <label class="control-label" for="invite"></label>
                                        <div class="controls">
                                            <button id="invitebtn" ng-click="invite()" name="invite"
                                                    class="btn btn-success">
                                                Invite
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


    <!-- invitation message -->
    <div class="modal fade bs-modal-message" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel"
         aria-hidden="true" ng-controller="invite">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <br>
                <div class="bs-example bs-example-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#signin" data-toggle="tab">invitation</a></li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="signin">
                            <form class="form-horizontal">
                                <fieldset>

                                    <div class="control-group">
                                        <label class="control-label" for="signin"></label>
                                        <div class="controls" ng-repeat="shared in inviteList">
                                            <div>
                                                Invitation for {{shared.listId}} from {{shared.ownerId}}
                                            </div>


                                            <button id="acceptbtn" ng-click="accept(shared.sharedId)" name="accept"
                                                    class="btn btn-success">
                                                Accept
                                            </button>
                                            <button id="declinebtn" ng-click="decline(shared.sharedId)" name="decline"
                                                    class="btn btn-success">
                                                Decline
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

</div>
<?php include("footer.html"); ?>
