$(document).ready(function() {
    $.post("../php/limit.php", function(data) {
        if (data == "1") {
            window.location.href = "../html/home.html";;
        }
    });
})
var $objPhone = $("#phone");
//var $objCheck = $("#check");
//var $objLogin_btn = $("#login_btn");
var $objInfo = $("#info");

//手机号码的校验
function isCorrectNumber(s) {
    var $re = /^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/;
    if (!$re.test(s)) return false;
    return true;
}

//手机号码输入信息校验
$objPhone.blur(function() {
    var $Phone = $objPhone.val();
    if (isCorrectNumber($Phone)) {
        $objInfo.html("手机号码输入正确").css("color", "green");
    } else {
        $objInfo.html("请输入正确的手机号码").css("color", "red");
        $objPhone.focus();
    }
});
$("#login_btn").click(function() {
    data = {};
    data.phone = $("#phone").val(); //键值对
    data.check = $("#check").val();
    // console.log(data);
    $.post("../php/login.php", data, function(data) {
        console.log(data);
        if (data == "1") {
            alert("登录成功");
            window.location.href = "../html/home.html";
        } else if (data == "手机号格式错误") {
            alert("手机号格式错误");
        } else {
            alert("验证码输入错误");
        }
    });
})
