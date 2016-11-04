/**
 * Created by kim on 2016-10-21.
 */
var app = angular.module('myApp', ['ngMessages']);

app.controller('cntrl', function ($scope, $http, $window) {



    $scope.login = function (loginEmail, loginPassword) {

        $http.post("../ajax/login.php?loginEmail=" + loginEmail + "&loginPassword=" + loginPassword).success(function (data) {
            $scope.loginData = data;
            console.log(data);

            // login success
            if (data == "1") {
                $window.location.href = '../manage.php';
            } else {
                $scope.errorLogin = "check email or password again";
            }
        })
    }

    $scope.signup = function (signupEmail, signupPassword, signupConfirmPassword) {

        if($scope.validateEmail(signupEmail)){
            if (signupPassword != signupConfirmPassword) {
                $scope.signupMsg = "Password does not match the confirm password ";
            } else {
                $http.post("../ajax/signup.php?signupEmail=" + signupEmail + "&signupPassword=" + signupPassword).success(function (data) {
                    $scope.signupData = data;
                    console.log(data);
                    $window.location.href = '../manage.php';
                })
            }
        } else {
            $scope.signupMsg = "Please use valid email address";
        }

    }


    $scope.validateEmail = function (email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $scope.logout = function () {
        $http.post("../ajax/logout.php").success(function (data) {
            console.log(data);
            //log out success
            if (data == "1") {
                $window.location.href = '../index.php';
            }
        })
    }

    $scope.updatePassword = function (newPassword, updateConfirmPassword) {
        $scope.updatePasswordMsg = "";
        if (newPassword != updateConfirmPassword) {
            $scope.updatePasswordMsg = "Password does not match the confirm password ";
        } else {
            $http.post("../ajax/updatePassword.php?newPassword=" + newPassword).success(function (data) {
                $scope.updatePasswordData = data;
                console.log(data);
                //change password success
                if (data == "1") {
                    console.log("password changed")
                }
            })
        }
    }




});

//listController
app.controller('listController', function ($scope, $http, $window) {

    // display lists
    $scope.displayList = function () {

        $http.post("../ajax/displayList.php").success(function (data) {
            $scope.displayListData = data;
            console.log(data);
        });
    }


    // display shared lists
    $scope.displaySharedList = function () {

        $http.post("../ajax/displaySharedList.php").success(function (data) {
            $scope.displaySharedListData = data;
            console.log(data);
        });
    }


    // add list
    $scope.addList = function (newListName,newListDes) {

        $http.post("../ajax/addList.php?newListName=" + newListName + "&newListDes=" + newListDes).success(function (data) {
            $scope.displayList();
            console.log(data);

        });
    }


    $scope.goTable = function (listId) {

        $http.post("../ajax/storeListId.php?listId=" + listId).success(function (data) {
            console.log(data);
            $window.location.href = '../task.php';
        })
    }

    $scope.deleteList = function (listId) {
        if (confirm("Are you sure to delete this list?")) {
            $http.post("../ajax/deleteList.php?listId=" + listId).success(function (data) {
                console.log(data);
                $window.location.href = '../manage.php';
            })
        }
    }

    $scope.leaveList = function (listId) {
        if (confirm("Are you sure to leave this list?")) {
            $http.post("../ajax/leaveList.php?listId=" + listId).success(function (data) {
                console.log(data);
                $window.location.href = '../manage.php';
            })
        }
    }



    $scope.displayList();
    $scope.displaySharedList();

});

//taskController
app.controller('tasksController', function ($scope, $http) {
    getTask(); // Load all available tasks

    function getTask() {
        $http.get("../ajax/getTask.php").success(function (data) {
            $scope.tasks = data;
            console.log(data);
        });
    };

    $scope.addTask = function (task) {
        $http.post("../ajax/addTask.php?task=" + task).success(function (data) {
            getTask();
            $scope.taskInput = "";
            console.log(task);
            console.log(data);
        });
    };
    $scope.deleteTask = function (task) {
        if (confirm("Are you sure to delete this line?")) {
            $http.post("../ajax/deleteTask.php?taskID=" + task).success(function (data) {
                getTask();
            });
        }
    };

    $scope.toggleStatus = function (item, status, task) {
        if (status == '2') {
            status = '0';
        } else {
            status = '2';
        }
        $http.post("../ajax/updateTask.php?taskID=" + item + "&status=" + status).success(function (data) {
            getTask()
            $scope.msg = item + "" + status + "" + task;
        });
    };

    $scope.editTask = function (editInput, itemId) {

        var inputData = {
            editInput: editInput,
            itemId: itemId
        }

        $http.post("../ajax/editTask.php", inputData).success(function (data) {
            getTask();
            console.log(data);
        });
    };
});


// send listId to share modal
app.controller('MainCtrl', ['$scope', 'dataShare',
    function ($scope, dataShare) {
        $scope.send = function (listId) {
            dataShare.sendData(listId);
            console.log(listId);
        };
    }
]);

app.controller('MainCtrl2', ['$scope', '$http','$window', 'dataShare',

    function ($scope, $http,$window, dataShare) {

        //variables
        $scope.inviteInfo = {
            email: undefined,
            listId: undefined
        }

        $scope.invite = function () {

            var inputData =
            {
                email: $scope.inviteInfo.email,
                listId: $scope.inviteInfo.listId
            }

            $http.post("../ajax/invite.php", inputData).success(function (data) {
                $scope.data = data;
                console.log(data);
            });
        };

        $scope.$on('data_shared', function () {
            var listId = dataShare.getData();
            $scope.inviteInfo.listId = listId;
            $scope.getListInfo();
        });


        $scope.getListInfo = function() {

            var listId = dataShare.getData();

            $http.post("../ajax/getListInfo.php?listId=" + $scope.inviteInfo.listId).success(function (data) {
                $scope.getListInfoData = data;
                console.log(data);
                console.log(data[0].listName);
                $scope.listName = data[0].listName;
                $scope.description = data[0].description;


            });
        }


        $scope.updateListInfo = function(listName,description) {

            var updateListInfoData = {
                listName: listName,
                description: description,
                listId: dataShare.getData()
            }


            $http.post("../ajax/updateListInfo.php",updateListInfoData).success(function (data) {
                console.log(data);
                $window.location.href = '../manage.php';

            });
        }

    }
]);

app.factory('dataShare', function ($rootScope) {
    var service = {};
    service.data = false;
    service.sendData = function (data) {
        this.data = data;
        $rootScope.$broadcast('data_shared');
    };
    service.getData = function () {
        return this.data;
    };
    return service;
});

//inviteController
app.controller('invite', function ($scope, $http, $window) {

    getInvite();
    function getInvite() {

        $http.post("../ajax/get-invite.php").success(function (data) {
            $scope.inviteList = data;
            console.log(data);
        })
    }

    $scope.accept = function (sharedId) {

        $http.post("../ajax/accept.php?sharedId=" + sharedId).success(function (data) {
            console.log(data);
            getInvite();
        })
    }

    $scope.decline = function (sharedId) {

        $http.post("../ajax/decline.php?sharedId=" + sharedId).success(function (data) {
            console.log(data);
            getInvite();
        })
    }

});