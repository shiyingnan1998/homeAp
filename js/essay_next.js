$(document).ready(function() {
    $.post("../php/limit.php", function(data) {
        if (data == "0") {
            alert("你没有权限访问本页面");
            window.location.href = "../html/login.html";
        }
    });
    var $objtitle = $("#title"); //文章标题
    var $objauthor = $("#author"); //文章作者
    // var $objessay_next_p1 = $("#essay_next_p1");//第一段
    // var $objessay_img = $("#essay_img");//文章中图片
    // var $objessay_next_p2 = $("#essay_next_p2e");//第二段
    var $objavatar = $("#avatar"); //评论人头像
    var $objessay_comment_name = $("#essay_comment_name"); //评论人名字
    var $objessay_comment_time = $("#essay_comment_time"); //评论时间
    var $objessay_comment_p = $("#essay_comment_p"); //评论内容

    var $objavatar2 = $("#avatar2"); //评论人头像
    var $objessay_comment_name2 = $("#essay_comment_name2"); //评论人名字
    var $objessay_comment_time2 = $("#essay_comment_time2"); //评论时间
    var $objessay_comment_p2 = $("#essay_comment_p2"); //评论内容

    var $objessay_replay_name = $("#essay_replay_name"); //回复人的名字
    var $objessay_replay_p = $("#essay_replay_p"); //回复的内容

    var $objessay_replay_name2 = $("#essay_replay_name2"); //回复人的名字
    var $objessay_replay_p2 = $("#essay_replay_p2"); //回复的内容

    var $objessay_thing = $("#essay_thing"); //所有内容的div
    var $objcomment_a = $("#comment_a"); //所有内容的div

    var $objre_a = $("#re_a"); //回复的a标签


    var $id = window.location.href.split("?")[1].split("=")[1];
    console.log(decodeURI($id));
    var $b = "../html/comment.html?id=" + decodeURI($id);
    $objcomment_a.attr('href', $b); //修改留言链接
    data = {};
    data.title = decodeURI($id);

    $.post("../php/essay_next.php", data, function(data) {
        var a = eval(data); //js数组
        console.log(a);
        $objtitle.text(decodeURI($id)); //修改文章标题
        $objauthor.text(a[0]["author"]) //作者名字
            // $objessay_next_p1.text(a[0]['title']);//修改第一段
            // $objessay_img.attr('src', a[0]['image']);//修改文章中图片
            // $objessay_next_p2.text(a[0]['browse']);//修改第二段
        $objavatar.attr('src', a[1]['u_image']); //修改评论人头像
        $objessay_comment_name.text(a[1]['u_name']); //修改评论人名字
        $objessay_comment_time.text(a[1]['date']); //修改评论时间
        $objessay_comment_p.text(a[1]['message']); //修改评论内容
        var re = "../html/re.html?id=" + a[1]['id'];
        $objre_a.attr('href', re);
        $objavatar2.attr('src', a[2]['u_image']); //修改评论人头像
        $objessay_comment_name2.text(a[2]['u_name']); //修改评论人名字
        $objessay_comment_time2.text(a[2]['date']); //修改评论时间
        $objessay_comment_p2.text(a[2]['message']); //修改评论内容

        $objessay_replay_name.text(a[3]['u_name']); //修改回复人名字 
        $objessay_replay_p.text(a[3]['message']); //修改回复内容 

        $objessay_replay_name2.text(a[4]['u_name']); //修改回复人名字 
        $objessay_replay_p2.text(a[4]['message']); //修改回复内容 

        $objessay_thing.html(a[0]['content']); //修改文章的所有内容 

        //$objis_like.attr('src', '../img/like.png');//修改图片
    });

})