<h2>Viewing <span class='muted'>#<?php echo $user->id; ?></span></h2>

<p>
	<strong>User name:</strong>
	<?php echo $user->user_name; ?></p>
<p>
	<strong>User email:</strong>
	<?php echo $user->user_email; ?></p>
<p>
	<strong>User pass:</strong>
	<?php echo $user->user_pass; ?></p>

<?php echo Html::anchor('users/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('users', 'Back'); ?>