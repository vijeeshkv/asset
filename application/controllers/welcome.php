<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){ 
		
		parent::__construct(); 
        $this->load->helper('url'); 
        $this->load->library('form_validation'); 
        $this->load->config('ion_auth', TRUE); 
	}
	public function index()
	{
                $this->data['site_title'] = $this->config->item('site_title', 'ion_auth'); 
                $this->load->view('header'); 
                $this->load->view('welcome/nav', $this->data); 
				$this->load->view('welcome/welcome_message');
                $this->load->view('footer'); 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */