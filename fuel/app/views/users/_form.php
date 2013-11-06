<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('User name', 'user_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_name', Input::post('user_name', isset($user) ? $user->user_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('User email', 'user_email', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_email', Input::post('user_email', isset($user) ? $user->user_email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('User pass', 'user_pass', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_pass', Input::post('user_pass', isset($user) ? $user->user_pass : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User pass')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>