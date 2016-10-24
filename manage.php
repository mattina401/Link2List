<?php include("header.php"); ?>
<section  ng-controller="listController">
    <div class="container">
        <h1 class="text-center">Manage you lists</h1>
        <br>
        <div class="col-md-3" ng-repeat="list in list">
            <h2>{{list.listName}}</h2>
            <p>description</p>
            <p>updated time</p>
            <p># of items</p>
            <input type="button" name="go" value="go" ng-click="goTable(list.listId)">
            <!--
            <table class="pure-table">
                <thead>
                <th class="col-md-6">
                    Item
                </th>
                </thead>

                <tbody>
                <tr ng-repeat="item in data">
                    <td>
                        {{item.itemName}}
                    </td>
                </tr>

                </tbody>
            </table>
            -->
        </div>
    </div>
</section>


<section>
    <div class="container" style="margin-top: 200px">
        <p>{{item}}</p>
        <p>{{list}}</p>
        <p>{{msg1}}</p>
        <p>{{test}}</p>
        <tr ng-repeat="item in test">
            <th rowspan="{{test.length}}">
                {{test.itemName}}
            </th>
        </tr>
        <p>{{listidtest}}</p>

        <?php echo $_SESSION['userinfo']; ?>
    </div>

</section>




<script>
    $("#btn").click(function () {
        $("#main-list").append()
    });
</script>


<?php include("footer.html"); ?>
