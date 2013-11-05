<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "landing" ); ?>'><?php echo Html::anchor('index/landing','Landing');?></li>
	<li class='<?php echo Arr::get($subnav, "productDetail" ); ?>'><?php echo Html::anchor('index/productDetail','ProductDetail');?></li>
	<li class='<?php echo Arr::get($subnav, "shopping" ); ?>'><?php echo Html::anchor('index/shopping','Shopping');?></li>
	<li class='<?php echo Arr::get($subnav, "cart" ); ?>'><?php echo Html::anchor('index/cart','Cart');?></li>
	<li class='<?php echo Arr::get($subnav, "favorited" ); ?>'><?php echo Html::anchor('index/favorited','Favorited');?></li>

</ul>
<p>ProductDetail</p>