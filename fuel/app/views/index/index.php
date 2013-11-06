<?php foreach($products as $item):?>
<div class="cupcake">
	<div class="cupcake-thumb">
		<img src="/assets/img/cupcakes/<?php echo $item -> image_path; ?>.png">
		
	</div>
	<div class="cupcake-info">
		<span class="cupcake-name"><?php echo $item -> name ?> Cupcake Name</span>
		<span>$2.50</span>
		<span>Powder cake toffee gummies I love cake.</span>
	</div>
</div>
<?php endforeach?>