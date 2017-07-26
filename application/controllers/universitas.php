<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Universitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    function index()
    {
        $this->load->model("universitas_model", "sm");

        $data["qry_universitas"] = $this->sm->get_all_data();
        $data["icon"] = "building";
        $data["title"] = "universitas";
        $data["my_title"] = "universitas";
        $data["content"] = "universitas/home";
        $this->load->view("template", $data);
    }

    function form_tambah()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $data["icon"] = "file-o";
            $data["title"] = "universitas";
            $data["my_title"] = "universitas";
            $data["content"] = "universitas/form";
            $this->load->view('template', $data);
        }
    }

    function form()
    {
        $this->load->model("universitas_model", "sm");

        $data_form["txt_universitas_id"] = $this->input->post("txt_universitas_id", TRUE);
        $data_form["txt_universitas_deskripsi"] = $this->input->post("txt_universitas_deskripsi", TRUE);

        if($this->input->post("btn_simpan") === "btn_simpan")
        {
            // cek data kembar
            $cek_universitas = $this->sm->check_universitas($data_form["txt_universitas_deskripsi"]);

            //klo data tidak ada yang kembar
            if($cek_universitas === 0)
            {
                // simpan ke database
                $simpan = $this->sm->insert_universitas($data_form);

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

                $data["qry_universitas"] = $this->sm->get_all_data();
                $data["icon"] = "building";
                $data["my_title"] = "universitas";
                $data["title"] = "universitas";
                $data["content"] = "universitas/home";
                $this->load->view("template", $data);
            }
            else
            {
                $data["icon"] = "building";
                $data["title"] = "universitas";
                $data["my_title"] = "universitas";
                $data["content"] = "universitas/form";
                $data["message"] = "Data <b>".$data_form["txt_universitas_deskripsi"]."</b> Sudah Ada Tong!";
                $this->load->view("template", $data);
            }
        }
        elseif($this->input->post("btn_simpan") === "btn_update")
        {
            $simpan = $this->sm->update_universitas($data_form);

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

            $data["qry_universitas"] = $this->sm->get_all_data();
            $data["icon"] = "building";
            $data["my_title"] = "universitas";
            $data["title"] = "universitas";
            $data["content"] = "universitas/home";
            $this->load->view("template", $data);
        }
        else
        {
            $this->index();
        }
    }

    function edit()
    {
        $this->load->model("universitas_model", "sm");

        $universitas_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;

        $data["qry_universitas"] = $this->sm->get_all_data($universitas_id);
        $data["icon"] = "building";
        $data["my_title"] = "universitas";
        $data["title"] = "universitas";
        $data["content"] = "universitas/form";
        $this->load->view("template", $data);
    }

    function form_upload()
    {
        $data["icon"] = "file-o";
        $data["title"] = "universitas";
        $data["my_title"] = "universitas";
        $data["content"] = "universitas/form_upload";
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

/* End of file universitas.php */
/* Location: ./application/controllers/universitas.php */
