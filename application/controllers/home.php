<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 * 
 */

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->cek_login();
	}
	
	public function index()
	{
		$data["icon"] = "home";
		$data["title"] = "home";
		$data["content"] = "home";
		$this->load->view('template', $data);
	}
    
    private function cek_login()
    {
        if( ! $this->session->userdata('isLoggedIn') OR $this->session->userdata('isLoggedIn') === FALSE)
        {
            redirect("auth");
        }
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */