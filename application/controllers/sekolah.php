<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Sekolah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    function index()
    {
        $this->load->model("sekolah_model", "sm");

        $data["qry_sekolah"] = $this->sm->get_all_data();
        $data["icon"] = "building";
        $data["title"] = "sekolah";
        $data["my_title"] = "sekolah";
        $data["content"] = "sekolah/home";
        $this->load->view("template", $data);
    }

    function form_tambah()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $data["icon"] = "file-o";
            $data["title"] = "sekolah";
            $data["my_title"] = "sekolah";
            $data["content"] = "sekolah/form";
            $this->load->view('template', $data);
        }
    }

    function form()
    {
        $this->load->model("sekolah_model", "sm");

        $data_form["txt_sekolah_id"] = $this->input->post("txt_sekolah_id", TRUE);
        $data_form["txt_sekolah_deskripsi"] = $this->input->post("txt_sekolah_deskripsi", TRUE);
        $data_form["opt_sekolah_akreditasi"] = $this->input->post("opt_sekolah_akreditasi", TRUE);

        if($this->input->post("btn_simpan") === "btn_simpan")
        {
            // cek data kembar
            $cek_sekolah = $this->sm->check_sekolah($data_form["txt_sekolah_deskripsi"]);

            //klo data tidak ada yang kembar
            if($cek_sekolah === 0)
            {
                // simpan ke database
                $simpan = $this->sm->insert_sekolah($data_form);

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

                $data["qry_sekolah"] = $this->sm->get_all_data();
                $data["icon"] = "building";
                $data["my_title"] = "sekolah";
                $data["title"] = "sekolah";
                $data["content"] = "sekolah/home";
                $this->load->view("template", $data);
            }
            else
            {
                $data["icon"] = "building";
                $data["title"] = "sekolah";
                $data["my_title"] = "sekolah";
                $data["content"] = "sekolah/form";
                $data["message"] = "Data <b>".$data_form["txt_sekolah_deskripsi"]."</b> Sudah Ada Tong!";
                $this->load->view("template", $data);
            }
        }
        elseif($this->input->post("btn_simpan") === "btn_update")
        {
            $simpan = $this->sm->update_sekolah($data_form);

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

            $data["qry_sekolah"] = $this->sm->get_all_data();
            $data["icon"] = "building";
            $data["my_title"] = "sekolah";
            $data["title"] = "sekolah";
            $data["content"] = "sekolah/home";
            $this->load->view("template", $data);
        }
        else
        {
            $this->index();
        }
    }

    function edit()
    {
        $this->load->model("sekolah_model", "sm");

        $sekolah_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;

        $data["qry_sekolah"] = $this->sm->get_all_data($sekolah_id);
        $data["icon"] = "building";
        $data["my_title"] = "sekolah";
        $data["title"] = "sekolah";
        $data["content"] = "sekolah/form";
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

/* End of file sekolah.php */
/* Location: ./application/controllers/sekolah.php */
