<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){ 
		
            parent::__construct();
            $this->load->library(array('ion_auth','session','form_validation') );
            $this->load->helper('url');
            $this->load->config('ion_auth', TRUE);
            $this->load->model('user');
            $this->data['is_admin'] = $this->ion_auth->is_admin();
            $this->data['user'] = $this->ion_auth->user($this->session->userdata('id'))->row();
	}
	public function index()
	{
            if (!$this->ion_auth->logged_in())
            {
		//redirect them to the login page
		redirect('auth/login', 'refresh');
            }
	    elseif (!$this->ion_auth->is_admin())
	    {
		//redirect them to the home page because they must be an administrator to view this
		redirect('/', 'refresh');
	    }
	    else
	    {
		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//list the users
		//print_r( $this->data['user']);
                $this->data['site_title'] = $this->config->item('site_title', 'ion_auth');
                $this->load->view('header',$this->data); 
                $this->load->view('nav/nav', $this->data);
		$this->load->view('dashboard/dashboard');
                $this->load->view('footer',$this->data);
	  }
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */