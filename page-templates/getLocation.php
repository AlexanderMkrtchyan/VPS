<?php 
define("API_KEY","AIzaSyDn1JrKoNqygrc0Wjei_wpPCSFIJXvvclk") ?>
<input id="latt" />
<script src="https://kleoseo.com/indica/wp-content/themes/dating/js/jquery.min.js"></script>

	<script
		src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap"
		async defer></script>
	<script type="text/javascript">
		if ("geolocation" in navigator){
			navigator.geolocation.getCurrentPosition(function(position){ 
				var currentLatitude = position.coords.latitude;
				var currentLongitude = position.coords.longitude;
		        $.ajax({
                  method: "GET",
                  url: "https://kleoseo.com/indica/wp-content/themes/dating/page-templates/save_location.php",
                  data: { lat: currentLatitude, long: currentLongitude }
                });
			});
	}
	</script>
	
</html>