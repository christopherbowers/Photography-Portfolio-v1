<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Permanent Focus ~ Ghost Bike (working title)</title>

	<link rel="stylesheet" href="c/screen.css" type="text/css" media="screen">
	<link media="only screen and (max-device-width: 480px)" href="c/iPhone.css" type="text/css" rel="stylesheet">
	
	<script src="scripts/FancyZoom.js" type="text/javascript"></script>
	<script src="scripts/FancyZoomHTML.js" type="text/javascript"></script>
	
	<script src="mint/?js" type="text/javascript"></script>
	
	<meta name="viewport" content="width=480, user-scalable=no">

</head>

<body onload="setupZoom()">
	
<div id="navigation">
	<ul>
		<li><a href="index.php">back</a></li>
	</ul>
</div>

<div id="mosaic">
	<p class="title">Ghost Bike (working title)</p>
	
	<div class="flash">
	<div id="container"></div>
	<script type="text/javascript" src="scripts/swfobject.js"></script>
	<script type="text/javascript">
		var s1 = new SWFObject("i/player.swf","ply","720","424","9","#FFFFFF");
		s1.addParam("allowfullscreen","true");
		s1.addParam("allowscriptaccess","always");
		s1.addParam("flashvars","file=/i/ghost_bike.flv&image=i/ghost_bike_preview.png");
		s1.write("container");
	</script>
	</div>
	
	<div class="movie">
	<object width="480" height="270" classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab">
    <param name="src" value="i/ghost_bike_poster.png">
    <param name="href" value="i/ghost_bike.mov">
    <param name="target" value="myself">
    <param name="controller" value="false">
    <param name="autoplay" value="false">
    <embed width="480" height="270" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"
        src="i/ghost_bike_poster.png"
        href="/i/ghost_bike.mov"
        target="myself"
        controller="false"
        autoplay="false">
    </embed>
	</object>
	</div>
</div>

<?php include ('foot.php');?>