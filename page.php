<h3>Panel</h3>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
jQuery(document).ready(function($){
 $(".pricing-tables").sortable();

	$('.menu .item a').on('click',function(){
	if($('.pricing-tables li').length < 6)
	{
	$('.pricing-tables').append('<li>'+$(this).data('table')+'</li>');
	}
	})

})
</script>
<style>
.panel {width:1200px; height:400px; border:1px solid #B6A898; background-color:#877D71; height:100%; float:left}
.panel .menu {width:100%; border:1px solid #B6A898; margin:0px; height:100%; padding:0px; float:left}
.panel .menu .item {height:25%; text-align:center; vertical-align:normal; float:left;}
.panel .menu .item a h1 {padding:40px; margin:0px}
.pricing-tables { height:100%; width:80%; margin:0px; float:left;}
.pricing-tables li{float:left; width:50px;height:100%;}
</style>
<div class="panel">
<ul class="menu">
<li class="item"><a href="#" data-table='red'><h1>Red<h1></a></li>
<li class="item"><a href="#" data-table='blue'><h1>Blue</h1></a></li>
<li class="item"><a href="#" data-table='green'><h1>Green</h1></a></li>
<li class="item"><a href="#" data-table='yellow'><h1>Yellow</h1></a></li>
</ul>
<ul class="pricing-tables">

</ul>
</div>

