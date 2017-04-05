<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('template/header.php', $this->data);

if($this->input->get('filter') == 'true') :
?>
<div class="box-filter">
	<form action="<?php echo current_url() ?>" method="get">
	<div class="form">
		<label class="form-label">Category :</label>
		<select class="form-control" name="category">
			<option value="">-- Select One --</option>
		</select>
	</div>
	<div class="form">
		<label class="form-label">Author :</label>
		<select class="form-control" name="author">
			<option value="">-- Select One --</option>
		</select>
	</div>
	<div class="form">
		<label class="form-label">Keyword :</label>
		<input name="query" type="text" class="form-control" placeholder="Title / Abstract / Advisor ..." value="<?php echo $this->input->get('query') ?>">
	</div>
	<div class="form">
		<button type="submit" name="filter" value="true" class="btn default">Search Journal</button>
	</div>
	</form>
	<h3>Results : "<?php echo $this->input->get('query') ?>"</h3> 
</div>
<div style="clear: both;"></div>
<?php
endif;
?>
<div class="form form-error">
	<?php 
		echo $this->session->flashdata('alert');
	?>
</div>
<?php
foreach($journal as $row) :
?>
<div style="clear: both;"></div>
<div class="box-list">
	<img src="<?php echo base_url("public/cover/{$row->cover}") ?>" alt="">
	<div class="box-content">
		<h3><a href="<?php echo base_url($row->slug); ?>" class="title"><?php echo $row->title; ?></a></h3>
		<p><small><i>Author : <a href=""><?php echo $row->author; ?></a></i></small></p>
		<p><?php echo $this->slug->clean_html(word_limiter($row->description, 15)); ?></p>
		<p><a href="<?php echo base_url($row->slug); ?>" class="read-more">Read more..</a></p>
	</div>
</div>
<div style="clear: both;"></div>
<?php endforeach; ?>
<div class="pagination">
	<?php echo $this->pagination->create_links(); ?>
</div>

<?php

$this->load->view('template/footer.php', $this->data);


/* End of file main_page.php */
/* Location: ./application/views/main_page.php */
