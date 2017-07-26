<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 * 
 */

class Siswa_nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }
    
    function index()
    {
        $this->load->model("siswa_nilai_model");
        
        $data["qry_siswa_nilai"] = $this->siswa_nilai_model->get_all_data();
        $data["icon"] = "building";
        $data["title"] = "siswa nilai";
        $data["my_title"] = "siswa_nilai";
        $data["content"] = "siswa_nilai/home";
        $this->load->view("template", $data);
    }
    
    function form_tambah()
    {
        $this->load->library('form_validation');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->model("siswa_nilai_model", "sm");
            
            $data["qry_siswa"] = $this->sm->get_all_siswa();
            $data["icon"] = "file-o";
            $data["title"] = "Siswa Nilai";
            $data["my_title"] = "siswa_nilai";
            $data["content"] = "siswa_nilai/form";
            $this->load->view('template', $data);
        }
    }
    
    function form()
    {
        $this->load->model("siswa_nilai_model", "sm");
        
        $data_form["txt_snr_siswa"] = $this->input->post("txt_snr_siswa", TRUE);
        $data_form["txt_snr_rataan_semester_1"] = $this->input->post("txt_snr_rataan_semester_1", TRUE);
        $data_form["txt_snr_rataan_semester_2"] = $this->input->post("txt_snr_rataan_semester_2", TRUE);
        $data_form["txt_snr_rataan_semester_3"] = $this->input->post("txt_snr_rataan_semester_3", TRUE);
        $data_form["txt_snr_rataan_semester_4"] = $this->input->post("txt_snr_rataan_semester_4", TRUE);
        $data_form["txt_snr_rataan_semester_5"] = $this->input->post("txt_snr_rataan_semester_5", TRUE);
        
        if($this->input->post("btn_simpan") === "btn_simpan")
        {
            // simpan ke database
            $simpan = $this->sm->insert_siswa_nilai($data_form);
            
            // klo berhasil menyimpan
            if($simpan === 1)
            {
                $data["flag_simpan"] = 1;
                $data["message"] = "data berhasil disimpan";
            }
            else
            {
                $data["flag_simpan"] = 0;
                $data["message"] = "data tidak berhasil disimpan";
            }
            redirect('siswa', 'refresh');
            /*
            $data["qry_siswa_nilai"] = $this->sm->get_all_data();
            $data["icon"] = "building";
            $data["title"] = "Siswa";
            $data["my_title"] = "siswa";
            $data["content"] = "siswa/home";
            $this->load->view("template", $data);
            */
        }
        else
        {
            $this->index();
        }
    }
    
    function edit()
    {
        $this->load->model("siswa_nilai_model", "sm");
        
        $siswa_nilai_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
        if($this->sm->get_all_data($siswa_nilai_id) != FALSE)
        {
            $data["qry_snr"] = $this->sm->get_all_data($siswa_nilai_id);
        }
        $data["qry_siswa"] = $this->sm->get_all_siswa();
        $data["icon"] = "building";
        $data["title"] = "Siswa Nilai";
        $data["my_title"] = "siswa";
        $data["content"] = "siswa_nilai/form";
        $this->load->view("template", $data);
    }
    
    private function cek_login()
    {
        if( ! $this->session->userdata('isLoggedIn') OR $this->session->userdata('isLoggedIn') === FALSE)
        {
            redirect("auth");
        }
    }
}

/* End of file siswa_nilai_nilai.php */
/* Location: ./application/controllers/siswa_nilai_nilai.php */