<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Simulasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    function index()
    {
        $this->load->model("simulasi_model", "simod");

        $data["qry_siswa"] = $this->simod->get_all_siswa();
        $data["icon"] = "building";
        $data["my_title"] = "simulasi";
        $data["title"] = "simulasi";
        $data["content"] = "simulasi/home";
        $this->load->view("template", $data);
    }

    /*
     * masih trial untuk auto complete
     */
    function list_siswa()
    {
        $this->load->model("simulasi_model", "simod");
        $data = $this->simod->get_all_siswa();
        foreach($data as $key=>$row)
        {
            $arr['value'] = $row->siswa_nama;
        }
        echo json_encode($arr);
    }

    function detail($siswa_id)
    {
        $this->load->model("simulasi_model", "simod");

        //$siswa_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : "";

        $data["qry_siswa"] = $this->simod->get_siswa_by_id($siswa_id);
        $data["qry_universitas"] = $this->simod->get_all_universitas();
        $data["qry_simulasi"] = $this->simod->get_simulasi_by_siswa($siswa_id);
        $data["icon"] = "building";
        $data["title"] = "simulasi";
        $data["content"] = "simulasi/detail";
        $this->load->view("template", $data);
    }

    function list_fakultas($id)
    {
        $this->load->model("simulasi_model", "simod");

        //$universitas_id = $this->input->post("universitas_1", TRUE);

        $qry_fakultas = $this->simod->get_fakultas_by_universitas($id);

        foreach($qry_fakultas as $row_fakultas)
        {
            ?>
            <option value="<?php echo $row_fakultas->uf_id; ?>"><?php echo $row_fakultas->uf_deskripsi; ?></option>
            <?php
        }
    }

    function analisa()
    {
        $this->load->model("simulasi_model", "simod");

        $data["txt_siswa_id"] = $this->input->post("txt_siswa_id", TRUE);
        $data["txt_rata_rata"] = $this->input->post("txt_rata_rata", TRUE);
        $data["txt_peringkat_reguler_sekolah"] = $this->input->post("txt_peringkat_reguler_sekolah", TRUE);
        $data["txt_jml_terima_thn_lalu"] = $this->input->post("txt_jml_terima_thn_lalu", TRUE);
        $data["txt_peringkat_prodi_1"] = $this->input->post("txt_peringkat_prodi_1", TRUE);
        $data["txt_jml_terima_pilihan_1"] = $this->input->post("txt_jml_terima_pilihan_1", TRUE);
        $data["txt_peringkat_prodi_2"] = $this->input->post("txt_peringkat_prodi_2", TRUE);
        $data["txt_jml_terima_pilihan_2"] = $this->input->post("txt_jml_terima_pilihan_2", TRUE);
        $data["opt_peminatan_1"] = $this->input->post("opt_peminatan_1", TRUE);
        $data["opt_peminatan_2"] = $this->input->post("opt_peminatan_2", TRUE);

        $data["qry_siswa"] = $this->simod->get_siswa_by_id($data["txt_siswa_id"]);
        $data["qry_prodi_1"] = $this->simod->get_fakultas_by_id($data["opt_peminatan_1"]);
        $data["qry_prodi_2"] = $this->simod->get_fakultas_by_id($data["opt_peminatan_2"]);
        $data["icon"] = "building";
        $data["title"] = "simulasi";
        $data["content"] = "simulasi/analisa";

        $this->load->view("template", $data);
    }

    function simpan()
    {
        if($this->input->post("btn_simpan", TRUE) === "btn_simpan")
        {
            $this->load->model("simulasi_model", "sm");

            $data["siswa_id"] = $this->input->post("txt_siswa_id");
            $data["siswa_nama"] = $this->input->post("txt_siswa_nama");
            $data["siswa_jurusan"] = $this->input->post("txt_siswa_jurusan");
            $data["siswa_cabang"] = $this->input->post("txt_siswa_cabang");
            $data["rata_rata"] = $this->input->post("txt_rata_rata");
            $data["siswa_sekolah"] = $this->input->post("txt_siswa_sekolah");
            $data["siswa_sekolah_akreditas"] = $this->input->post("txt_siswa_sekolah_akreditas");
            $data["siswa_ta"] = $this->input->post("txt_siswa_ta");
            $data["siswa_hasil_tes_minat"] = $this->input->post("txt_siswa_hasil_tes_minat");

            $data["peringkat_reguler_sekolah"] = $this->input->post("txt_peringkat_reguler_sekolah");
            $data["jml_terima_thn_lalu"] = $this->input->post("txt_jml_terima_thn_lalu");

            $data["peringkat_prodi_1"] = $this->input->post("txt_peringkat_prodi_1");
            $data["jml_terima_pilihan_1"] = $this->input->post("txt_terima_pilihan_1");

            $data["peringkat_prodi_2"] = $this->input->post("txt_peringkat_prodi_2");
            $data["jml_terima_pilihan_2"] = $this->input->post("txt_terima_pilihan_2");

            $data["universitas_deskripsi_1"] = $this->input->post("txt_universitas_deskripsi_1");
            $data["universitas_prodi_1"] = $this->input->post("txt_universitas_prodi_1");
            $data["universitas_peminat_thn_lalu_1"] = $this->input->post("txt_universitas_peminat_thn_lalu_1");
            $data["universitas_daya_tampung_1"] = $this->input->post("txt_universitas_daya_tampung_1");
            $data["universitas_jabar_1"] = $this->input->post("txt_universitas_jabar_1");
            $data["universitas_jakarta_1"] = $this->input->post("txt_universitas_jakarta_1");
            $data["universitas_banten_1"] = $this->input->post("txt_universitas_banten_1");
            $data["tingkat_keketatan_1"] = $this->input->post("txt_tingkat_keketatan_1");

            if($this->input->post("txt_tingkat_keketatan_1") <= 2.5)
            {
                $data["interpretasi_1"] = "Tinggi";
            }
            elseif($this->input->post("txt_tingkat_keketatan_1") > 2.5 and $this->input->post("txt_tingkat_keketatan_1") <= 3.5)
            {
                $data["interpretasi_1"] = "Sedang - Tinggi";
            }
            elseif($this->input->post("txt_tingkat_keketatan_1") > 3.5 and $this->input->post("txt_tingkat_keketatan_1") <= 6)
            {
                $data["interpretasi_1"] = "Sedang";
            }
            elseif($this->input->post("txt_tingkat_keketatan_1") > 6 and $this->input->post("txt_tingkat_keketatan_1") <= 8.5)
            {
                $data["interpretasi_1"] = "Sedang - Rendah";
            }
            elseif($this->input->post("txt_tingkat_keketatan_1") > 8.5 and $this->input->post("txt_tingkat_keketatan_1") <= 10)
            {
                $data["interpretasi_1"] = "Rendah";
            }

            $data["perbandingan_keketatan_1"] = $this->input->post("txt_perbandingan_keketatan_1");
            $data["universitas_rata_rapor_atas_1"] = $this->input->post("txt_universitas_rata_rapor_atas_1");
            $data["universitas_rata_rapor_bawah_1"] = $this->input->post("txt_universitas_rata_rapor_bawah_1");

            $data["universitas_deskripsi_2"] = $this->input->post("txt_universitas_deskripsi_2");
            $data["universitas_prodi_2"] = $this->input->post("txt_universitas_prodi_2");
            $data["universitas_peminat_thn_lalu_2"] = $this->input->post("txt_universitas_peminat_thn_lalu_2");
            $data["universitas_daya_tampung_2"] = $this->input->post("txt_universitas_daya_tampung_2");
            $data["tingkat_keketatan_2"] = $this->input->post("txt_tingkat_keketatan_2");
            $data["universitas_jabar_2"] = $this->input->post("txt_universitas_jabar_2");
            $data["universitas_jakarta_2"] = $this->input->post("txt_universitas_jakarta_2");
            $data["universitas_banten_2"] = $this->input->post("txt_universitas_banten_2");
            $data["perbandingan_keketatan_2"] = $this->input->post("txt_perbandingan_keketatan_2");

            if($this->input->post("txt_tingkat_keketatan_2") <= 2.5)
            {
                $data["interpretasi_2"] = "Tinggi";
            }
            elseif($this->input->post("txt_tingkat_keketatan_2") > 2.5 and $this->input->post("txt_tingkat_keketatan_2") <= 3.5)
            {
                $data["interpretasi_2"] = "Sedang - Tinggi";
            }
            elseif($this->input->post("txt_tingkat_keketatan_2") > 3.5 and $this->input->post("txt_tingkat_keketatan_2") <= 6)
            {
                $data["interpretasi_2"] = "Sedang";
            }
            elseif($this->input->post("txt_tingkat_keketatan_2") > 6 and $this->input->post("txt_tingkat_keketatan_2") <= 8.5)
            {
                $data["interpretasi_2"] = "Sedang - Rendah";
            }
            elseif($this->input->post("txt_tingkat_keketatan_2") > 8.5 and $this->input->post("txt_tingkat_keketatan_2") <= 10)
            {
                $data["interpretasi_2"] = "Rendah";
            }

            $data["universitas_rata_rapor_atas_2"] = $this->input->post("txt_universitas_rata_rapor_atas_2");
            $data["universitas_rata_rapor_bawah_2"] = $this->input->post("txt_universitas_rata_rapor_bawah_2");

            $data["analisa_peringkat_reguler_sekolah"] = $this->input->post("txt_analisa_peringkat_reguler_sekolah");
            $data["analisa_peringkat_peminatan_prodi_1"] = $this->input->post("txt_analisa_peringkat_peminatan_prodi_1");
            $data["analisa_peringkat_peminatan_prodi_2"] = $this->input->post("txt_analisa_peringkat_peminatan_prodi_2");
            $data["analisa_persaingan_prodi_thn_lalu"] = $this->input->post("txt_analisa_persaingan_prodi_thn_lalu");
            $data["peluang_nilai_rapor_1"] = $this->input->post("txt_peluang_nilai_rapor_1");
            $data["analisa_peluang_rapor_1"] = $this->input->post("txt_analisa_peluang_rapor_1");
            $data["peluang_nilai_rapor_2"] = $this->input->post("txt_peluang_nilai_rapor_2");
            $data["analisa_peluang_rapor_2"] = $this->input->post("txt_analisa_peluang_rapor_2");

            $data["nilai_prediksi_peluang_total_1"] = $this->input->post("txt_nilai_prediksi_peluang_total_1");
            $data["prediksi_peluang_total_1"] = $this->input->post("txt_prediksi_peluang_total_1");
            $data["nilai_prediksi_peluang_total_2"] = $this->input->post("txt_nilai_prediksi_peluang_total_2");
            $data["prediksi_peluang_total_2"] = $this->input->post("txt_prediksi_peluang_total_2");

            $data["catatan_bikon"] = $this->input->post("txt_catatan_bikon");

            $data["peminatan_1"] = $this->input->post("opt_peminatan_1");
            $data["peminatan_2"] = $this->input->post("opt_peminatan_2");

            $data["qry_siswa"] = $this->sm->get_siswa_by_id($data["siswa_id"]);

            //cek data siswa sudah ada blom?
            $cek_siswa = $this->sm->count_simulasi_by_siswa($data["siswa_id"]);
            //klo 1 ude ade tong
            if($cek_siswa === 1)
            {
                $this->sm->update_simulasi($data);
            }
            elseif($cek_siswa === 0)
            {
                $this->sm->insert_simulasi($data);
            }

            //create pdf
            $this->load->view('simulasi/simulasi_pdf', $data);
            $html = $this->output->get_output();
            $this->load->library('dompdf_gen');
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper("A4");
            $this->dompdf->render();
            $this->dompdf->stream("simulasi_".$data["siswa_nama"].".pdf");
        }
        else
        {
            redirect("home");
        }
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
