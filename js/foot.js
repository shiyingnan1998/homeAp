$(document).ready(function() {
    $.post("../php/limit.php", function(data) {
        if (data == "0") {
            alert("你没有权限访问本页面");
            window.location.href = "../html/login.html";
        }
    });
    $('.sidebar').load('../html/footer.html');
    var $objfoot_img = $("#foot_img"); //足迹页图片
    var $objfoot_islike = $("#foot_islike"); //足迹页收藏
    var $objfoot_title = $("#foot_title"); //足迹页标题
    var $objfoot_p = $("#foot_p"); //足迹页摘要
    var $objfoot_main_img = $("#foot_main_img"); //图片跳转
    var $objfoot_main_title = $("#foot_main_title"); //标题跳转

    $.post("../php/foot.php", function(data) {
        var a = eval(data); //js数组
        //console.log(data);
        var $b = "../html/foot_next.html?id=" + a[0]['name'];
        //var $c="../html/foot_next.html?id="+a[0]['title'];
        //console.log(ar); 
        $objfoot_img.attr('src', a[0]['image']); //修改足迹页图片
        //$objfoot_islike.attr('src', a[0]['image'])//足迹页收藏
        $objfoot_title.text(a[0]['name']); //足迹页标题
        $objfoot_p.text(a[0]['summary']); //足迹页摘要
        $objfoot_main_img.attr('href', $b);
        $objfoot_main_title.attr('href', $b);
        if (a[0]['collect'] == "1") {
            $objfoot_islike.attr('src', '../img/like.png') //足迹页收藏
        }
    });
})
