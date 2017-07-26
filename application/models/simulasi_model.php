<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Simulasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all_siswa()
    {
        $where="";
        if($this->session->userdata("userLevel")==1)
        {
            $where=" and siswa_cabang=".$this->session->userdata("userCabang");
        }

        $sql = "select * from siswa left join sekolah on siswa_sekolah=sekolah_id left join jurusan on siswa_jurusan=jurusan_id where 1=1 $where order by siswa_nama";
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->result() : FALSE;
    }

    function get_siswa_by_id($id)
    {
        $sql = "select * from siswa left join sekolah on siswa_sekolah=sekolah_id left join jurusan on siswa_jurusan=jurusan_id left join cabang on siswa_cabang=cabang_id where siswa_id=".$id;
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->row() : FALSE;
    }

    function get_siswa_nilai_by_id($id)
    {
        $sql = "select * from siswa_nilai_rapor where snr_siswa=".$id;
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->result() : FALSE;
    }

    function get_sekolah_by_id($id)
    {
        $sql = "select * from sekolah where sekolah_id=".$id;
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->result() : FALSE;
    }

    function get_all_universitas()
    {
        $sql = "select * from universitas order by universitas_deskripsi asc";
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->result() : FALSE;
    }

    function get_fakultas_by_universitas($id)
    {
        $sql = "select * from universitas_fakultas where uf_universitas=".$id;
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->result() : FALSE;
    }

    function get_fakultas_by_id($id)
    {
        $sql = "select * from universitas_fakultas left join universitas on uf_universitas=universitas_id where uf_id=".$id;
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->row() : FALSE;
    }

    function get_simulasi_by_siswa($id)
    {
        $sql = "select * from simulasi where simulasi_siswa=".$id." and simulasi_flag=0";
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->row() : FALSE;
    }

    function insert_simulasi($data = array())
    {
        $siswa_id = $data["siswa_id"];
        $peringkat_reguler_sekolah = $data["peringkat_reguler_sekolah"];
        $peringkat_prodi_1 = $data["peringkat_prodi_1"];
        $peringkat_prodi_2 = $data["peringkat_prodi_2"];
        $jml_terima_thn_lalu = $data["jml_terima_thn_lalu"];
        $terima_pilihan_1 = $data["jml_terima_pilihan_1"];
        $terima_pilihan_2 = $data["jml_terima_pilihan_2"];
        $peminatan_1 = $data["peminatan_1"];
        $peminatan_2 = $data["peminatan_2"];
        $catatan_bikon = $data["catatan_bikon"];
        $date = date("Y-m-d H:i:s");
        $user = $this->session->userdata("userId");

        $sql = "insert into simulasi(simulasi_siswa,simulasi_peringkat_reguler_sekolah,simulasi_peringkat_prodi_1,simulasi_peringkat_prodi_2,simulasi_jml_terima_thn_lalu,simulasi_jml_terima_pilihan_1,simulasi_jml_terima_pilihan_2,simulasi_peminatan_1,simulasi_peminatan_2,simulasi_keterangan,simulasi_flag,simulasi_date_create,simulasi_user_create) values($siswa_id,$peringkat_reguler_sekolah,$peringkat_prodi_1,$peringkat_prodi_2,$jml_terima_thn_lalu,$terima_pilihan_1,$terima_pilihan_2,$peminatan_1,$peminatan_2,'$catatan_bikon',0,'$date',$user)";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function update_simulasi($data = array())
    {
        $siswa_id = $data["siswa_id"];
        $peringkat_reguler_sekolah = $data["peringkat_reguler_sekolah"];
        $peringkat_prodi_1 = $data["peringkat_prodi_1"];
        $peringkat_prodi_2 = $data["peringkat_prodi_2"];
        $jml_terima_thn_lalu = $data["jml_terima_thn_lalu"];
        $terima_pilihan_1 = $data["jml_terima_pilihan_1"];
        $terima_pilihan_2 = $data["jml_terima_pilihan_2"];
        $peminatan_1 = $data["peminatan_1"];
        $peminatan_2 = $data["peminatan_2"];
        $catatan_bikon = $data["catatan_bikon"];
        $date = date("Y-m-d H:i:s");
        $user = $this->session->userdata("userId");

        $sql = "update simulasi set simulasi_peringkat_reguler_sekolah=$peringkat_reguler_sekolah,simulasi_peringkat_prodi_1=$peringkat_prodi_1,simulasi_peringkat_prodi_2=$peringkat_prodi_2,simulasi_jml_terima_thn_lalu=$jml_terima_thn_lalu,simulasi_jml_terima_pilihan_1=$terima_pilihan_1,simulasi_jml_terima_pilihan_2=$terima_pilihan_2,simulasi_peminatan_1=$peminatan_1,simulasi_peminatan_2=$peminatan_2,simulasi_keterangan='$catatan_bikon',simulasi_flag=0,simulasi_date_update='$date',simulasi_user_update=$user where simulasi_siswa=$siswa_id";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function count_simulasi_by_siswa($id)
    {
        $sql = "select * from simulasi where simulasi_siswa=".$id;
        $qry = $this->db->query($sql);
        return $qry->num_rows;
    }

    function lock_simulasi($id)
    {
        $sql = "update simulasi set simulasi_flag=1 where simulaso_id=".$id;
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }
}

/* End of file simulasi_model.php */
/* Location: ./application/models/simulasi_model.php */
