<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Fakultas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    function index()
    {
        $this->load->model("fakultas_model","fm");

        $data["qry_fakultas"] = $this->fm->get_all_data();
        $data["icon"] = "building";
        $data["my_title"] = "fakultas";
        $data["title"] = "program studi";
        $data["content"] = "fakultas/home";
        $this->load->view("template", $data);
    }

    function search()
    {
        $this->load->model("fakultas_model","fm");

        $fakultas = ($this->input->get_post("txt_fakultas_deskripsi")) ? $this->input->get_post("txt_fakultas_deskripsi") : NULL;
        $universitas = ($this->input->post("opt_fakultas_universitas") ? $this->input->post("opt_fakultas_universitas") : ($this->uri->segment(3) ? $this->uri->segment(3) : ""));
        $jurusan = ($this->input->get_post("opt_fakultas_jurusan")) ? $this->input->get_post("opt_fakultas_jurusan") : NULL;
        //echo $universitas;exit;

        $data["qry_fakultas"] = $this->fm->get_all_fakultas(NULL, $universitas, $jurusan, $fakultas);
        $data["qry_universitas"] = $this->fm->get_all_universitas();
        $data["qry_jurusan"] = $this->fm->get_all_jurusan();
        $data["universitas"] = $universitas;
        $data["icon"] = "building";
        $data["my_title"] = "fakultas";
        $data["title"] = "program studi";
        $data["content"] = "fakultas/home";
        $this->load->view("template", $data);
    }

    function form_tambah()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->model("fakultas_model", "fm");

            $data["qry_universitas"] = $this->fm->get_all_universitas();
            $data["qry_jurusan"] = $this->fm->get_all_jurusan();
            $data["icon"] = "file-o";
            $data["my_title"] = "fakultas";
            $data["title"] = "program studi";
            $data["content"] = "fakultas/form";
            $this->load->view('template', $data);
        }
    }

    function form()
    {
        $this->load->model("fakultas_model", "fm");

        $data_form["txt_fakultas_id"] = $this->input->post("txt_fakultas_id", TRUE);
        $data_form["txt_fakultas_deskripsi"] = $this->input->post("txt_fakultas_deskripsi", TRUE);
        $data_form["opt_fakultas_universitas"] = $this->input->post("opt_fakultas_universitas", TRUE);
        $data_form["opt_fakultas_jurusan"] = $this->input->post("opt_fakultas_jurusan", TRUE);
        $data_form["txt_fakultas_peminat_thn_lalu"] = $this->input->post("txt_fakultas_peminat_thn_lalu", TRUE);
        $data_form["txt_fakultas_daya_tampung"] = $this->input->post("txt_fakultas_daya_tampung", TRUE);
        $data_form["txt_fakultas_rata_rapor_atas"] = $this->input->post("txt_fakultas_rata_rapor_atas", TRUE);
        $data_form["txt_fakultas_rata_rapor_bawah"] = $this->input->post("txt_fakultas_rata_rapor_bawah", TRUE);
        $data_form["txt_fakultas_jabar"] = $this->input->post("txt_fakultas_jabar", TRUE);
        $data_form["txt_fakultas_jakarta"] = $this->input->post("txt_fakultas_jakarta", TRUE);
        $data_form["txt_fakultas_banten"] = $this->input->post("txt_fakultas_banten", TRUE);

        if($this->input->post("btn_simpan") === "btn_simpan")
        {
            // cek data kembar
            $cek_fakultas = $this->fm->check_fakultas($data_form["opt_fakultas_universitas"],$data_form["opt_fakultas_jurusan"],$data_form["txt_fakultas_deskripsi"]);

            //klo data tidak ada yang kembar
            if($cek_fakultas === 0)
            {
                // simpan ke database
                $simpan = $this->fm->insert_fakultas($data_form);

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

                $data["qry_fakultas"] = $this->fm->get_all_data();
                $data["my_title"] = "fakultas";
                $data["icon"] = "building";
                $data["title"] = "program studi";
                $data["content"] = "fakultas/home";
                $this->load->view("template", $data);
            }
            else
            {
                $data["icon"] = "building";
                $data["my_title"] = "fakultas";
                $data["title"] = "fakultas";
                $data["content"] = "fakultas/form";
                $data["message"] = "Data <b>".$data_form["txt_fakultas_deskripsi"]."</b> Sudah Ada Tong!";
                $this->load->view("template", $data);
            }
        }
        elseif($this->input->post("btn_simpan") === "btn_update")
        {
            $simpan = $this->fm->update_fakultas($data_form);

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

            $data["qry_fakultas"] = $this->fm->get_all_data();
            $data["icon"] = "building";
            $data["my_title"] = "fakultas";
            $data["title"] = "program studi";
            $data["content"] = "fakultas/home";
            $this->load->view("template", $data);
        }
        else
        {
            $this->index();
        }
    }

    function edit()
    {
        $this->load->model("fakultas_model", "fm");

        $fakultas_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;

        $data["qry_fakultas"] = $this->fm->get_all_data($fakultas_id);
        $data["qry_universitas"] = $this->fm->get_all_universitas();
        $data["qry_jurusan"] = $this->fm->get_all_jurusan();
        $data["icon"] = "building";
        $data["my_title"] = "fakultas";
        $data["title"] = "program studi";
        $data["content"] = "fakultas/form";
        $this->load->view("template", $data);
    }

    function hapus()
    {
        $this->load->model("fakultas_model", "fm");
        $this->fm->delete_fakultas($this->uri->segment(3));

        $data["qry_fakultas"] = $this->fm->get_all_data();
        $data["flag_simpan"] = 1;
        $data["message"] = "Data berhasil dihapus";
        $data["icon"] = "building";
        $data["my_title"] = "fakultas";
        $data["title"] = "program studi";
        $data["content"] = "fakultas/home";
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

/* End of file fakultas.php */
/* Location: ./application/controllers/fakultas.php */
