<!doctype html>
<html lang="en">
  <head>
    <title>tab</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, shrink-to-fit=yes">
	 <link rel="stylesheet" href="style.css">
	 <link rel="stylesheet" href="style_tablet.css">
  </head>
  <body>
 

 
 <div id="webpage">
<!--<iframe src="https://www.berliner-zeitung.de/" style="height:100%;width:100%;"></iframe>-->
 </div>
 
 <div id="wrapper">
	<div id="ad">
		<div id="clickout"></div>
		<img id="logo" src="./img/logo.png" />  
		<h1>
			Prius,<br  />
			der Vierte
		</h1>
		<span id="cta">Jetzt Probe Fahren</span>

		<span id="twitter_flag" class="flag"><img src="./img/ico_twitt.png" /> @toyota_de</span>
		<span id="maps_flag" class="flag"><img src="./img/ico_pin.png" /> Händlersuche</span>

		<div id="twitter" class="info_window">
			<div class="infobar">
				<img src="./img/logo.png" />
			</div>	
			<img id="twitterclose" class="infoclose" src="./img/close.png" />
	
		<ul id="tweets"></ul>
			
			<style type="text/css">::-webkit-scrollbar-button{display:none;height:13px;border-radius:0;background-color:#AAA}::-webkit-scrollbar-button:hover{background-color:#AAA}::-webkit-scrollbar-thumb{background-color:#fff}::-webkit-scrollbar-thumb:hover{background-color:#fff}::-webkit-scrollbar-track{background-color:#e50000;box-shadow:none;border-radius:20px}::-webkit-scrollbar-track:hover{background-color:#CCC;box-shadow:none;border-radius:20px}::-webkit-scrollbar{width:5px}
			</style>

		</div>		
		
		<div id="maps" class="info_window">
			<img id="mapsclose" class="infoclose" src="./img/close.png" />
			<div id="map" style="width: 100%; height: 100%;position:absolute;top:0;left:0;z-index:-1;" >  </div>

		</div>
		
	</div>
</div>

		<?php include("functions.php") ?>

		<script>
			//Clickout/clickTag
			var clickTag = 'https://www.toyota.de/automobile/prius/';
			
			document.getElementById('clickout').addEventListener("click",function()	{
			window.open(clickTag, "blank");
			})
		</script>


	</body>
</html>