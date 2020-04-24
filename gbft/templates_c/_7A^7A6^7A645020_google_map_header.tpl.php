<?php /* Smarty version 2.6.9, created on 2006-12-12 14:47:28
         compiled from google_map_header.tpl */ ?>
    <script src="http://maps.google.com/maps?file=api&v=2&key=<?php echo $this->_tpl_vars['GOOGLE_MAP_API_KEY']; ?>
"
      type="text/javascript"></script>
    <script type="text/javascript">

    //<![CDATA[
    <?php echo '
    
    var map = false;
    var geocoder = false;
    
    function loadMap() {
    	if(!map){
	      if (GBrowserIsCompatible()) {
	        map = new GMap2(document.getElementById("map"));
	        if(map){
	        	map.addControl(new GSmallMapControl());
				map.addControl(new GMapTypeControl());
		       map.setCenter(new GLatLng(37.4419, -122.1419), 13);
	        }
	      }
    	}
    }
    function addAddressToMap(response) {
     	if(!map){
     		loadMap();
     	}
     	alertGeoCodeErrorCode(response.Status.code);
      map.clearOverlays();
      if (!response || response.Status.code != 200) {
//        alert("Sorry, we were unable to geocode that address:" + response.Status.code);
      } else {
      	//alert(\'got map\' + map);
        place = response.Placemark[0];
        point = new GLatLng(place.Point.coordinates[1],
                            place.Point.coordinates[0]);
        marker = new GMarker(point);
        map.addOverlay(marker);
        marker.openInfoWindowHtml(place.address + \'<br>\' );
      }
    }

    // showLocation() is called when you click on the Search button
    // in the form.  It geocodes the address entered into the form
    // and adds a marker to the map at that location.
    function showLocation(address) {
      geocoder.getLocations(address, addAddressToMap);
    }
       
    function loadLocationAddress(address){
    	if(!geocoder){
	    	geocoder = new GClientGeocoder();
    	}
    	showLocation(address);

    }
    
    function loadLocationLatLog(lat, lng){
    	map.setCenter(new GLatLng(lat, lng), 13);
    }
    
    function alertGeoCodeErrorCode(errorCode){
    	/*
    	var msg = \'did not find error code message\';
    	
    	if(errorCode ==  G_GEO_SUCCESS){
    		msg = \'G_GEO_SUCCESS\';
    	}	
    	if(errorCode == G_GEO_SERVER_ERROR ){
    		msg = \'G_GEO_SERVER_ERROR\';
    	}	
    	if(errorCode ==  G_GEO_MISSING_ADDRESS){
    		msg = \'G_GEO_MISSING_ADDRESS\';
    	}	
    	if(errorCode == G_GEO_UNKNOWN_ADDRESS ){
    		msg = \'G_GEO_UNKNOWN_ADDRESS\';
    	}	
    	if(errorCode == G_UNAVAILABLE_ADDRESS ){
    		msg = \'G_UNAVAILABLE_ADDRESS\';
    	}	
    	if(errorCode ==  610){
    		msg = \'G_GEO_BAD_KEY\';
    	}	

		alert(msg);    	
		*/
    }
    
    
    '; ?>

    //]]>
    </script>