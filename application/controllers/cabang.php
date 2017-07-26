<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    function index()
    {
        $this->load->model("cabang_model","cm");

        $data["qry_cabang"] = $this->cm->get_all_data();
        $data["icon"] = "building";
        $data["my_title"] = "cabang";
        $data["title"] = "cabang";
        $data["content"] = "cabang/home";
        $this->load->view("template", $data);
    }

    function form_tambah()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $data["icon"] = "file-o";
            $data["my_title"] = "cabang";
            $data["title"] = "cabang";
            $data["content"] = "cabang/form";
            $this->load->view('template', $data);
        }
    }

    function form()
    {
        $this->load->model("cabang_model", "cm");

        $data_form["txt_cabang_id"] = $this->input->post("txt_cabang_id", TRUE);
        $data_form["txt_cabang_deskripsi"] = $this->input->post("txt_cabang_deskripsi", TRUE);

        if($this->input->post("btn_simpan") === "btn_simpan")
        {
            // cek data kembar
            $cek_cabang = $this->cm->check_cabang($data_form["txt_cabang_deskripsi"]);

            //klo data tidak ada yang kembar
            if($cek_cabang === 0)
            {
                // simpan ke database
                $simpan = $this->cm->insert_cabang($data_form);

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

                $data["qry_cabang"] = $this->cm->get_all_data();
                $data["icon"] = "building";
                $data["my_title"] = "cabang";
                $data["title"] = "cabang";
                $data["content"] = "cabang/home";
                $this->load->view("template", $data);
            }
            else
            {
                $data["icon"] = "building";
                $data["my_title"] = "cabang";
                $data["title"] = "cabang";
                $data["content"] = "cabang/form";
                $data["message"] = "Data <b>".$data_form["txt_cabang_deskripsi"]."</b> Sudah Ada Tong!";
                $this->load->view("template", $data);
            }
        }
        elseif($this->input->post("btn_simpan") === "btn_update")
        {
            $simpan = $this->cm->update_cabang($data_form);

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

            $data["qry_cabang"] = $this->cm->get_all_data();
            $data["icon"] = "building";
            $data["my_title"] = "cabang";
            $data["title"] = "cabang";
            $data["content"] = "cabang/home";
            $this->load->view("template", $data);
        }
        else
        {
            $this->index();
        }
    }

    function edit()
    {
        $this->load->model("cabang_model", "cm");

        $cabang_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;

        $data["qry_cabang"] = $this->cm->get_all_data($cabang_id);
        $data["my_title"] = "cabang";
        $data["icon"] = "building";
        $data["title"] = "cabang";
        $data["content"] = "cabang/form";
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

/* End of file cabang.php */
/* Location: ./application/controllers/cabang.php */
