$(document).ready(function() {
    $.post("../php/limit.php", function(data) {
        if (data == "0") {
            alert("你没有权限访问本页面");
            window.location.href = "../html/login.html";
        }
    });
})
$("#q").click(function() {
    $.post("../php/quit.php", function() {});
})
$('.sidebar').load('../html/footer.html');
var $objavatar = $("#avatar"); //头像
var $objmine_name = $("#mine_name"); //用户名
var $objmine_number = $("#mine_number"); //电话号码
//var $objmine_a = $("#mine_a");//用户名链接
$.post("../php/mine.php", function(data) {
    var a = eval(data); //js数组
    // console.log(data);
    $objavatar.attr('src', a[0]['u_image']); //头像
    $objmine_name.html(a[0]['u_name']); //用户名
    $objmine_number.html(a[0]['phone']); //电话号码 
});
