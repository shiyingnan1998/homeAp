$(document).ready(function() {
    $.post("../php/limit.php", function(data) {
        if (data == "0") {
            alert("你没有权限访问本页面");
            window.location.href = "../html/login.html";
        }
    });
    var $objfeedback = $("#feedback"); //输入框
    $("#feedback_btn").click(function() {
        data = {};
        data.message = $objfeedback.val(); //键值对
        console.log(data);
        $.post("../php/feedback.php", data, function(data) {
            //console.log(data);
            if (data == "1") {
                alert("提交成功");
                window.location.href = "../html/mine.html";
            } else {
                alert("提交失败");
                window.location.href = "../html/feedback.html";
            }
        });
    });
})