<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Fakultas_model extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all_data($id=NULL)
    {
        $where = "";
        if($id != NULL)
        {
            $where = "where uf_id=".$id;
        }

        $sql = "select * from universitas_fakultas left join universitas on uf_universitas=universitas_id left join jurusan on uf_jurusan=jurusan_id ".$where." order by uf_universitas,uf_deskripsi asc";
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

    function get_all_universitas()
    {
        $sql = "select * from universitas order by universitas_deskripsi asc";
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->result() : FALSE;
    }

    function get_all_jurusan()
    {
        $sql = "select * from jurusan order by jurusan_deskripsi asc";
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->result() : FALSE;
    }

    function get_all_fakultas($id=NULL, $universitas=NULL, $jurusan=NULL, $deskripsi=NULL, $limit=NULL, $start=NULL)
    {
        $where = "";
        if($id != NULL && $deskripsi === NULL && $universitas === NULL && $jurusan === NULL)
        {
            $where = "where uf_id=".$id;
        }
        elseif($id === NULL && $deskripsi != NULL && $universitas === NULL && $jurusan === NULL)
        {
            $where = "where uf_deskripsi like '%".$deskripsi."%'";
        }
        elseif($id === NULL && $deskripsi === NULL && $universitas != NULL && $jurusan === NULL)
        {
            $where = "where uf_universitas = ".$universitas;
        }
        elseif($id === NULL && $deskripsi === NULL && $universitas === NULL && $jurusan != NULL)
        {
            $where = "where uf_jurusan = ".$jurusan;
        }
        elseif($id === NULL && $deskripsi != NULL && $universitas != NULL && $jurusan != NULL)
        {
            $where = "where uf_deskripsi like '%$deskripsi%' and uf_universitas=$universitas and uf_jurusan=$jurusan";
        }
        elseif($id === NULL && $deskripsi != NULL && $universitas != NULL && $jurusan === NULL)
        {
            $where = "where uf_deskripsi like '%$deskripsi%' and uf_universitas=$universitas";
        }
        elseif($id === NULL && $deskripsi != NULL && $universitas === NULL && $jurusan != NULL)
        {
            $where = "where uf_deskripsi like '%$deskripsi%' and uf_jurusan=$jurusan";
        }
        elseif($id === NULL && $deskripsi === NULL && $universitas != NULL && $jurusan != NULL)
        {
            $where = "where uf_universitas=$universitas and uf_jurusan=$jurusan";
        }

        if($limit === NULL && $start === NULL)
        {
            $sql = "select * from universitas_fakultas left join universitas on uf_universitas=universitas_id left join jurusan on uf_jurusan=jurusan_id ".$where." order by uf_universitas,uf_deskripsi asc";
        }
        else
        {
            $sql = "select * from universitas_fakultas left join universitas on uf_universitas=universitas_id left join jurusan on uf_jurusan=jurusan_id ".$where." order by uf_universitas,uf_deskripsi asc limit $start, $limit";
        }

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

    function insert_fakultas($data = array())
    {
        $fakultas_universitas = $data["opt_fakultas_universitas"];
        $fakultas_jurusan = $data["opt_fakultas_jurusan"];
        $fakultas_deskripsi = strtoupper($data["txt_fakultas_deskripsi"]);
        $fakultas_peminat_thn_lalu = $data["txt_fakultas_peminat_thn_lalu"];
        $fakultas_daya_tampung = $data["txt_fakultas_daya_tampung"];
        $fakultas_rata_rapor_atas = $data["txt_fakultas_rata_rapor_atas"];
        $fakultas_rata_rapor_bawah = $data["txt_fakultas_rata_rapor_bawah"];
        $fakultas_jabar = $data["txt_fakultas_jabar"];
        $fakultas_jakarta = $data["txt_fakultas_jakarta"];
        $fakultas_banten = $data["txt_fakultas_banten"];
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");

        $sql = "insert into universitas_fakultas(uf_universitas, uf_jurusan, uf_deskripsi, uf_peminat_thn_lalu, uf_daya_tampung, uf_rata_rapor_atas, uf_rata_rapor_bawah, uf_jabar,uf_jakarta,uf_banten,uf_date_create, uf_user_create) values($fakultas_universitas,$fakultas_jurusan,'$fakultas_deskripsi', $fakultas_peminat_thn_lalu, $fakultas_daya_tampung, $fakultas_rata_rapor_atas, $fakultas_rata_rapor_bawah, $fakultas_jabar,$fakultas_jakarta,$fakultas_banten,'$date_create',$user_create)";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function update_fakultas($data = array())
    {
        $fakultas_id = $data["txt_fakultas_id"];
        $fakultas_universitas = $data["opt_fakultas_universitas"];
        $fakultas_jurusan = $data["opt_fakultas_jurusan"];
        $fakultas_deskripsi = strtoupper($data["txt_fakultas_deskripsi"]);
        $fakultas_peminat_thn_lalu = $data["txt_fakultas_peminat_thn_lalu"];
        $fakultas_daya_tampung = $data["txt_fakultas_daya_tampung"];
        $fakultas_rata_rapor_atas = $data["txt_fakultas_rata_rapor_atas"];
        $fakultas_rata_rapor_bawah = $data["txt_fakultas_rata_rapor_bawah"];
        $fakultas_jabar = $data["txt_fakultas_jabar"];
        $fakultas_jakarta = $data["txt_fakultas_jakarta"];
        $fakultas_banten = $data["txt_fakultas_banten"];
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");

        $sql = "update universitas_fakultas set uf_universitas=$fakultas_universitas, uf_jurusan=$fakultas_jurusan,uf_deskripsi='$fakultas_deskripsi', uf_peminat_thn_lalu=$fakultas_peminat_thn_lalu, uf_daya_tampung=$fakultas_daya_tampung, uf_rata_rapor_atas=$fakultas_rata_rapor_atas, uf_rata_rapor_bawah=$fakultas_rata_rapor_bawah, uf_jabar=$fakultas_jabar,uf_jakarta=$fakultas_jakarta,uf_banten=$fakultas_banten,uf_date_update='$date_create', uf_user_update=$user_create where uf_id=$fakultas_id";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function delete_fakultas($id)
    {
        $sql = "delete from universitas_fakultas where uf_id=".$id;
        $qry = $this->db->query($sql);
    }

    function count_fakultas()
    {
        return $this->db->count_all("universitas_fakultas");
    }

    function check_fakultas($universitas, $jurusan, $deskripsi)
    {
        $sql = "select * from universitas_fakultas where uf_universitas=$universitas and uf_jurusan=$jurusan and uf_deskripsi like '".$deskripsi."'";
        $qry = $this->db->query($sql);
        return $qry->num_rows();
    }
}

/* End of file fakultas_model.php */
/* Location: ./application/models/fakultas_model.php */
