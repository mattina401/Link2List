/**
 * Created by kim on 2016-10-21.
 */
var app = angular.module('myApp', []);

app.controller('cntrl', function ($scope, $http, $window) {

    //variables
    $scope.signUpInfo = {
        email: undefined,
        password: undefined,
        confirmPassword: undefined
    }


    $scope.loginInfo = {
        email: undefined,
        password: undefined
    }

    //display items
    $scope.displayItem = function () {
        $http.get("./query/select.php").success(function (data) {
            $scope.data = data;
            $scope.item = data;
        });
    }

    $scope.insertdata = function () {
        $http.post("./query/insert.php", {'item': $scope.item}).success(function (data) {

            //$scope.msg = "Data Inserted";
            $scope.displayItem();
        })

    }

    $scope.insertUser = function () {

        var inputData = {
            email: $scope.signUpInfo.email,
            password: $scope.signUpInfo.password,
            confirmPassword: $scope.signUpInfo.confirmPassword
        }

        $http.post("./query/insert-user.php", inputData).success(function (data) {
            console.log(data);
            if (data == 'succeed') {
                $window.location.href = './manage.php';
            }
        })

    }

    $scope.login = function () {

        var inputData = {
            email: $scope.loginInfo.email,
            password: $scope.loginInfo.password
        }

        $http.post("./query/login.php", inputData).success(function (data) {

            if (data == 'succeed') {
                $window.location.href = './manage.php';
                console.log(inputData.email);
            }
        })

    }

    $scope.removeItem = function (item) {
        $http.post("./query/remove.php", {'item': item}).success(function () {
            //$scope.msg = "Data Deletion successfull";
            $scope.displayItem();
        })
    }

    $scope.getItem = function (listId) {

        $http.post("./query/get-item.php", {'listId': listId}).success(function (data) {
            $scope.test = data[0];
            console.log(data[0]);
            $scope.listidtest = listId;
        })
    }

    $scope.goTable = function (listId) {

        var inputData = {
            listId: listId
        }
        $http.post("./query/table.php", inputData).success(function (data) {
            $window.location.href = './table.php';
        })
    }

});

//listController
app.controller('listController', function ($scope, $http, $window) {

    // display lists
    $scope.displayList = function () {

        $http.post("./query/select-list.php").success(function (data) {
            $scope.lists = data;
            console.log(data);
        });
    }

    // add list
    $scope.addList = function (listName) {

        $http.post("./query/add-list.php?listName=" + listName).success(function (data) {
            $scope.displayList();
            console.log(listName);
            console.log(data);

        });
    }

    // share list
    $scope.shareList = function (listId) {

        $http.post("./query/share-list.php?listId=" + listId).success(function (data) {
            $scope.displayList();
            console.log(listId);
            console.log(data);

        });
    }


    $scope.displayList();

});

//itemController
app.controller('itemController', function ($scope, $http, $window) {

    $scope.table = function () {

        $http.post("./query/get-item.php").success(function (data) {
            console.log(data[0]);
            $scope.itemList = data[0];

        })

    }

    $scope.table();

});

//taskController
app.controller('tasksController', function ($scope, $http) {
    getTask(); // Load all available tasks
    function getTask() {
        $http.get("ajax/getTask.php").success(function (data) {
            $scope.tasks = data;
            console.log(data);
        });
    };
    $scope.addTask = function (task) {
        $http.post("ajax/addTask.php?task=" + task).success(function (data) {
            getTask();
            $scope.taskInput = "";
            console.log(task);
            console.log(data);
        });
    };
    $scope.deleteTask = function (task) {
        if (confirm("Are you sure to delete this line?")) {
            $http.post("ajax/deleteTask.php?taskID=" + task).success(function (data) {
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
        $http.post("ajax/updateTask.php?taskID=" + item + "&status=" + status).success(function (data) {
            getTask()
            $scope.msg = item + "" + status + "" + task;
        });
    };

});


// send listId to modal

app.controller('MainCtrl', ['$scope', 'dataShare',
    function ($scope, dataShare) {
        $scope.send = function (listId) {
            dataShare.sendData(listId);
            console.log(listId);
        };

    }
]);
app.controller('MainCtrl2', ['$scope', '$http', 'dataShare',

    function ($scope, $http, dataShare) {

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

            $http.post("./query/invite.php",inputData).success(function (data) {
                $scope.data = data;
                console.log(data);
            });
        };


        $scope.$on('data_shared', function () {
            var listId = dataShare.getData();
            $scope.inviteInfo.listId = listId;
        });
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