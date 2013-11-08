<div class="cupcake-detail-img">
	<img src="/assets/img/cupcakes/<?php echo $product -> image_path?>.png">
</div>


<div class="cupcake-detail-info">
	<h1><?php echo $product -> name?></h1>
	<span>$<?php echo $product -> price?></span>
	<span><?php echo $product -> product_type?></span>
	<span><?php echo $product -> product_description?></span>
	

	<a href="/action/addFavorite/<?php echo $product -> id ?>">Add to favorites</a>

	<a href="#">Add to cart</a>
</div>