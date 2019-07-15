$(document).ready(function() {
    $.post("../php/limit.php", function(data) {
        if (data == "0") {
            alert("你没有权限访问本页面");
            window.location.href = "../html/login.html";
        }
    });
    var $objfoot_next_mainbar = $("#foot_next_mainbar"); //整个div

    var $id = window.location.href.split("?")[1].split("=")[1];
    //console.log(decodeURI($id)); 
    data = {};
    data.title = decodeURI($id);
    $.post("../php/foot_next.php", data, function(data) {
        var a = eval(data); //js数组
        // console.log(data);
        $objfoot_next_mainbar.html(a[0]['content']); //修改文章的所有内容 
    });
})