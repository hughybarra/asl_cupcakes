<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "landing" ); ?>'><?php echo Html::anchor('index/landing','Landing');?></li>
	<li class='<?php echo Arr::get($subnav, "pDetail" ); ?>'><?php echo Html::anchor('index/pDetail','PDetail');?></li>
	<li class='<?php echo Arr::get($subnav, "cart" ); ?>'><?php echo Html::anchor('index/cart','Cart');?></li>
	<li class='<?php echo Arr::get($subnav, "favorited" ); ?>'><?php echo Html::anchor('index/favorited','Favorited');?></li>

</ul>
<p>Cart</p>