<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {

		parent::__construct();
		if($this->session->userdata('user_id')){
			redirect('web');
		}
	}
	public function index()
	{
		$this->form_validation->set_rules('user_name', 'username or email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			if ($this->form_validation->run() == true) {
				$userinfo = $this->custom_model->where(['email' => $this->input->post('user_name')])
					->where(['password' => $this->custom_model->hash($this->input->post('password'))])
					->first('users','name,id,profile_picture');

				if(count($userinfo) > 0) {

					$this->session->set_userdata('user_id', $userinfo->id);
					$this->session->set_userdata('user_name', $userinfo->name);
					$this->session->set_userdata('user_image', $userinfo->profile_picture);

					redirect('/');
				} else {
					$this->session->set_flashdata('error', "The email address or user name that you've entered doesn't match any account");
				}
				redirect('auth');
			}
		}
		$this->load->view('web/login');
		//$this->load->view('web/layout/layout',['subview' => ['web/auth/login']]);
	}
}
