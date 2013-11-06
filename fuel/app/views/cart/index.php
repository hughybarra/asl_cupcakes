<h1>Shopping Cart</h1>
<div class="shopping-cart">
	<div>
		<span>Total</span>
		<span>$23.54</span>
		<a href="#" class="button-submit">Checkout</a>
	</div>
</div>
<div class="cart-items">
	
	<?php foreach ($cart as $item): ?>
		
	<div class="cart-item">
		<div class="cupcake-thumb">
			<img src="/assets/img/cupcakes/<?php echo $item['image_path']; ?>.png">
		</div>
		<div class="cupcake-cart-info">
			<span class="cupcake-name"><?php echo $item['name']; ?></span>
			<span>Price</span>
			<span>$<?php echo $item['price']; ?></span>
			<span>Quantity</span>
			<span><?php echo $item['quantity']; ?></span>
		</div>
	</div>
	
	<?php endforeach; ?>
	
</div>
