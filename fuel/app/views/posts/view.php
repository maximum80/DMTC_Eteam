<h2>Viewing <span class='muted'>#<?php echo $post->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $post->id; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $post->body; ?></p>
<p>
	<strong>Img:</strong>
	<?php echo $post->img; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $post->user_id; ?></p>
<p>
	<strong>Category id:</strong>
	<?php echo $post->category_id; ?></p>
<p>
	<strong>Deadline:</strong>
	<?php echo $post->deadline; ?></p>
<p>
	<strong>Location longitude:</strong>
	<?php echo $post->location_longitude; ?></p>
<p>
	<strong>Location latitude:</strong>
	<?php echo $post->location_latitude; ?></p>

<?php echo Html::anchor('posts/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('posts', 'Back'); ?>