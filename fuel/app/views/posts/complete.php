<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('posts/index','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "add" ); ?>'><?php echo Html::anchor('posts/add','Add');?></li>
	<li class='<?php echo Arr::get($subnav, "confirm" ); ?>'><?php echo Html::anchor('posts/confirm','Confirm');?></li>
	<li class='<?php echo Arr::get($subnav, "detail" ); ?>'><?php echo Html::anchor('posts/detail','Detail');?></li>
	<li class='<?php echo Arr::get($subnav, "complete" ); ?>'><?php echo Html::anchor('posts/complete','Complete');?></li>

</ul>
<p>Complete</p>