<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 *
 */

class Universitas_model extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all_data($id=NULL)
    {
        $where = "";
        if($id != NULL && $deskripsi === NULL)
        {
            $where = "where universitas_id=".$id;
        }

        $sql = "select * from universitas ".$where." order by universitas_deskripsi asc";
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

    function get_all_universitas($id=NULL, $deskripsi=NULL, $limit=20, $start=0)
    {
        $where = "";
        if($id != NULL && $deskripsi === NULL)
        {
            $where = "where universitas_id=".$id;
        }
        elseif($id === NULL && $deskripsi != NULL)
        {
            $where = "where universitas_deskripsi like '%".$deskripsi."%'";
        }

        $sql = "select * from universitas ".$where." order by universitas_deskripsi asc limit $start, $limit";
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

    function insert_universitas($data = array())
    {
        $universitas_deskripsi = strtoupper($data["txt_universitas_deskripsi"]);
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");

        $sql = "insert into universitas(universitas_deskripsi, universitas_date_create, universitas_user_create) values('$universitas_deskripsi','$date_create',$user_create)";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function update_universitas($data = array())
    {
        $universitas_id = $data["txt_universitas_id"];
        $universitas_deskripsi = strtoupper($data["txt_universitas_deskripsi"]);
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");

        $sql = "update universitas set universitas_deskripsi='$universitas_deskripsi', universitas_date_update='$date_create', universitas_user_update=$user_create where universitas_id=$universitas_id";
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function count_universitas()
    {
        return $this->db->count_all("universitas");
    }

    function check_universitas($deskripsi)
    {
        $sql = "select * from universitas where universitas_deskripsi like '".$deskripsi."'";
        $qry = $this->db->query($sql);
        return $qry->num_rows();
    }

    function upload_universitas()
    {
        if ($_FILES[csv][size] > 0)
        {
            //get the csv file
            $file = $_FILES[csv][tmp_name];
            $handle = fopen($file,"r");

            //loop through the csv file and insert into database
            do
            {
                if ($data[0])
                {
                    $mysqli->query("INSERT INTO contacts (contact_first, contact_last, contact_email) VALUES
                        (
                            '".addslashes($data[0])."',
                            '".addslashes($data[1])."',
                            '".addslashes($data[2])."'
                        )
                    ");
                }
            } while ($data = fgetcsv($handle,1000,",","'"));
            //

            //redirect
            header('Location: import.php?success=1'); die;

        }
    }
}

/* End of file universitas_model.php */
/* Location: ./application/models/universitas_model.php */
