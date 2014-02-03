<section id="location-map" class="directions-closed">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
	var TLW_MAP_ID = 'TLW_style';
	
    var map;
    var myLatLang = new google.maps.LatLng( <?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>);
    var TLW_MAPTYPE_ID = 'custom_style';
    var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	var img_url = "<?php echo $map_marker; ?>";
	var marker;
	
	 var image = {
		 url: img_url,
		 // This marker is 20 pixels wide by 32 pixels tall.
		 size: new google.maps.Size(60, 70),
		 // The origin for this image is 0,0.
		 origin: new google.maps.Point(0,0),
		 // The anchor for this image is the base of the flagpole at 0,32.
		 anchor: new google.maps.Point(30, 60)
		 };
		
   
    function initialize() {
    
    directionsDisplay = new google.maps.DirectionsRenderer();
    
    var featureOpts = [
	    /*
{
      stylers: [
        { hue: '#918e8e' }
      ]
    },
    {
      featureType: 'water',
      stylers: [
        { color: '#c60751' }
      ]
    }
*/
  ];
    
	var mapOptions = {
		zoom: 12, 
		center: myLatLang, 
		//mapTypeId: TLW_MAPTYPE_ID,
		mapTypeControlOptions: {
			 mapTypeIds: [google.maps.MapTypeId.ROADMAP, TLW_MAPTYPE_ID]
		}
		};
		
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    	
    	marker = new google.maps.Marker({
        position: myLatLang,
        map: map,
        icon: image,
        title: "TLW Solicitors"
		});
					
		directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById('directions-panel'));
		
		/*
var control = document.getElementById('control');
		
		var styledMapOptions = {
			name: 'Custom Style'
		};
		
		var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
		
		map.mapTypes.set(TLW_MAPTYPE_ID, customMapType);
*/
		
	};
	
	function reset_map() {
	
	var wrap = document.getElementById('location-map');
	var panel = document.getElementById('directions-panel')
	
	marker.setMap(map);
	directionsDisplay.setMap();
	
	wrap.className = "directions-closed";
	panel.innerHTML = "";
	document.getElementById('start').value = "";
	
	
	}
	
	function calcRoute() {
	  var wrap = document.getElementById('location-map');
	  var start = document.getElementById('start').value;
	  
	  var end = myLatLang;
	  var request = {
	    origin: start,
	    destination: end,
	    travelMode: google.maps.TravelMode.DRIVING
	  };
	  directionsService.route(request, function(response, status) {
	    if (status == google.maps.DirectionsStatus.OK) {
	      directionsDisplay.setDirections(response);
	      		  
		  marker.setMap(null);
	      wrap.className = "directions-open";
	    }
	  });
	};
	
	google.maps.event.addDomListener(window, 'load', initialize);
    $('.bxslider').bxSlider({
        minSlides: 5,
        maxSlides: 5,
        slideWidth: 192,
        slideMargin: 0,
        adaptiveHeight: true
    });
</script>
	<div id="map-canvas" style="height: 420px; margin-top: -30px;"></div>
	
	<?php if (isset($intro)) { ?>
	<p class="intro"><?php echo $intro ; ?></p>
	<?php } ?>

		
	<div id="directions-panel-wrap">
		<div class="panel-head">Your directions</div>
		<div id="directions-panel"></div>
	</div>
	<button class="close-btn" onclick="reset_map();"><span class="glyphicon glyphicon-remove"></span></a>
	
</section>