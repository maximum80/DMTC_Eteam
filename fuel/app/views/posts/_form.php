<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($post) ? $post->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Body', 'body', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('body', Input::post('body', isset($post) ? $post->body : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Body')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Img', 'img', array('class'=>'control-label')); ?>

				<?php echo Form::input('img', Input::post('img', isset($post) ? $post->img : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Img')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($post) ? $post->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Category id', 'category_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('category_id', Input::post('category_id', isset($post) ? $post->category_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Category id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Deadline', 'deadline', array('class'=>'control-label')); ?>

				<?php echo Form::input('deadline', Input::post('deadline', isset($post) ? $post->deadline : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Deadline')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Location longitude', 'location_longitude', array('class'=>'control-label')); ?>

				<?php echo Form::input('location_longitude', Input::post('location_longitude', isset($post) ? $post->location_longitude : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Location longitude')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Location latitude', 'location_latitude', array('class'=>'control-label')); ?>

				<?php echo Form::input('location_latitude', Input::post('location_latitude', isset($post) ? $post->location_latitude : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Location latitude')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>