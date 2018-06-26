<!doctype html>
<html lang="en">
  <head>
    <title>desktop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, shrink-to-fit=yes">
	 <link rel="stylesheet" href="style.css">
  </head>
  <body>
 
 
 <div id="webpage">
<!-- simulate a website behind
<iframe src="https://www.n-tv.de/" style="height:100%;width:100%;"></iframe>-->
 </div>
 
 <div id="wrapper">
	<div id="ad">
		<div id="clickout"></div>
		<img id="logo" src="./img/logo.png" />
		<h1>
			Prius,<br  />
			der Vierte
		</h1>
		<span id="cta">Jetzt Probe fahren</span>

		<span id="twitter_flag" class="flag"><img src="./img/ico_twitt.png" /> @toyota_de</span>
		<span id="maps_flag" class="flag"><img src="./img/ico_pin.png" /> Händlersuche</span>

		<div id="twitter" class="info_window">
			<div class="infobar">
				<img src="./img/logo.png" />
			</div>
			<img id="twitterclose" class="infoclose" src="./img/close.png" />
			<ul id="tweets"></ul>
			
			<style type="text/css">::-webkit-scrollbar-button{display:none;height:13px;border-radius:0;background-color:#e50000}::-webkit-scrollbar-button:hover{background-color:#e50000}::-webkit-scrollbar-thumb{background-color:#e50000;}::-webkit-scrollbar-thumb:hover{background-color:#fff}::-webkit-scrollbar-track{box-shadow:none;}::-webkit-scrollbar-track:hover{box-shadow:none;}::-webkit-scrollbar{width:10px}
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