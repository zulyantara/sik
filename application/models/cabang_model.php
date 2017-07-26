<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Cabang_model extends CI_Controller
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
            $where = " and cabang_id=".$id;
        }

        $sql = "select * from cabang where cabang_is_delete=0 ".$where." order by cabang_id asc";
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

    function insert_cabang($data = array())
    {
        $cabang_deskripsi = strtoupper($data["txt_cabang_deskripsi"]);
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");

        $sql = "insert into cabang(cabang_deskripsi, cabang_is_delete, cabang_date_create, cabang_user_create) values('$cabang_deskripsi',0, '$date_create',$user_create)";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function update_cabang($data = array())
    {
        //var_dump($data);exit;
        $cabang_id = $data["txt_cabang_id"];
        $cabang_deskripsi = strtoupper($data["txt_cabang_deskripsi"]);
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");

        $sql = "update cabang set cabang_deskripsi='$cabang_deskripsi',cabang_date_update='$date_create',cabang_user_update=$user_create where cabang_id=$cabang_id";
        //echo $sql;exit;
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function check_cabang($deskripsi)
    {
        $sql = "select * from cabang where cabang_deskripsi like '".$deskripsi."'";
        $qry = $this->db->query($sql);
        return $qry->num_rows();
    }
}

/* End of file cabang_model.php */
/* Location: ./application/models/cabang_model.php */
