<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('pagination','slug','meta_tags'));

		$this->load->model('mjournal', 'journal');
	}

	public function index()
	{
		$this->meta_tags->set_meta_tag('type', 'website');
		$this->meta_tags->set_meta_tag('locale', 'id_ID');
		$this->meta_tags->set_meta_tag('url', base_url());
		$this->meta_tags->set_meta_tag('title', "E-Journal STIE Pertiba Pangkalpinang");
		$this->meta_tags->set_meta_tag('author', "pertiba");
		$this->meta_tags->set_meta_tag('description', "");
		$this->meta_tags->set_meta_tag('image', base_url("assets/images/}"));

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = "&laquo; Prev ";
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = " &raquo";
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = " Next &raquo;";
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "&laquo; Prev "; 
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

		$config['base_url'] = site_url("main?query={$this->input->get('query')}");

		$config['per_page'] = 4;
		$config['total_rows'] = $this->journal->all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Jurnal STIE Pertiba Pangkalpinang",
			'journal' => $this->journal->all($config['per_page'], $this->input->get('page'))
		);

		$this->load->view('main_page', $this->data);
	}

	/**
	 * get Detail Journal
	 *
	 * @param String (slug)
	 **/
	public function get()
	{
		$get = $this->journal->get();

		$this->meta_tags->set_meta_tag('type', 'pdf');
		$this->meta_tags->set_meta_tag('locale', 'id_ID');
		$this->meta_tags->set_meta_tag('url', current_url());
		$this->meta_tags->set_meta_tag('title', "Journal - ".$get->title);
		$this->meta_tags->set_meta_tag('author', $get->author);
		$this->meta_tags->set_meta_tag('description', $this->slug->clean_html(word_limiter($get->description, 15)) );
		$this->meta_tags->set_meta_tag('image', base_url("assets/images/{$get->cover}"));

		$this->data = array(
			'title' => "Journal - ".$get->title,
			'journal' => $this->journal->get()
		);

		$this->load->view('detail_page', $this->data);
	}

	public function login()
	{
		$this->meta_tags->set_meta_tag('type', 'website');
		$this->meta_tags->set_meta_tag('locale', 'id_ID');
		$this->meta_tags->set_meta_tag('url', base_url());
		$this->meta_tags->set_meta_tag('title', "E-Journal STIE Pertiba Pangkalpinang");
		$this->meta_tags->set_meta_tag('author', "pertiba");
		$this->meta_tags->set_meta_tag('description', "");

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) 
			$this->journal->set_login();


		$this->data = array(
			'title' => "Login | Jurnal STIE Pertiba Pangkalpinang"
		);

		$this->load->view('login_page', $this->data);
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function register()
	{
		$this->meta_tags->set_meta_tag('type', 'website');
		$this->meta_tags->set_meta_tag('locale', 'id_ID');
		$this->meta_tags->set_meta_tag('url', base_url());
		$this->meta_tags->set_meta_tag('title', "E-Journal STIE Pertiba Pangkalpinang");
		$this->meta_tags->set_meta_tag('author', "pertiba");
		$this->meta_tags->set_meta_tag('description', "");

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|min_length[8]|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('repeat_password', 'Repeat Password', 'trim|matches[password]');

		if ($this->form_validation->run() == TRUE) 
			$this->journal->register();


		$this->data = array(
			'title' => "Register | Jurnal STIE Pertiba Pangkalpinang"
		);

		$this->load->view('register_page', $this->data);
	}

	public function account()
	{
		$this->meta_tags->set_meta_tag('type', 'website');
		$this->meta_tags->set_meta_tag('locale', 'id_ID');
		$this->meta_tags->set_meta_tag('url', base_url());
		$this->meta_tags->set_meta_tag('title', "E-Journal STIE Pertiba Pangkalpinang");
		$this->meta_tags->set_meta_tag('author', "pertiba");
		$this->meta_tags->set_meta_tag('description', "");

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|min_length[8]|required');
		$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('repeat_password', 'Repeat Password', 'trim|matches[password]');

		if ($this->form_validation->run() == TRUE) 
			$this->journal->update_account();


		$this->data = array(
			'title' => "Account | Jurnal STIE Pertiba Pangkalpinang"
		);

		$this->load->view('update_account', $this->data);
	}

	public function tes($value='')
	{
		foreach( $this->db->get('journal')->result() as $row )
			$this->db->update('journal', array('slug' => substr($this->slug->create_slug($row->title), 0, 95)), array('ID' => $row->ID));


	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */