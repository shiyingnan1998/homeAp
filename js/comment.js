$(document).ready(function() {
    $.post("../php/limit.php", function(data) {
        if (data == "0") {
            alert("你没有权限访问本页面");
            window.location.href = "../html/login.html";
        }
    });
    var $objcomment_p = $("#comment_p"); //留言框
    var $objcomment_back = $("#comment_back"); //留言框
    var $id = window.location.href.split("?")[1].split("=")[1];
    var $b = "../html/essay_next.html?id=" + decodeURI($id);
    var $c = "../html/comment.html?id=" + decodeURI($id);
    $objcomment_back.attr('href', $b);
    //console.log(decodeURI($id)); 
    $("#comment_btn").click(function() { //点击提交按钮
        data = {};
        data.comment = $objcomment_p.val(); //传输留言内容
        data.title = decodeURI($id); //文章标题

        $.post("../php/comment.php", data, function(data) {
            if (data == "1") {
                alert("提交成功");
                window.location.href = $b;
            } else {
                alert("提交失败");
                window.location.href = $c;
            }
        });
    });
})