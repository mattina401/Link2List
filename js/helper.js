/**
 * Created by kim on 2016-10-29.
 */







$(document).ready(function () {

    function editText(e) {
            console.log("clicked");
            e.preventDefault();
            var dataset1 = $("#list-name");
            var dataset2 = $("#list-des");
            var savebtn = $("#apply-btn");
            var theid1 = dataset1.attr("id");
            var newid1 = theid1 + "-form";
            var currval1 = dataset1.text();
            var theid2 = dataset2.attr("id");
            var newid2 = theid2 + "-form";
            var currval2 = dataset2.text();

            dataset1.empty();
            dataset2.empty();

            $('<input type="text" name="' + newid1 + '" id="' + newid1 + '" value="' + currval1 + '" class="hlite">').appendTo(dataset1);
            $('<input type="text" name="' + newid2 + '" id="' + newid2 + '" value="' + currval2 + '" class="hlite">').appendTo(dataset2);


            $(this).css("display", "none");
            savebtn.css("display", "block");
    }






    $("#apply-btn").on("click", function (e) {
        e.preventDefault();
        var elink = $("#edit-btn");
        var dataset1 = $("#list-name");
        var newid1 = dataset1.attr("id");
        var dataset2 = $("#list-des");
        var newid2 = dataset2.attr("id");



        var cinput1 = "#" + newid1 + "-form";
        var einput1= $(cinput1);
        var newval1 = einput1.attr("value");
        var cinput2 = "#" + newid2 + "-form";
        var einput2 = $(cinput2);
        var newval2 = einput2.attr("value");


        $(this).css("display", "none");
        einput1.remove();
        dataset1.html(newval1);
        einput2.remove();
        dataset2.html(newval2);

        elink.css("display", "block");
    });
});