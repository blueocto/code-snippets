// <![CDATA[
    function initialize() {
        
        var latlng = new google.maps.LatLng(51.4965178, -0.1464524);
        
        var myOptions = {
            zoom: 14,
            center: latlng,
            icon: marker,
            backgroundColor: 'transparent',
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        var map = new google.maps.Map(document.getElementById('map-1'), myOptions);
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(51.4965178, -0.1464524),
          map: map
        });

        var latlng2 = new google.maps.LatLng(54.9696784, -1.7127091);
        
        var myOptions = {
            zoom: 14,
            center: latlng2,
            icon: marker,
            backgroundColor: 'transparent',
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        var map = new google.maps.Map(document.getElementById('map-2'), myOptions);
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(54.9696784, -1.7127091),
          map: map
        });
        
    }
// ]]>