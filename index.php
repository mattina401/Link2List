<?php include("header.php"); ?>

<section class="showcase">
    <div class="container">
        <h1>Share your List</h1>
        <p>Connect your tasks with others</p>
        <a class="btn btn-primary btn-lg" id="showcase-btn"> read more</a>
    </div>
</section>

<section class="intro">
    <div class="container">
        <br>
        <h1>Simple and Easy to use</h1>
        <hr>
        <p>Link2List helps you manage your daily tasks, monthly plan, or school project with your friends, co-worker,
            and family</p>
    </div>
</section>

<section class="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="img/list.JPG">
            </div>
            <div class="col-md-6" style="padding: 50px 0 0 100px">
                <h1>Manage everything in one place</h1>
                <p>With Link2List, you can manage your personal daily tasks, team project, grocery list in one place</p>
            </div>
        </div>
        <br><br>
        <hr>
        <br><br><br>
        <div class="row">
            <div class="pull-right col-md-6">
                <img src="img/share2.JPG" style="height: 250px; width: 400px">
            </div>
            <div class="col-md-6" style="padding: 50px 40px 0 0">
                <h1>Share your tasks with other</h1>
                <p>Increase your team's productivity with shared project's tasks.</p>
            </div>
        </div>
        <br><br>
        <hr>
        <br><br><br>
        <div class="row">
            <div class="col-md-6" style="left:-100px;">
                <img src="img/task.JPG" style="width: 600px">
            </div>
            <div class="col-md-6" style="padding: 50px 0 0 100px">
                <h1>Have your own simple task manager</h1>
                <p>Using list manager, you can manage your tasks easily</p>
            </div>
        </div>

    </div>
</section>

<section class="boxes">
    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <h3>Share</h3>
                    <p>Share your task with family, friends, co-worker and classmates.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    <h3>Daily Planner</h3>
                    <p>Manage your daily plan and tasks with Link2List</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <h3>List Management</h3>
                    <p>Add and organize items to help you stay on top of everything</p>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</section>

<script>
    $("#showcase-btn").click(function() {
        $('html,body').animate({
                scrollTop: $(".intro").offset().top},
            'slow');
    });
</script>

<?php include("footer.php"); ?>
