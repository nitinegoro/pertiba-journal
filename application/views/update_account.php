<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('template/header.php', $this->data);

?>
<div class="page-title">
	<h2>Account</h2> <span></span>
</div>
<div class="box-filter">
	<div class="form form-error">
		<?php 
			echo validation_errors(); 

			echo $this->session->flashdata('alert');

			$get = $this->db->get_where('users', array('ID' => $this->session->userdata('account')->ID))->row();
		?>
	</div>
	<form action="<?php echo current_url() ?>" method="post">
	<div class="form">
		<label class="form-label">Full Name :</label>
		<input name="name" type="text" class="form-control" value="<?php echo $get->name; ?>">
	</div>
	<div class="form">
		<label class="form-label">E-Mail :</label>
		<input name="email" type="email" class="form-control" value="<?php echo $get->email; ?>">
	</div>
	<div class="form">
		<label class="form-label">Username :</label>
		<input name="username" type="text" class="form-control" value="<?php echo $get->username; ?>">
	</div>
	<div class="form">
		<label class="form-label">New Password :</label>
		<input name="password" type="password" class="form-control" value="<?php echo set_value('password'); ?>">
	</div>
	<div class="form">
		<label class="form-label">Repeat Password :</label>
		<input name="repeat_password" type="password" class="form-control" value="<?php echo set_value('password'); ?>">
	</div>
	<div class="form">
		<button type="submit" class="btn default">Change Password</button>
	</div>
	</form>
</div>
<?php

$this->load->view('template/footer.php', $this->data);


/* End of file update_account.php */
/* Location: ./application/views/update_account.php */
