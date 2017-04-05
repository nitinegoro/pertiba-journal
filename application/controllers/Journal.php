<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Controller 
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('pagination','slug','meta_tags'));

		$this->load->model('mjournal', 'journal');

		if($this->session->userdata('account')->user_type != 'admin')
			redirect(base_url());

	}

	public function index()
	{
		
	}

	public function create()
	{
		$this->meta_tags->set_meta_tag('type', 'website');
		$this->meta_tags->set_meta_tag('locale', 'id_ID');
		$this->meta_tags->set_meta_tag('url', base_url());
		$this->meta_tags->set_meta_tag('title', "E-Journal STIE Pertiba Pangkalpinang");
		$this->meta_tags->set_meta_tag('author', "pertiba");
		$this->meta_tags->set_meta_tag('description', "");

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
       
		if ($this->form_validation->run() == TRUE) 
			$this->journal->create();


		$this->data = array(
			'title' => "Create Journal | Jurnal STIE Pertiba Pangkalpinang"
		);

		$this->load->view('create_journal', $this->data);
	}

	public function update($param = 0)
	{
		$this->meta_tags->set_meta_tag('type', 'website');
		$this->meta_tags->set_meta_tag('locale', 'id_ID');
		$this->meta_tags->set_meta_tag('url', base_url());
		$this->meta_tags->set_meta_tag('title', "E-Journal STIE Pertiba Pangkalpinang");
		$this->meta_tags->set_meta_tag('author', "pertiba");
		$this->meta_tags->set_meta_tag('description', "");

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
       
		if ($this->form_validation->run() == TRUE) 
			$this->journal->update($param);


		$this->data = array(
			'title' => "Update Journal | Jurnal STIE Pertiba Pangkalpinang",
			'journal' => $this->db->get_where('journal', array('ID' => $param))->row()
		);

		$this->load->view('update_journal', $this->data);
	}

	public function delete($param = 0)
	{
		$this->db->delete('journal', array('ID' => $param));

		$code  = '<div class="alert alert-success">'."\n";
		$code .= '<span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span>'."\n";
		$code .= "<strong>Success!</strong> Your journal has been deleted."."\n";
		$code .= '</div>';

        $this->session->set_flashdata('alert', $code);

        redirect(base_url());
	}
}

/* End of file Journal.php */
/* Location: ./application/controllers/Journal.php */