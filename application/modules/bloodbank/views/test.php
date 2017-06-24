<button onclick="showhide('div1')">div1</button>
<button onclick="showhide('div2')">div1</button>

<div id="div1" style="display:block;">
 <h1>I am Div1</h1>
</div>

<div id="div2" style="display:none;">
 <h1>I am Div2</h1>
</div>


<script>
function showhide(a) {
   var x = document.getElementById('div1');
   var y = document.getElementById('div2');	
   if(a==='div1'){
   	 x.style.display = 'block';
   	 y.style.display = 'none';
   	}else{
   	  y.style.display = 'block';
   	  x.style.display = 'none';	
   	} 
}


</script>