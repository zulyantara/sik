<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    function index()
    {
        $this->load->model("siswa_model","sm");

        $data["qry_siswa"] = $this->sm->get_all_data();
        $data["qry_sekolah"] = $this->sm->get_all_sekolah();
        $data["qry_jurusan"] = $this->sm->get_all_jurusan();
        $data["qry_cabang"] = $this->sm->get_all_cabang();
        $data["icon"] = "building";
        $data["my_title"] = "siswa";
        $data["title"] = "siswa";
        $data["content"] = "siswa/home";
        $this->load->view("template", $data);
    }

    /*
     * untuk ajax tapi belum diimplementasikan
     */
    function view_siswa()
    {
        $this->load->view("siswa/home");
    }

    function form_tambah()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->model("siswa_model", "sm");

            $data["qry_sekolah"] = $this->sm->get_all_sekolah();
            $data["qry_jurusan"] = $this->sm->get_all_jurusan();
            $data["qry_cabang"] = $this->sm->get_all_cabang();
            $data["icon"] = "file-o";
            $data["my_title"] = "siswa";
            $data["title"] = "siswa";
            $data["content"] = "siswa/form";
            $this->load->view('template', $data);
        }
    }

    function form()
    {
        $this->load->model("siswa_model", "sm");

        $data_form["txt_siswa_id"] = $this->input->post("txt_siswa_id", TRUE);
        $data_form["txt_siswa_nama"] = $this->input->post("txt_siswa_nama", TRUE);
        $data_form["opt_siswa_sekolah"] = $this->input->post("opt_siswa_sekolah", TRUE);
        $data_form["opt_siswa_jurusan"] = $this->input->post("opt_siswa_jurusan", TRUE);
        $data_form["opt_siswa_jenis_kelas"] = $this->input->post("opt_siswa_jenis_kelas", TRUE);
        $data_form["opt_siswa_cabang"] = $this->input->post("opt_siswa_cabang", TRUE);
        $data_form["txt_siswa_ta"] = $this->input->post("txt_siswa_ta", TRUE);
        $data_form["txt_siswa_htm"] = $this->input->post("txt_siswa_htm", TRUE);

        if($this->input->post("btn_simpan") === "btn_simpan")
        {
            // simpan ke database
            $simpan = $this->sm->insert_siswa($data_form);

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

            $data["qry_siswa"] = $this->sm->get_all_data();
            $data["qry_sekolah"] = $this->sm->get_all_sekolah();
            $data["qry_jurusan"] = $this->sm->get_all_jurusan();
            $data["qry_cabang"] = $this->sm->get_all_cabang();
            $data["icon"] = "building";
            $data["my_title"] = "siswa";
            $data["title"] = "siswa";
            $data["content"] = "siswa/home";
            $this->load->view("template", $data);
        }
        elseif($this->input->post("btn_simpan") === "btn_update")
        {
            $simpan = $this->sm->update_siswa($data_form);

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

            $data["qry_siswa"] = $this->sm->get_all_data();
            $data["qry_sekolah"] = $this->sm->get_all_sekolah();
            $data["qry_jurusan"] = $this->sm->get_all_jurusan();
            $data["qry_cabang"] = $this->sm->get_all_cabang();
            $data["icon"] = "building";
            $data["my_title"] = "siswa";
            $data["title"] = "siswa";
            $data["content"] = "siswa/home";
            $this->load->view("template", $data);
        }
        else
        {
            $this->index();
        }
    }

    function edit()
    {
        $this->load->model("siswa_model", "sm");

        $siswa_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
        //echo $siswa_id;
        $data["qry_siswa"] = $this->sm->get_all_data($siswa_id);
        $data["qry_sekolah"] = $this->sm->get_all_sekolah();
        $data["qry_jurusan"] = $this->sm->get_all_jurusan();
        $data["qry_cabang"] = $this->sm->get_all_cabang();
        $data["icon"] = "building";
        $data["my_title"] = "siswa";
        $data["title"] = "siswa";
        $data["content"] = "siswa/form";
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

/* End of file siswa.php */
/* Location: ./application/controllers/siswa.php */
