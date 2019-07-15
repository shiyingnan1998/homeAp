<?php
session_start();
if($_SESSION["check"]==NULL){
$_SESSION["check"]=1;
}  
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour</title>
    <link rel="stylesheet" href="https://cdn.pannellum.org/2.4/pannellum.css"/>
    
    <script type="text/javascript" src="p.js"></script>
     <style>
    #panorama {
        width: 250px;
        height: 450px;
        position: relative; 
    }
    .custom-hotspot {
        height: 50px;
        width: 50px;
        position: absolute;
        background:url("./11.jpg") no-repeat;
    }
    #d1{
        height: 10px;
        width: 10px;
        background:red;
        position: absolute; 
        border-radius:10px;
        bottom:8%;
        left:30%;
    }
    #d2{
        height: 10px;
        width: 10px;
        background:grey;
        position: absolute; 
        border-radius:10px;
        bottom:18%;
        left:20%;
    }
    #d3{
        height: 10px;
        width: 10px;
        background:grey;
        position: absolute; 
        border-radius:10px;
        bottom:28%;
        left:10%;
    }
    a{
        display:block;
        width:10px;
        height:10px;
        border-radius:10px;
    }
     #d{
        height: 150px;
        width: 100px;
        background:url("./11.jpg") no-repeat;
        position: relative; 
         position: absolute;
        left: 43.5%;
        bottom:75.5%;
    }
    div.custom-tooltip span {
        visibility: hidden;
        position: absolute;
        border-radius: 3px;
        background-color: #fff;
        color: #000;
        text-align: center;
        max-width: 200px;
        padding: 5px 10px;
        margin-left: -220px;
        cursor: default;
    }
    div.custom-tooltip:hover span{
        visibility: visible;
    }
    div.custom-tooltip:hover span:after {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        border-width: 10px;
        border-style: solid;
        border-color: #fff transparent transparent transparent;
        bottom: -20px;
        left: -10px;
        margin: 0 50%;
    }
    </style>
</head>
<body>

<div id="panorama"></div>
<div id="d">
<div id="d1">
</div>
<div id="d2">
<a href="ex2.php" id="dd2"></a>
</div>
<div id="d3">
<a href="#" id="dd3"></a>
</div>
</div>

<script>
pannellum.viewer('panorama', {   
    "default": {
        "firstScene": "circle",
        "sceneFadeDuration": 1000
    },
   "compass": true,
    "autoLoad": true,
    "scenes": {
        "circle": {
            "title": "Mason Circle",
            "hfov": 110,
            "pitch": -3,
            "yaw": 117,
            "type": "equirectangular",
            "panorama": "11.jpg",
            "hotSpots": [
                {
                    "pitch": -2.1,
                    "yaw": 132.9,
                    "type": "scene",
                    "text": "Spring House or Dairy",
                    "sceneId": "house",
                    "URL": "ex3.php"
                },
            {
            "pitch": 14.1,
            "yaw": 1.5,
            "type": "info",
            "text": "Baltimore Museum of Art",
            "URL": "ex2.php"
        },
        {
            "pitch": -9.4,
            "yaw": 222.6,
            "type": "info",
            "text": "Art Museum Drive"
        },
        {
            "pitch": -0.9,
            "yaw": 144.4,
            "type": "info",
            "text": "North Charles Street"
        }
            ]
        },

        "house": {
            "title": "Spring House or Dairy",
            "hfov": 110,
            "yaw": 5,
            "type": "equirectangular",
            "panorama": "1584.jpg",
            "hotSpots": [
                {
                    "pitch": 600,
                    "yaw": 10,
                    "type": "scene",
                    "cssClass": "custom-hotspot",
                    "text": "Mason Circle",
                    "sceneId": "circle",
                    "targetYaw": -23,
                    "targetPitch": 2
                },
                {
                    "pitch": 14.1,
                    "yaw": 1.5,
                    "cssClass": "custom-hotspot",
                    "createTooltipFunc": hotspot,
                    "createTooltipArgs": "Baltimore Museum of Art"
                },
        {
            "pitch": -9.4,
            "yaw": 222.6,
            "cssClass": "custom-hotspot",
            "createTooltipFunc": hotspot,
            "createTooltipArgs": "Art Museum Drive"
        },
        {
            "pitch": -0.9,
            "yaw": 144.4,
            "cssClass": "custom-hotspot",
            "createTooltipFunc": hotspot,
            "createTooltipArgs": "North Charles Street"
        }
            ]
        }
    }
});

// Hot spot creation function
function hotspot(hotSpotDiv, args) {
    hotSpotDiv.classList.add('custom-tooltip');
    var span = document.createElement('span');
    span.innerHTML = args;
    hotSpotDiv.appendChild(span);
    span.style.width = span.scrollWidth - 20 + 'px';
    span.style.marginLeft = -(span.scrollWidth - hotSpotDiv.offsetWidth) / 2 + 'px';
    span.style.marginTop = -span.scrollHeight - 12 + 'px';
}
</script>
</body>
</html>

<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

<?php
if($_SESSION["check"]>1){
echo"<script>$('#dd3').attr('href','ex3.php');
$('#d3').css('background','red');
$('#d2').css('background','red');
</script>";
}
?>