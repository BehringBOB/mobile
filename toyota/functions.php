 <?php
 //////////////////
 // 1. TWITTER FEED
 //////////////////
  
 $consumer_key = 'wYEadStflwPDh37vS2owzQMWm';
 $consumer_secret ='MKWdi2LEQzIqZ0EEHxihj5l8IxJKjJ1Kr9gDVdldFVupQZfgBb';
 $access_token = '77151556-oIB1QR16SzJNuR9Yd37tuxuPl0hlywYk5kHsgRa3q';
 $access_token_secret = 's17hz0wEu4VVUhDJPl3YOVU4m1Iae45jrDcrZt8T4a4Y2';
 
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");

$tweets = $connection->get("statuses/user_timeline",["user_id" => 1306945568, "exclude_replies" => true, "include_rts" => false, "count" => 20,"trim_user" => true]);
//print_r($tweets);  ...to take a look at our recieved data
?>

<script>
//transfer Tweets from PHP to JS
var tweets = <?php echo  json_encode($tweets) ?>;

var i;
for (i = 0; i < tweets.length; i++) { 
	var li = document.createElement("LI");
	document.getElementById('tweets').appendChild(li);
	
	//make a nice date format
	var dateNice = tweets[i].created_at;
	var dateNice = dateNice.substring(3, 10) + '<br />' +dateNice.substring(25, 30);

	//put date into span and add to li
	var date = document.createElement('DIV');
	date.classList.add('date')
	date.innerHTML = dateNice;
	li.appendChild(date);
	
	//add tweet text into span and add to li
	var tweet = document.createElement('SPAN');
	tweet.classList.add('tweet')
	tweet.innerHTML = tweets[i].text;
	li.appendChild(tweet);	
}


 // TWITTER FEED ENDE
</script>




<?php
 //////////////////
// 2. GOOGLE MAPS INTEGRATION
 //////////////////
 
 
// Getting User IP
// Quelle http://itman.in/en/how-to-get-client-ip-address-in-php/
// so smoooth
$ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);

//I didn't use the HTML5 geolocation, because it needs user permission, what is not cool within an ad
?>

<script>

	function userLocation(callback)
		{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() { 
		
			  if (this.readyState == 4 && this.status == 200) {
				var locationData = JSON.parse(this.responseText);
				var userCity = locationData.city;
				var userLat = locationData.latitude;
				var userLng = locationData.longitude;
				
				if (userCity != undefined && userLat != undefined && userLng != undefined)
					{
					console.log('User location found: '+userCity );
					// put found data into global variables to use it outside of the function (not that elegant, I know :-/ )
					locationCity = userCity;
					locationLat = userLat;
					locationLng = userLng;
					
					callback();					
					}
				else
					{	console.log('location not found');		}
				}
			};
		xhttp.open('GET', 'https://api.ipdata.co/<?php echo $ip ?>', true);
		xhttp.send();
		}

		
		function gmap()
			{ 	
			console.log('gMap start');
			
			// creating the map with the center of the IP2Location function
			var map_options =
						{
						// center: new google.maps.LatLng(52.5065117,13.1438725), BERLIN
						center: new google.maps.LatLng(locationLat,locationLng),
						zoom: 10,
						disableDefaultUI: true,
						scaleControl: true,
						zoomControl: true,
						mapTypeId: google.maps.MapTypeId.ROADMAP
						}
			var map = new google.maps.Map(document.getElementById('map'), map_options);
				
			//marker for user position
			var userGeo = {lat: Number(locationLat), lng: Number(locationLng)};
			var userMarker = new google.maps.Marker({
					  position: userGeo,
					  map: map,
					  title: 'Du bist hier'
					});
		
			// adding markers to the map with data from the xml file					
			var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) 
							{
							console.log('========Retailer-Xml ready to get parsed========');
							var xmlDoc = xhttp.responseXML;
							var x = xmlDoc.getElementsByTagName("row");
							
							
							var infowindow = new google.maps.InfoWindow();
					
							for (i = 0; i < x.length; i++) 
								{ 
								var store_name = x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
								var store_lat = x[i].getElementsByTagName("lat")[0].childNodes[0].nodeValue;
								var store_lng = x[i].getElementsByTagName("lng")[0].childNodes[0].nodeValue;
								var store_name = x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
								var store_street = x[i].getElementsByTagName("str")[0].childNodes[0].nodeValue;
								var store_zip = x[i].getElementsByTagName("plz")[0].childNodes[0].nodeValue;	
								var storeGeo = {lat: Number(store_lat), lng: Number(store_lng)}; 
		
								var marker =	new google.maps.Marker({
//									  position: storeGeo,
						            position: new google.maps.LatLng(store_lat, store_lng),
									  map: map,
									  icon: './img/pin.png',
									  title: store_name
									});
									
								//Event Listener for the marker, to open the info windows
								 google.maps.event.addListener(marker, 'click', (function (marker, i) {
										return function () {
											infowindow.setContent('<div class="infowindow"><h3>'+x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue+'</h3><div><p>'+x[i].getElementsByTagName("str")[0].childNodes[0].nodeValue+'<br  />'+x[i].getElementsByTagName("plz")[0].childNodes[0].nodeValue+'</p></div></div>');
											infowindow.open(map, marker);
										}
									})(marker, i));
									
									console.log(i+': '+store_name +' ::::::: '+store_lat+' - '+store_lng);
								
								}
							}
						 }// Ende reaystatechange function
						 
				 xhttp.open("GET", "retailer_list.xml", true);
				 xhttp.send();
			} 

document.addEventListener("DOMContentLoaded",userLocation(gmap));

//GOOGLE MAPS INTEGRATION ENDE
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDiUyiQeQ4DZ56qAc5FZH5xOt6qmTGrW4"  type="text/javascript"></script>





<script>
 //////////////////
// 3. LAYOUT FUNCTIONALITIES
 //////////////////
 
 
var logo = document.getElementById('logo');

var infoclose = document.getElementsByClassName('infoclose');
var infoWindow = document.getElementsByClassName('info_window');
var twitterclose = document.getElementById('twitterclose');
var mapsclose = document.getElementById('mapsclose');

function closeinfo()
	{
	var i;
	for (i = 0; i < infoWindow.length; i++)
		{
		infoWindow[i].style.left = '-650px';
		}
	}


document.getElementById('twitter_flag').addEventListener('click',function() 
	{	document.getElementById('twitter').style.left = '0px';	}, true);
	
document.getElementById('maps_flag').addEventListener('click',function() 
	{	document.getElementById('maps').style.left = '0px';	}, true);

twitterclose.addEventListener('click',closeinfo, true);
mapsclose.addEventListener('click',closeinfo, true);
	
</script>

