<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 * 
 */

class Sekolah_model extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function get_all_data($id=NULL)
    {
        $where = "";
        if($id != NULL && $deskripsi === NULL && $akreditasi === NULL)
        {
            $where = "where sekolah_id=".$id;
        }
        
        $sql = "select * from sekolah ".$where." order by sekolah_deskripsi asc";
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
    
    function get_all_sekolah($id=NULL, $deskripsi=NULL, $akreditasi=NULL, $limit=20, $start=0)
    {
        $where = "";
        if($id != NULL && $deskripsi === NULL && $akreditasi === NULL)
        {
            $where = "where sekolah_id=".$id;
        }
        elseif($id === NULL && $deskripsi != NULL && $akreditasi === NULL)
        {
            $where = "where sekolah_deskripsi like '%".$deskripsi."%'";
        }
        elseif($id === NULL && $deskripsi === NULL && $akreditasi != NULL)
        {
            $where = "where sekolah_akreditasi = '".$akreditasi."'";
        }
        elseif($id === NULL && $akreditasi != NULL && $akreditasi != NULL)
        {
            $where = "where sekolah_deskripsi like '%".$deskripsi."%' and sekolah_akreditasi = '".$akreditasi."'";
        }
        
        $sql = "select * from sekolah ".$where." order by sekolah_deskripsi asc limit $start, $limit";
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
    
    function insert_sekolah($data = array())
    {
        $sekolah_deskripsi = strtoupper($data["txt_sekolah_deskripsi"]);
        $sekolah_akreditasi = $data["opt_sekolah_akreditasi"];
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");
        
        $sql = "insert into sekolah(sekolah_deskripsi, sekolah_akreditasi, sekolah_date_create, sekolah_user_create) values('$sekolah_deskripsi', '$sekolah_akreditasi','$date_create',$user_create)";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    function update_sekolah($data = array())
    {
        $sekolah_id = $data["txt_sekolah_id"];
        $sekolah_deskripsi = strtoupper($data["txt_sekolah_deskripsi"]);
        $sekolah_akreditasi = $data["opt_sekolah_akreditasi"];
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");
        
        $sql = "update sekolah set sekolah_deskripsi='$sekolah_deskripsi', sekolah_akreditasi='$sekolah_akreditasi', sekolah_date_update='$date_create', sekolah_user_update=$user_create where sekolah_id=$sekolah_id";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    function count_sekolah()
    {
        return $this->db->count_all("sekolah");
    }
    
    function check_sekolah($deskripsi)
    {
        $sql = "select * from sekolah where sekolah_deskripsi like '".$deskripsi."'";
        $qry = $this->db->query($sql);
        return $qry->num_rows();
    }
}

/* End of file sekolah_model.php */
/* Location: ./application/models/sekolah_model.php */