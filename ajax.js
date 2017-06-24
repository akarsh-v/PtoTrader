<script type="text/javascript">
 function action(a){
 	var data = $("#"+a+"").serialize();				
		$.ajax({	
		type : 'POST',
		url  : '<?=base_url(); ?>doctor/profile/'+a+'',
		data : data,
		beforeSend: function()
		{	
			
			$("#btn-"+a+"").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
		},
		success :  function(response)
		   {										
					$("#btn-"+a+"").html('submited');
					
					$("#error").html(response);
		  }
		});
 }

 function fileupload(a){
 	var data = $("#"+a+"").serialize();				
		$.ajax({	
		type : 'POST',
		url  : '<?=base_url(); ?>doctor/profile/'+a+'',
		data : data,
		cache: false,
        contentType: false,
        processData: false,
		beforeSend: function()
		{	
			
			$("#btn-"+a+"").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
		},
		success :  function(response)
		   {										
					$("#btn-"+a+"").html('submited');
					
					$("#error").html(response);
		  }
		});
 }
</script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $(".main").change(function()
        {
           
            var id=$(this).val();
            var dataString = 'id='+ id;
            $(".sub").find('option').remove();
           /* $(".city").find('option').remove();*/
            $.ajax
            ({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/get_sub",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $("#loding1").hide();
                    $(".sub").html(html);
                } 
            });
        });
        
    });

  function custom(a){
 	var data = $("#"+a+"").serialize();				
		$.ajax({	
		type : 'POST',
		url  : '<?=base_url(); ?>doctor/profile/'+a+'',
		data : data,
		beforeSend: function()
		{	
			
			$("#btn-"+a+"").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
		},
		success :  function(response)
		   {										
					/*$("#btn-"+a+"").html('submited');
					$("#error").html(response);*/
					//location.location.href="<?=base_url(); ?>doctor/profile/edit_profile";
					 location.reload();
		  }
		});
 }
</script> 

<script type="text/javascript">
$(document).ready(function (e) {
	$("#gallery").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "<?=base_url(); ?>doctor/profile/gallery",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			$("#targetLayer").html(data);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
});
</script>



<script>
function initAutocomplete() {
  var map = new google.maps.Map(document.getElementById('map_canvas'), {
      center: {lat: 12.565679, lng: 104.99096299999997},
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var marker1 = new google.maps.Marker({
      position: {lat: 12.565679, lng: 104.99096299999997},
      title:"search in the box"
  });
    marker1.setMap(map);
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var markers = [];

    searchBox.addListener('places_changed', function(event) {
    marker1.setMap(null);
      var places = searchBox.getPlaces();
      if (places.length == 0) {
        return;
      }

      markers.forEach(function(marker) {
        marker.setMap(null);
      });

      markers = [];

      var bounds = new google.maps.LatLngBounds();

    place=places[0];
    document.getElementById("latitude").value = place.geometry.location.lat();
      document.getElementById("longitude").value = place.geometry.location.lng();
      
      var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
      };

      markers.push(new google.maps.Marker({
          map: map,
          draggable: true,
          icon: icon,
          title: place.name,
          position: place.geometry.location
      }));
     

    if (place.geometry.viewport) {
      bounds.union(place.geometry.viewport);
    } else {
      bounds.extend(place.geometry.location);
    }
    markers[0].addListener('dragend', function (event) {
        document.getElementById("latitude").value = event.latLng.lat();
        document.getElementById("longitude").value = event.latLng.lng();
    });
      map.fitBounds(bounds);

  });
}
<script type="text/javascript">
$(document).ready(function(){
    $('#images').on('change',function(){
        $('#multiple_upload_form').ajaxForm({
            //display the uploaded images
            target:'#images_preview',
            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
                $('.uploading').hide();
            },
            error:function(e){
            }
        }).submit();
    });
});
</script>
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA92PFgZj8wA1kN2iCs-s3FdxYcyM1-jKI&libraries=places&callback=initAutocomplete"
         async defer>
    </script>
