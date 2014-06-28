<h2>Listing <span class='muted'>Posts</span></h2>
<br>
<?php if ($posts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Body</th>
			<th>Img</th>
			<th>User id</th>
			<th>Category id</th>
			<th>Deadline</th>
			<th>Location longitude</th>
			<th>Location latitude</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->body; ?></td>
			<td><?php echo $item->img; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->category_id; ?></td>
			<td><?php echo $item->deadline; ?></td>
			<td><?php echo $item->location_longitude; ?></td>
			<td><?php echo $item->location_latitude; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('posts/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('posts/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('posts/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Posts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('posts/create', 'Add new Post', array('class' => 'btn btn-success')); ?>

</p>
