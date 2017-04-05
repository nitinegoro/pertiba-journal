<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mjournal extends CI_Model 
{
	public $param;
	
	public $field;

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('upload','slug'));
				
		$this->param = $this->uri->segment(1);
				
		$this->field = 'slug';
	}

	public function all($limit = 20, $offset = 0, $type = 'result')
	{
		$this->db->select('journal.*, category.ID, category.name');

		$this->db->join('category', 'journal.category = category.ID', 'left');

		if($this->input->get('query') != '')
			$this->db->like('journal.title', $this->input->get('query'));

		$this->db->order_by('journal.ID', 'desc');

		if($type == 'result')
		{
			return $this->db->get('journal', $limit, $offset)->result();
		} else {
			return $this->db->get('journal')->num_rows();
		}
	}
	
	public function get($param = '')
	{
		$this->db->select('journal.*, category.name');

		$this->db->join('category', 'journal.category = category.ID', 'left');

		$this->db->where('journal.slug', $this->param);

		return $this->db->get('journal')->row();
	}

	/**
	 * Take a data administrator account
	 *
	 * @return Object
	 **/
	public function set_login()
	{
		// get query prepare statmennts
		$query = $this->db->query("
			SELECT ID, name, username, password, email, user_type FROM users WHERE username = ?", array($this->input->post('username')));

		if($query->num_rows() == 1)
		{
			$account = $query->row();

        	// authentifaction dengan password verify
        	if (password_verify($this->input->post('password'), $account->password)) 
        	{
		        // set session data
		        $account_session = array(
		        	'is_login' => TRUE,
		        	'ID' => $account->ID,
		        	'account' => $account
		        );	
		        
		        $this->session->set_userdata( $account_session );

		        redirect(base_url());
        	} else {
				$code  = '<div class="alert alert-danger">'."\n";
				$code .= '<span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span>'."\n";
				$code .= '<strong>Danger!</strong> The combination of username and password do not match.'."\n";
				$code .= '</div>';

        		$this->session->set_flashdata('alert', $code);
        	}
		} else {
			$code  = '<div class="alert alert-danger">'."\n";
			$code .= '<span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span>'."\n";
			$code .= '<strong>Danger!</strong> The username is not registered.'."\n";
			$code .= '</div>';

        	$this->session->set_flashdata('alert', $code);
		}
	}

	public function register()
	{
		$user = array(
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'user_type' => 'user' 
		);

		$this->db->insert('users', $user);

		$code  = '<div class="alert alert-success">'."\n";
		$code .= '<span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span>'."\n";
		$code .= "<strong>Success!</strong> Thank's {$user['name']} have registered in our system."."\n";
		$code .= '</div>';

        $this->session->set_flashdata('alert', $code);
	}

	public function create()
	{
		$config['upload_path'] = './public/files';
		$config['allowed_types'] = 'pdf';
		
		$this->upload->initialize($config);
		
		$this->upload->do_upload('file');

		$journal = array(
			'title' => $this->input->post('title'),
			'slug' => $this->slug->create_slug($this->input->post('title')),
			'cover' => 'book-1.jpg',
			'file' => $this->upload->file_name,
			'description' => $this->input->post('description'),
			'category' => $this->input->post('category'),
			'date' => date('Y-m-d'),
			'author' => $this->input->post('author')
		);

		$this->db->insert('journal', $journal);

		$code  = '<div class="alert alert-success">'."\n";
		$code .= '<span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span>'."\n";
		$code .= "<strong>Success!</strong> Your journal has been created."."\n";
		$code .= '</div>';

        $this->session->set_flashdata('alert', $code);
	}

	public function update($param = 0)
	{
		$config['upload_path'] = './public/files';
		$config['allowed_types'] = 'pdf';
		
		$this->upload->initialize($config);

		$get = $this->db->get_where('journal', array('ID' => $param))->row();
		
		if( $this->upload->do_upload('file') ) 
		{
			if($get->file != '')
				unlink("./public/files/{$get->file}");

			$file = $this->upload->file_name;
		} else {
			$file = $get->file;
		}

		$journal = array(
			'title' => $this->input->post('title'),
			'slug' => $this->slug->create_slug($this->input->post('title')),
			'file' => $file,
			'description' => $this->input->post('description'),
			'category' => $this->input->post('category'),
			'author' => $this->input->post('author')
		);

		$this->db->update('journal', $journal, array('ID' => $param));

		$code  = '<div class="alert alert-success">'."\n";
		$code .= '<span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span>'."\n";
		$code .= "<strong>Success!</strong> Your journal has been saved."."\n";
		$code .= '</div>';

        $this->session->set_flashdata('alert', $code);
	}

	public function update_account()
	{
		$get = $this->db->get_where('users', array('ID' => $this->session->userdata('account')->ID))->row();

		$user = array(
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
		);

		$this->db->update('users', $user, array('ID' => $get->ID));

		$code  = '<div class="alert alert-success">'."\n";
		$code .= '<span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span>'."\n";
		$code .= "<strong>Success!</strong> Thank's {$user['name']}, New password has been changed."."\n";
		$code .= '</div>';

        $this->session->set_flashdata('alert', $code);
	}
}

/* End of file Mjournal.php */
/* Location: ./application/models/Mjournal.php */