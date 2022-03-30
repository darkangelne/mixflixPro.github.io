<?php
error_reporting (E_ALL ^ E_NOTICE); 
session_start();
include 'dbh.php';

$package_or_bundle = $_SERVER['HTTP_X_REQUESTED_WITH'] ?? null;


/*
if ($package_or_bundle=="com.lebtv021" || $package_or_bundle=="com.syriatv2020" || $package_or_bundle=="com.televisionarabi2020" || $package_or_bundle=="com.arabictv2021" || $package_or_bundle=="com.tilfazarab2020" || $package_or_bundle=="iraq21.com" || $package_or_bundle=="com.syria004" || $package_or_bundle=="com.dramalive23" || $package_or_bundle=="com.egyptdrama22" || $package_or_bundle=="com.dramaplus23" || $package_or_bundle=="com.dramaplus01" || $package_or_bundle=="com.samadrama01")
	


	
{
*/

?>
<html dir="ltr">
<head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <title>ChaCha TV Series</title>
   <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
  
   <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
@import url('https://fonts.googleapis.com/css2?family=Almarai:wght@800&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap');
@import "compass/css3";


body {
  background-color: #222222;
  background-image: linear-gradient(to right, #222222 , #555555 , #222222);
  font-family: 'Comfortaa', 'Almarai', cursive;
  text-align: center;
  direction: rtl;
  margin: 0;
}

video {
object-fit: fill;
}

.spacer { padding: 1px; }

h2 {
direction: rtl;
    font-size: 18px;
    line-height: 30px;
    color: #ffffff;
    background-image: linear-gradient(to right, #191085, #ff0109);
    padding: 12px 0px 12px 0px;
    border-bottom: 0px solid #0c0c0c;
    margin: 0px;
}

h3 {
    font-size: 18px;
    color: #ffd227;
    height: 20px;
    line-height: 170%;
    margin-block-end: 1.5em !important;
    margin-block-start: 1.3em !important;
    margin-inline-start: 1px;
    margin-inline-end: 1px;
    align-content: center;
}

h4 {
    color: #fff;
    margin-block-start: 0.4em;
    margin-block-end: 0.5em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}

.buttonSpan {
	padding: 0 0px;
	vertical-align: middle;
    font-family: 'Comfortaa', 'Almarai', cursive;
}


blockquote {
  background: #f9f9f9;
  border-right: 10px solid #191085;
  margin: 1.5em 10px;
  padding: 1em 15px;
  quotes: "\201C""\201D""\2018""\2019";
  text-align: justify;
  line-height: 1.5em;
  color: #191085;
  border-radius: 20px 15px 15px 0px;
}

blockquote:before {
  color: #191085;
  content: open-quote;
  font-size: 5em;
  margin-left: 0.25em;
  vertical-align: -0.3em;
      line-height: 0.1em;
}

blockquote p {
  display: inline;
}

#urlArea {
    display:none;

}

#urlButton {
    color: #fff;
    background-image: linear-gradient(to right, #191085, #ff0109);
    border: 1px solid #484848;
    padding: 10px;
    width: 150px;
    margin: 10px 0px;
    font-size: 18px;
    border-radius: 5px 10px 0px 0px;
    border-left: 5px solid #fff;

}

#urlButton:hover {
    color: #fff;
    background: #210f80;
}

#urlButton:focus {
    color: #000;
    background: #fbd034;
}

#videoArea {
	padding: 0 0;
	display: inline-block;
}



#videoArea:focus { outline: none; }

#player {
	z-index: 150;
	margin: 0 1px;
}


nonono {
display: none;
}

.vjs-default-skin .vjs-big-play-button {
display: none;
}
</style>
</head>

<body>
  
<?php
$id  =$_GET['id'];	
$sql = "SELECT * FROM movies WHERE mid = '$id' Limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0)	{
$row = $result->fetch_assoc();

echo "<h2>" . $row["name"]. "</h2>";
?>

<?php

if ($row["source"]!="ok")
	
{	

?>
		<video id="player" 
		 width="windowWidth" height= "240px"; 
		 class="video-js vjs-big-play-centered"
		 controls
		 preload="auto"
		 poster="<?=$row["link"]?>"  
		 data-setup="{}"	    
		 <source src="<?=$row["urlmovie"]?>"/>
		 
		</video>


	
	
	
	
	

<?php

}

else 

{
?>


	
	<div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.0081%;">
		<iframe id="chacha" src="<?=$row["urlmovie"]?>" style="top: 0; left: 0; width: 100%; height: 100%; position: absolute; border: 0;" allowfullscreen scrolling="no" allow="encrypted-media;">
		</iframe>
	</div>



<?php


}

