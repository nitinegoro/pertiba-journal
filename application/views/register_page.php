<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('template/header.php', $this->data);

?>
<div class="page-title">
	<h2>Register</h2> <span></span>
</div>
<div class="box-filter">
	<div class="form form-error">
		<?php 
			echo validation_errors(); 

			echo $this->session->flashdata('alert');
		?>
	</div>
	<form action="<?php echo current_url() ?>" method="post">
	<div class="form">
		<label class="form-label">Full Name :</label>
		<input name="name" type="text" class="form-control" value="<?php echo set_value('name'); ?>">
	</div>
	<div class="form">
		<label class="form-label">E-Mail :</label>
		<input name="email" type="email" class="form-control" value="<?php echo set_value('email'); ?>">
	</div>
	<div class="form">
		<label class="form-label">Username :</label>
		<input name="username" type="text" class="form-control" value="<?php echo set_value('username'); ?>">
	</div>
	<div class="form">
		<label class="form-label">Password :</label>
		<input name="password" type="password" class="form-control" value="<?php echo set_value('password'); ?>">
	</div>
	<div class="form">
		<label class="form-label">Repeat Password :</label>
		<input name="repeat_password" type="password" class="form-control" value="<?php echo set_value('password'); ?>">
	</div>
	<div class="form">
		<button type="submit" class="btn default">Register</button>
	</div>
	</form>
</div>
<?php

$this->load->view('template/footer.php', $this->data);


/* End of file register_page.php */
/* Location: ./application/views/register_page.php */
