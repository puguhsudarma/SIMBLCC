<?php
$this->load->view('Part_messages_view');
?>
<form action="<?php echo site_url('autentikasi/login'); ?>" method="POST" name="form_login" role="form">
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" id="username" placeholder ="Username" value="<?php echo set_value('username'); ?>" />
		<p class="form_error"><?php form_error('username'); ?></p>
	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>" />
		<p class="form_error"><?php form_error('password'); ?></p>
	</div>

	<input type="submit" name="submit_login" value="Login" class="btn btn-primary" />
</form>