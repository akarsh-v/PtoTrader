function getcity(a){
    var dataString = 'id='+ a;
    $.ajax
    ({
        type: "POST",
        url: base_url+"/common/test",
        data: dataString,
        cache: false,
        success: function(html)
        {
            alert(html);
        } 
    });
   
}

$(document).ready(function(){
    $("#state").keyup(function(){
       var a = $("#state").val();
       var dataString = 'id='+ a;
	    $.ajax
	    ({
	        type: "POST",
	        url: base_url+"/common/state",
	        data: dataString,
	        cache: false,
	        success: function(html)
	        {
	           $("#statelist").html(html);
	        } 
	    });
	   
    });
});

$(document).ready(function(){
    $("#city").keyup(function(){
       var a = $("#city").val();
       var c = $("#sid").val();
       var dataString = 'id='+ a;
	    $.ajax
	    ({
	        type: "POST",
	        url: base_url+"/common/city/"+c,
	        data: dataString,
	        cache: false,
	        success: function(html)
	        {
	           $("#citylist").html(html);
	        } 
	    });
	   
    });
});

$(document).ready(function(){
    $("#specialization").keyup(function(){
       var a = $("#specialization").val();
       
       var dataString = 'id='+ a;
	    $.ajax
	    ({
	        type: "POST",
	        url: base_url+"/common/specialization",
	        data: dataString,
	        cache: false,
	        success: function(html)
	        {
	           $("#specializationlist").html(html);
	        } 
	    });
	   
    });
});

$(document).ready(function(){
    $("#college").keyup(function(){
       var a = $("#college").val();
       
       var dataString = 'id='+ a;
	    $.ajax
	    ({
	        type: "POST",
	        url: base_url+"/common/college",
	        data: dataString,
	        cache: false,
	        success: function(html)
	        {
	           $("#collegelist").html(html);
	        } 
	    });
	   
    });
});

function stateselect(a,b){
  $("#state").val(b);
  $("#sid").val(a);
}
function cityselect(a,b){
  $("#city").val(b);
  $("#cid").val(a);
}
function specializationselect(b){
  $("#specialization").val(b);
 
}
function collegeselect(b){
  $("#college").val(b);
}

function view(a){
    $.get(base_url+a, function(data){
      $("#viewbody").html(data);
    });
}

function remove(a)
{
   if(confirm('delete'))
   $.get(base_url+a, function(data){
   	  $('#myModal').modal('show');
      $("#viewbody").html(data);
      location.reload();
    });
}

function active(a){
	$.get(base_url+a, function(data){
	  $('#myModal').modal('show');
	  $("#viewbody").html(data);
	  $("#mydata").load("#mydata");
	  location.reload();
	})
}

function getform(a){
 
 $.get(base_url+a, function(data){
	  $('#showform').modal('show');
	  $("#formdata").html(data);
	})
}

