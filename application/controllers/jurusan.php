<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Jurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    function index()
    {
        $this->load->model("jurusan_model","jm");

        $data["qry_jurusan"] = $this->jm->get_all_data();
        $data["icon"] = "building";
        $data["my_title"] = "jurusan";
        $data["title"] = "jurusan";
        $data["content"] = "jurusan/home";
        $this->load->view("template", $data);
    }

    function form_tambah()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $data["icon"] = "file-o";
            $data["my_title"] = "jurusan";
            $data["title"] = "jurusan";
            $data["content"] = "jurusan/form";
            $this->load->view('template', $data);
        }
    }

    function form()
    {
        $this->load->model("jurusan_model", "jm");

        $data_form["txt_jurusan_id"] = $this->input->post("txt_jurusan_id", TRUE);
        $data_form["txt_jurusan_deskripsi"] = $this->input->post("txt_jurusan_deskripsi", TRUE);

        if($this->input->post("btn_simpan") === "btn_simpan")
        {
            // cek data kembar
            $cek_jurusan = $this->fm->check_jurusan($data_form["txt_fakultas_deskripsi"]);

            //klo data tidak ada yang kembar
            if($cek_jurusan === 0)
            {
                // simpan ke database
                $simpan = $this->jm->insert_jurusan($data_form);

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

                $data["qry_jurusan"] = $this->jm->get_all_data();
                $data["icon"] = "building";
                $data["my_title"] = "jurusan";
                $data["title"] = "jurusan";
                $data["content"] = "jurusan/home";
                $this->load->view("template", $data);
            }
        }
        elseif($this->input->post("btn_simpan") === "btn_update")
        {
            $simpan = $this->jm->update_jurusan($data_form);

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

            $data["qry_jurusan"] = $this->jm->get_all_data();
            $data["icon"] = "building";
            $data["my_title"] = "jurusan";
            $data["title"] = "jurusan";
            $data["content"] = "jurusan/home";
            $this->load->view("template", $data);
        }
        else
        {
            $this->index();
        }
    }

    function edit()
    {
        $this->load->model("jurusan_model", "jm");

        $jurusan_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;

        $data["qry_jurusan"] = $this->jm->get_all_data($jurusan_id);
        $data["icon"] = "building";
        $data["my_title"] = "jurusan";
        $data["title"] = "jurusan";
        $data["content"] = "jurusan/form";
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

/* End of file jurusan.php */
/* Location: ./application/controllers/jurusan.php */
