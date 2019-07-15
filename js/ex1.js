$.post("../php/limit.php", function(data) {
    if (data == "0") {
        alert("你没有权限访问本页面");
        window.location.href = "../html/login.html";
    }
});
let aa = {
    "default": {
        "firstScene": "circle",
        "sceneFadeDuration": 1000
    },
    "compass": true,
    "autoLoad": true,
    "scenes": {
        "circle": {
            "title": "Mason Circle",
            "hfov": 80,
            "pitch": -10,
            "yaw": 50,
            "type": "equirectangular",
            "panorama": "../img/1584.jpg",
            "hotSpots": []
        }
    }
};
/*var a=[{"pitch":"12","yaw":"50","type":"info","text":"p","URL":"hot.php"},
{"pitch":"56","yaw":"88","type":"info","text":"dsuhifhi","URL":"hot.php"}];*/
data = {};
data.watch = 1;
$.post("../php/hot.php", data, function(data) {
    //console.log(data);
    var a1 = eval(data);
    for (i = 0; i < a1.length; i++) {
        a1[i]['pitch'] = parseInt(a1[i]['pitch']);
        a1[i]['yaw'] = parseInt(a1[i]['yaw']);
    }
    aa.scenes.circle.hotSpots = a1;
    console.log(aa);
    pannellum.viewer('panorama', aa);
    //console.log(mouseEventToCoords('panorama'));
});
$.post("../php/ex1.php", function(data) {
    if (data > 1) {
        $('#d2').css('background', 'url(../img/red_map)');
    }
    if (data > 2) {
        $('#d3').css('background', 'url(../img/red_map)');
    }
});