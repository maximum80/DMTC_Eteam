<?php echo Form::open(array("class"=>"form-horizontal")); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('username', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'ユーザー名を入力してください')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'メールアドレスを入力してください')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::password('password', Input::post('pass', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'パスワードを入力してください')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tel', 'tel', array('class'=>'control-label')); ?>

				<?php echo Form::input('tel', Input::post('tel', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'電話番号を入力してください')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('img', 'img', array('class'=>'control-label')); ?>

				<?php echo Form::input('img', Input::post('img', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '会員登録', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>