  var marker;
  var map;
        
        function AddressParams() {
            return {
                cityName : document.getElementById('city_name').value,
                streetName : document.getElementById('street_name').value,
                postalCode : document.getElementById('zip_code').value,
                streetNumber :  document.getElementById('street_number').value,
                toString: function(){
                    return (this.streetName + ' ' +  this.streetNumber + ' ' + this.postalCode + ' ' + this.cityName ).trim();
                }
            };            
        }; 
        
        function searchAddress(){
            var address = new AddressParams();            
            document.getElementById('google_address').value = address.toString();
        };

        function initMap() {
            if(document.getElementById('map_show_default_values').value == "false"){
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {                         
                        updateGeoInput(position.coords.longitude, position.coords.latitude);
                        renderMap();
                    }, function() { 
                        renderMap();
                    });
                } 
            }else{
                renderMap();
            }
        };        

        function renderMap(){
            var longitude = document.getElementById("latitude").value || 0;
            var latitude = document.getElementById("longitude").value || 0;

            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: parseFloat(longitude), 
                    lng: parseFloat(latitude)
                },
                scrollwheel: false,
                zoom: parseInt(document.getElementById('map_zoom').value) || 8
            });
            
            var geocoder = new google.maps.Geocoder();

            document.getElementById('search-location').addEventListener('click', function() {
                geocodeAddress(geocoder);
            });

            marker = new google.maps.Marker({
                map: map,
                position: map.center,
                draggable: true,
            });
            
            google.maps.event.addListener(marker, 'dragend', function() 
            {    
                geocodePosition(geocoder, marker.getPosition());
            });
            
            google.maps.event.addListener(map, 'click', function(event) {
                marker.setPosition(event.latLng);
                geocodePosition(geocoder, event.latLng);
            }); 

            geocodePosition(geocoder, map.center);
        }        

        function geocodePosition(geocoder, pos) 
        {
            geocoder.geocode({latLng: pos}, geocodeHandler);
        };

        function geocodeHandler (results, status){
           
            marker.addressData == null;
            if (status === google.maps.GeocoderStatus.OK) { 
                marker.addressData = {};                
                jQuery.each(results[0].address_components, function(k,v1) {jQuery.each(v1.types, function(k2, v2){marker.addressData[v2]=v1.long_name});})
                
                marker.addressData.code = results[0].place_id;

                updateGeoInput(results[0].geometry.location.lng(), results[0].geometry.location.lat());                     
            } else {
                if(document.getElementById('map_show_default_values').value == "true")
                    updateGeoInput(document.getElementById('longitude_old').value, document.getElementById('latitude_old').value);
                else
                    updateGeoInput(0,0);
                
            }
            updateLocation();
        };
        
        function updateLocation(){
            var lat = document.getElementById('latitude').value || 0;
            var lng = document.getElementById('longitude').value || 0;
            var center = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));
 
            map.panTo(center); 
            marker.setPosition(center); 
 
        };

        function geocodeAddress(geocoder) {
            var address = document.getElementById('google_address').value;
            geocoder.geocode({'address': address}, geocodeHandler);
        };

        function updateGeoInput(lng, lat){
            document.getElementById('longitude').value = lng;
            document.getElementById('latitude').value = lat;
        };

        function fillAddress(){
            if(marker.addressData == null)
                return;

            var data = marker.addressData;
 
            setInputValue('street_number', data.street_number);
            setInputValue('city_name', data.locality);
            setInputValue('zip_code', data.postal_code);
            setInputValue('street_name', data.route);
            updateGeoInput(marker.position.lng(), marker.position.lat());     
        }   

        function setInputValue(id, value){
            document.getElementById(id).value = value;
        } 
 