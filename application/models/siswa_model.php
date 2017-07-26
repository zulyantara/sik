<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Siswa_model extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all_data($id=NULL)
    {
        $where = "";

        if($id === NULL && $this->session->userdata("userLevel") == 1)
        {
            $where = "WHERE siswa_cabang=".$this->session->userdata("userCabang");
        }

        if($id != NULL and $this->session->userdata("userLevel") == 1)
        {
            $where = "WHERE siswa_id=".$id." AND siswa_cabang='".$this->session->userdata("userCabang")."'";
        }

        $sql = "select siswa.*,sekolah.sekolah_deskripsi,jurusan.jurusan_deskripsi, cabang_deskripsi from siswa left join sekolah on siswa.siswa_sekolah=sekolah.sekolah_id left join jurusan on siswa.siswa_jurusan=jurusan.jurusan_id left join cabang on siswa_cabang=cabang_id ".$where." order by siswa_nama asc";
        //echo $sql;
        $qry = $this->db->query($sql);

        if($id != NULL)
        {
            return ($qry->num_rows() > 0) ? $qry->row() : 0;
        }
        elseif($id === NULL)
        {
            return ($qry->num_rows() > 0) ? $qry->result() : 0;
        }
    }

    function get_all_jurusan()
    {
        $sql = "select * from jurusan order by jurusan_deskripsi asc";
        $qry = $this->db->query($sql);

        return ($qry->num_rows() > 0) ? $qry->result() : 0;
    }

    function get_all_sekolah()
    {
        $sql = "select * from sekolah order by sekolah_deskripsi asc";
        $qry = $this->db->query($sql);

        return ($qry->num_rows() > 0) ? $qry->result() : 0;
    }

    function get_all_cabang()
    {
        $sql = "select * from cabang order by cabang_id asc";
        $qry = $this->db->query($sql);

        return ($qry->num_rows() > 0) ? $qry->result() : 0;
    }

    function insert_siswa($data = array())
    {
        $siswa_nama = strtoupper($data["txt_siswa_nama"]);
        $siswa_sekolah = $data["opt_siswa_sekolah"];
        $siswa_jurusan = $data["opt_siswa_jurusan"];
        $siswa_jenis_kelas = $data["opt_siswa_jenis_kelas"];
        $siswa_cabang = $data["opt_siswa_cabang"];
        $siswa_ta = strtoupper($data["txt_siswa_ta"]);
        $siswa_htm = $data["txt_siswa_htm"];
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");

        $sql = "insert into siswa(siswa_nama, siswa_sekolah, siswa_jurusan, siswa_jenis_kelas, siswa_cabang, siswa_ta, siswa_hasil_tes_minat, siswa_date_create, siswa_user_create) values('$siswa_nama',$siswa_sekolah,$siswa_jurusan,$siswa_jenis_kelas,$siswa_cabang, '$siswa_ta','$siswa_htm','$date_create',$user_create)";
        //echo $sql;exit;
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function update_siswa($data = array())
    {
        $siswa_id = $data["txt_siswa_id"];
        $siswa_nama = strtoupper($data["txt_siswa_nama"]);
        $siswa_sekolah = $data["opt_siswa_sekolah"];
        $siswa_jurusan = $data["opt_siswa_jurusan"];
        $siswa_jenis_kelas = $data["opt_siswa_jenis_kelas"];
        $siswa_cabang = $data["opt_siswa_cabang"];
        $siswa_ta = strtoupper($data["txt_siswa_ta"]);
        $siswa_htm = strtoupper($data["txt_siswa_htm"]);
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");

        $sql = "update siswa set siswa_nama='$siswa_nama', siswa_sekolah=$siswa_sekolah, siswa_jurusan=$siswa_jurusan, siswa_jenis_kelas=$siswa_jenis_kelas, siswa_cabang='$siswa_cabang', siswa_ta='$siswa_ta',siswa_hasil_tes_minat='$siswa_htm',siswa_date_update='$date_create', siswa_user_update=$user_create where siswa_id=$siswa_id";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function check_siswa($nama)
    {
        $sql = "select * from siswa where siswa_nama like '".$nama."'";
        $qry = $this->db->query($sql);
        return $qry->num_rows();
    }
}

/* End of file siswa_model.php */
/* Location: ./application/models/siswa_model.php */
