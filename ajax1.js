<script type="text/javascript">

$("#otpform").hide(); 

$('document').ready(function()
{ 
    
	 $("#login-form").validate({
      rules:
	  {
			password: {
			required: true,
			},
			email: {
            required: true,
            email: true
            },
	   },
       messages:
	   {
            password:{
                  required: "please enter your password"
                 },
            email: "please enter your email address",
       },
	   submitHandler: submitForm	
       });  
	  
	   function submitForm()
	   {		
			var data = $("#login-form").serialize();
			var link = 'doctor/profile/login_check';	
			$.ajax({
				
			type : 'POST',
			url  : '<?=base_url(); ?>doctor/profile/login_check',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {	
			      if(response==1){
			       $("#asd").removeClass('display-hide');
			       $("#asd").removeClass('display-hide');
			       $("#asd").removeClass('alert-danger');
			       $("#asd").addClass('alert-success');	
                   $("#asd").html("sucess");
                   window.location.href='<?=base_url();?>doctor/profile';
			      }else{
			      	$("#asd").removeClass('display-hide');					
	                $("#asd").html(response);
	                $("#btn-login").html('log in');
			      }
					
			  }
			});
				return false;
		}
	   
});

$('document').ready(function()
{ 
    
	 $("#register-form").validate({
      rules:
	  {
			password: {
			required: true,
			},
			email: {
             required: true,
             email: true,
             remote: {
                    url: "<?php echo site_url(); ?>home/check_email",
                    type: "post",
                    data: {
                      username: function() {
                        return $( "#email" ).val();
                      }
                    }
                  }
             },
            phone: {
            	required:true,
            },
            fname:{
            	required:true,
            },
            lname:{
            	required:true,
            },
            cat:{
            	requird:true,
            }
	   },
       messages:
	   {
            password:{
                  required: "please enter your password"
                 },
           email:{
		            required: "Please enter a valid email address",
		            remote: jQuery.validator.format("{0} is already taken.")
		        }, 
       },
	   submitHandler: submitForm	
       });  
	  
	   function submitForm()
	   {		
			var data = $("#register-form").serialize();
			
			$.ajax({
				
			type : 'POST',
			url  : '<?=base_url(); ?>doctor/profile/user/3',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-register").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {	 
			       $("#otpform").show(); 
			       $(".register-form").hide();
			  }
			});
				return false;
		}
	   
});

$('document').ready(function()
{ 
    
	 $("#otpform").validate({
      rules:
	  {
			password: {
			required: true,
			}	
	   }, 
	   submitHandler: submitForm	
       });  
	  
	   function submitForm()
	   {		
			var data = $("#otpform").serialize();
			$.ajax({	
			type : 'POST',
			url  : '<?=base_url(); ?>doctor/profile/confirm/true',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-oto").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {	 
			       $("#otpform").hide(); 
			       $("#btn-otp").html(response);    
			  }
			});
			 return false;
		}   
});
</script>