<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 * 
 */

class Jurusan_model extends CI_Controller
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
            $where = "where jurusan_id=".$id;
        }
        
        $sql = "select * from jurusan ".$where." order by jurusan_deskripsi asc";
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
    
    function get_all_jurusan($id=NULL, $deskripsi=NULL, $limit=20, $start=0)
    {
        $where = "";
        if($id != NULL && $deskripsi === NULL)
        {
            $where = "where jurusan_id=".$id;
        }
        elseif($id === NULL && $deskripsi != NULL)
        {
            $where = "where jurusan_deskripsi like '%".$deskripsi."%'";
        }
        
        $sql = "select * from jurusan ".$where." order by jurusan_deskripsi asc limit $start, $limit";
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
    
    function insert_jurusan($data = array())
    {
        $jurusan_deskripsi = strtoupper($data["txt_jurusan_deskripsi"]);
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");
        
        $sql = "insert into jurusan(jurusan_deskripsi, jurusan_date_create, jurusan_user_create) values('$jurusan_deskripsi', '$date_create',$user_create)";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    function update_jurusan($data = array())
    {
        $jurusan_id = $data["txt_jurusan_id"];
        $jurusan_deskripsi = strtoupper($data["txt_jurusan_deskripsi"]);
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");
        
        $sql = "update jurusan set jurusan_deskripsi='$jurusan_deskripsi', jurusan_date_update='$date_create', jurusan_user_update=$user_create where jurusan_id=$jurusan_id";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    function count_jurusan()
    {
        return $this->db->count_all("jurusan");
    }
    
    function check_jurusan($deskripsi)
    {
        $sql = "select * from jurusan where jurusan_deskripsi like '".$deskripsi."'";
        $qry = $this->db->query($sql);
        return $qry->num_rows();
    }
}

/* End of file jurusan_model.php */
/* Location: ./application/models/jurusan_model.php */