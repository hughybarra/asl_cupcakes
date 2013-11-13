<?php foreach($products as $item):?>
<div class="cupcake">
	<div class="cupcake-thumb">
		<a href="/details/<?php echo $item -> id; ?>">
			<img src="/assets/img/cupcakes/<?php echo $item -> image_path; ?>.png">
		</a>
	</div>
	<div class="cupcake-info four columns">
		<h2><?php echo $item -> name ?> </h2>
		<span>$<?php echo $item -> price ?></span>
		<span><?php echo $item -> product_type ?></span>
	</div>
</div>
<?php endforeach?>