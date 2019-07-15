$(document).ready(function() {
    $.post("../php/limit.php", function(data) {
        if (data == "0") {
            alert("你没有权限访问本页面");
            window.location.href = "../html/login.html";
        }
    });

    var $objreplay_p = $("#repaly_p"); //输入框
    var $id = window.location.href.split("?")[1].split("=")[1];
    var $c = "../html/essay_next.html?id=" + decodeURI($id);
    $.post("../php/re_t.php", function(data) {
        console.log(data);
        var $b = "../html/essay_next.html?id=" + data;
        $("#re_back").attr("href", $b);
    });
    $("#reply_btn").click(function() {
        data = {};
        data.message = $objreplay_p.val(); //键值对
        data.id = decodeURI($id);
        console.log(data);
        $.post("../php/re.php", data, function(data) {
            console.log(data);
            if (data == "0") {
                alert("提交失败");
                window.location.href = $c;
            } else {
                alert("提交成功");
                var $b = "../html/essay_next.html?id=" + data;
                window.location.href = $b;
            }
        });
    });
})