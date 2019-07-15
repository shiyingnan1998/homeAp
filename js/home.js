$(document).ready(function() {
    $.post("../php/limit.php", function(data) {
        if (data == "0") {
            alert("你没有权限访问本页面");
            window.location.href = "../html/login.html";
        }
    });
    $('.sidebar').load('../html/footer.html');
    var $objimg_1 = $("#img_1");
    var $objhome_p1 = $("#home_p1");
    var $objskill_1 = $("#skill_1");
    $.post("../php/home.php", function(data) {
        var a = eval(data);
        //console.log(data);
        /*for(i=0;i<a.length();i++){

        }*/
        $na = a[0]["name"] + a[0]["watch"] + "个观测点" + a[0]["hot"] + "个热点";
        $objhome_p1.text($na); //修改文字
        //console.log(a[0]['image']);
        //document.getElementById("img_1").src=a[0]['image'];
        $objimg_1.attr('src', a[0]['image']); //修改图片
        // 修改进度条宽度，已观测热点除以总热点
        //$objskill_1.css('width','');

    });
})