<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
    /*
     * @author zulyantara <zulyantara@gmail.com>
     * @copyright copyright 2014 zulyantara
     */
    
	function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(FALSE);
	}
	
    function index()
    {
        if($this->session->userdata('isLoggedIn') === FALSE)
        {
            $this->load->view('login/home');
        }
        else
        {
        	redirect('home');
        }
    }
	
	function form_change_password()
	{
		$this->load->library('form_validation');
		
        $data["icon"] = "cog";
        $data["my_title"] = "change password";
        $data["title"] = "change password";
        $data["content"] = "login/form";
        $this->load->view("template", $data);
	}
	
	function change_password()
	{
		$this->load->model("auth_model", "am");
		$this->load->library('form_validation');
		
		$data["txt_user_id"] = $this->session->userdata("userId");
		$data["txt_old_password"] = $this->input->post("txt_old_password");
		$data["txt_new_password"] = $this->input->post("txt_new_password");
		$data["txt_confirm_password"] = $this->input->post("txt_confirm_password");
		
		$this->form_validation->set_rules('txt_old_password', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('txt_new_password', 'New Password', 'trim|required|matches[txt_confirm_password]');
		$this->form_validation->set_rules('txt_confirm_password', 'Password Confirmation', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data["icon"] = "cog";
			$data["my_title"] = "change password";
			$data["title"] = "change password";
			$data["content"] = "login/form";
			$this->load->view("template", $data);
		}
		else
		{
			//check password
			$cp = $this->am->check_password($data);
			
			if($cp->jml === "1")
			{
				$update = $this->am->update_password($data);
				if($update === 1)
				{
					$data["icon"] = "cog";
					$data["my_title"] = "change password";
					$data["title"] = "change password";
					$data["content"] = "login/form";
					$data["message"] = "Password berhasil diubah";
					$this->load->view("template", $data);
				}
				else
				{
					redirect("/auth/form_change_password","refresh");
				}
			}
			else
			{
				$data["icon"] = "cog";
				$data["my_title"] = "change password";
				$data["title"] = "change password";
				$data["content"] = "login/form";
				$data["message"] = "Old Password tidak sama";
				$this->load->view("template", $data);
			}
		}
	}
    
    function validate_credential()
    {
		if($this->input->post('btn_login') === 'btn_login')
		{
			$this->load->model('auth_model');
			
			$query = $this->auth_model->validate($this->input->post('txt_user_name'), $this->input->post('txt_user_password'));
			if($query != FALSE)
			{
				$data = array(
					'userId' => $query->user_id,
					'userName' => $query->user_name,
					'userRealName' => $query->user_real_name,
					'userCabang' => $query->user_cabang,
					'userLevel' => $query->user_level,
					'isLoggedIn' => TRUE
				);
				
				$this->session->set_userdata($data);
				redirect("home");
			}
			else
			{
				$data['error'] = "Username atau Password salah";
				$this->load->view('login/home', $data);
			}
		}
		else
		{
			$data['error'] = "Anda harus login terlebih dahulu";
			$this->load->view('login/home', $data);
		}
    }
	
    function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('login/home');
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */