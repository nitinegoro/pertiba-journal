<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('template/header.php', $this->data);

?>
<div class="box-list">
	<div class="box-detail">
		<h1><?php echo $journal->title; ?></h1>
		<p><small>Author : <a href=""><?php echo $journal->author; ?></a></small></p>
		<a class="btn default">Download PDF</a>
		<?php if($this->session->userdata('account')->user_type == 'admin') : ?>
		<a href="<?php echo base_url("journal/update/{$journal->ID}"); ?>" class="btn info">Update</a>
		<a class="btn danger" onclick="delete_journal('<?php echo $journal->ID ?>')">Delete</a>
		<?php endif; ?>
		<div class="detail-paragraph">
			<h3>Abstrak</h3>
			<?php echo $journal->description; ?>
		</div>
	</div>
</div>
<div style="clear: both;"></div>
<div class="pagination">
	<?php echo $this->pagination->create_links(); ?>
</div>

<?php

$this->load->view('template/footer.php', $this->data);


/* End of file detail_page.php */
/* Location: ./application/views/detail_page.php */
