<?php foreach($products as $item):?>
<div class="cupcake">
	<div class="cupcake-thumb">
		<a href="/details/index/<?php echo $item -> id; ?>">
			<img src="/assets/img/cupcakes/<?php echo $item -> image_path; ?>.png">
		</a>
	</div>
	<div class="cupcake-info">
		<span class="cupcake-name"><?php echo $item -> name ?> </span>
		<span>$<?php echo $item -> price ?></span>
		<span><?php echo $item -> product_type ?></span>
	</div>
</div>
<?php endforeach?>