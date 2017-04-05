<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('template/header.php', $this->data);

?>
<div class="page-title">
	<h2>Update Journal</h2> <span></span>
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
		<label class="form-label">Title :</label>
		<input name="title" type="text" class="form-control" value="<?php echo $journal->title; ?>">
	</div>
	<div class="form">
		<label class="form-label">Author :</label>
		<input name="author" type="text" class="form-control" value="<?php echo $journal->author; ?>">
	</div>
	<div class="form">
		<label class="form-label">Category :</label>
		<select name="category" class="form-control">
			<option value="">-- Select One --</option>
			<?php foreach($this->db->get('category')->result() as $row) : ?>
			<option value="<?php echo $row->ID; ?>"><?php echo $row->name; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form">
		<label class="form-label">File PDF :</label>
		<input name="file" type="file" class="form-control">
	</div>
	<div class="form">
		<label class="form-label">Description :</label>
	</div>
	<div class="form">
		<textarea name="description" id="description" cols="30" rows="10"><?php echo $journal->description; ?></textarea>
	</div>
	<div class="form">
		<button type="submit" class="btn default">Update Journal</button>
	</div>
	</form>
</div>
<?php

$this->load->view('template/footer.php', $this->data);


/* End of file update_journal.php */
/* Location: ./application/views/update_journal.php */