?>



<blockquote>
<?=$row["description"]?><br>
</blockquote>

<?php
  
}
 else {
  echo "<h3>No results</h3>";
}
 ?>

<a id="anchorURL" target="_blank"></a>

<?php
$sql2 = "SELECT * FROM episodes WHERE movid = '$id' order by episid asc";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0)
	{

// output data of each row

//echo $sql2;


if ($row["source"]!="ok")

{


		while($row2 = $result2->fetch_assoc())

			{
		echo"<input id=urlArea class=url-area value=".$row2["pathseries"]." />";
		echo"<button onclick=topFunction2() id=urlButton class=url-button><span class=buttonSpan>"."".$row2["episodenb"]."</span></button> ";


			}

}
											
											
	else	{
		
		while($row2 = $result2->fetch_assoc())
			{
		echo"<button onclick=topFunction('".$row2["pathseries"]."')"." id=urlButton>";
		echo"<span class=buttonSpan>".$row2["episodenb"]."</span></button> ";
		    }
		
		
	}		
											
											
											
	}										
											
											
											
											
											
											



else {
  echo "<h3>سنقوم بإضافة الحلقات فور توفرها</h3>";
	 }
?>
<h3>
</h3>

<nonono>
</nonono>


<script>
var isChrome = window.chrome;
var myVendorName = window.navigator.vendor;
var urlButtons = document.querySelectorAll(".url-button");
var showHideInstructions = document.getElementById("showHideInstructions");
var keyShortcutsButton = document.getElementById('keyShortcutsButton');
var lightsButton = document.getElementById('lightsButton');
var fader = document.getElementById('fader');
var anchorURL = document.getElementById('anchorURL');
anchorURL.target="_blank";
var resizeButton = document.getElementById('resizeButton');
var hiddenMenu = document.getElementById('hiddenMenu');
var myRegex = /^https:\/\/.*\.(m3u8|mp4|mkv)$/;
var links = document.querySelectorAll(".url-area");;
var videoArea = document.getElementById('videoArea');

if (isChrome !== null && myVendorName === "Google Inc.") {
	// pass
} else {
	document.body.innerHTML = "<p style=\"font-size:30px;\">You need <a href=\"http:\/\/google.com/chrome\" target=\"blank\">Google Chrome</a> to view this content</p>";
}

function triggerCloudy(index) {
	let link = links[index].value;
	
	if (link.length > 15 && myRegex.test(link)) {
		anchorURL.href=link;
		var myPlayer = videojs("player");
		myPlayer.src(link);
		myPlayer.play();
	} else {
		$("#urlArea").effect( "highlight", {color:"#ff0000"}, 500 );
	}
}


// When the user clicks on the button, scroll to the top of the document
function topFunction(loc) {
	
  document.getElementById('chacha').src = loc;
  document.body.scrollTop = 55;
  document.documentElement.scrollTop = 0;
}

function topFunction2() {
  document.body.scrollTop = 55;
  document.documentElement.scrollTop = 0;
}




for (let i = 0; i < urlButtons.length; i ++) {
	urlButtons[i].addEventListener('click', function() {
		triggerCloudy(i);
	}, false);
}




videoArea.onkeydown = function() {
	var myPlayer = videojs("player");
    var currentTime = myPlayer.currentTime();
    var volume = myPlayer.volume();
    var e = window.event;
    switch (window.event.keyCode) {
        case 37:
            myPlayer.currentTime(currentTime - 5);
            break;
        case 38:
        	myPlayer.volume(volume + 0.1);
        	break;
        case 39:
            myPlayer.currentTime(currentTime + 5);
            break;
        case 40:
        	myPlayer.volume(volume - 0.1);
        	e.preventDefault();
        	break;
        case 32:
        	if (myPlayer.paused()) {
        		e.preventDefault();
        		myPlayer.play();
        		break;
        	} else {
        		e.preventDefault();
        		myPlayer.pause();
        		break;
        	}
    }
};
</script>
		<script src="https://vjs.zencdn.net/4.5/video.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.11.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/2.10.4/jquery-ui.min.js"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

		
<script type="text/javascript">

var dom = document.getElementById('player');
videojs(dom, {}, function(){
    this.on('loadedmetadata', 
	function(){this.currentTime(4);		
    });
});
</script>
		
</html>

<?php

/*
	}
	else
	{
		header("Location: https://play.app.goo.gl/?link=https://play.google.com/store/apps/details?id=com.dramalive23");
        exit();
	}
	
	*/
?>