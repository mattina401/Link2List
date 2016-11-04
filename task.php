<?php include("header.php"); ?>
    <div style="display: <?php
    if ($_SESSION['userId'] == null)
        echo "none"
    ?>">
        <br>
        <section>
            <div class="container">
                <a href="manage.php" style="color: grey"><li class="glyphicon glyphicon-arrow-left"></li> back</a>
                <div class="widget-box" id="recent-box" ng-controller="tasksController">
                    <div class="widget-header header-color-blue">
                        <div class="row">
                            <div class="col-sm-6 col-xs-5 text-center" style="padding-top: 15px;">
                                <h4>LIST MANAGER</h4>
                            </div>

                            <div class="col-sm-3 col-xs-4 pull-right">

                                <input type="text" ng-model="filterTask"
                                       class="form-control search header-elements-margin"
                                       placeholder="Filter">
                            </div>
                            <div class="col-sm-3 col-xs-3 pull-right">
                                <button ng-click="addNewClicked=!addNewClicked;"
                                        class="btn btn-sm btn-danger header-elements-margin"><i
                                        class="glyphicon  glyphicon-plus"></i>&nbsp;Add New
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="widget-body ">
                        <form ng-init="addNewClicked=false; " ng-if="addNewClicked" id="newTaskForm" class="add-task">
                            <div class="form-actions">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="comment" ng-model="taskInput"
                                           placeholder="Add New Task" ng-focus="addNewClicked">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit" ng-click="addTask(taskInput)"><i
                                                class="glyphicon glyphicon-plus"></i>&nbsp;Add New Task
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="task">
                            <label class="checkbox" ng-repeat="item in tasks | filter : filterTask">
                                <input
                                    type="checkbox"
                                    value="{{item.status}}"
                                    ng-checked="item.status==2"
                                    ng-click="toggleStatus(item.itemId,item.status, item.itemName)"/>
                                <span ng-class="{strike:item.status==2}">{{item.itemName}}</span>
                                <a ng-click="deleteTask(item.itemId)" class="pull-right"><i
                                        class="glyphicon glyphicon-trash"></i> remove</a>
                                <a ng-click="Clicked=!Clicked;" class="pull-right"><i
                                        class="glyphicon glyphicon-pencil"></i> edit&nbsp;</a>
                                <span class="pull-right"  style="font-size: 10px">Last Updated On {{item.updatedTime}}&nbsp;&nbsp;&nbsp;</span>


                                <form ng-init="Clicked=false;" ng-if="Clicked" id="newTaskForm" class="add-task">
                                    <div class="form-actions">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="comment" ng-model="editInput"
                                                   placeholder="{{item.itemName}}" ng-focus="Clicked">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit"
                                                        ng-click="editTask(editInput,item.itemId)"><i
                                                        class="glyphicon glyphicon-pencil"></i>&nbsp;Edit Task
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php include("footer.php"); ?>