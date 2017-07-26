<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * @author Zulyantara <zulyantara@gmail.com>
 * @copyright Copyright (c) 2014, Zulyantara
 * 
 */

class Siswa_nilai_model extends CI_Controller
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
            $where = "where snr_siswa=".$id;
        }
        
        $sql = "select * from siswa_nilai_rapor left join siswa on siswa_nilai_rapor.snr_siswa=siswa.siswa_id ".$where." order by siswa.siswa_nama asc";
        
        $qry = $this->db->query($sql);
        
        if($id != NULL)
        {
            return ($qry->num_rows() > 0) ? $qry->row() : FALSE;
        }
        elseif($id === NULL)
        {
            return ($qry->num_rows() > 0) ? $qry->result() : FALSE;
        }
    }
    
    function get_all_siswa()
    {
        $sql = "select * from siswa order by siswa_nama asc";
        $qry = $this->db->query($sql);
        
        return ($qry->num_rows() > 0) ? $qry->result() : 0;
    }
    
    function insert_siswa_nilai($data = array())
    {
        $snr_siswa = $data["txt_snr_siswa"];
        $snr_rataan_semester_1 = $data["txt_snr_rataan_semester_1"];
        $snr_rataan_semester_2 = $data["txt_snr_rataan_semester_2"];
        $snr_rataan_semester_3 = $data["txt_snr_rataan_semester_3"];
        $snr_rataan_semester_4 = $data["txt_snr_rataan_semester_4"];
        $snr_rataan_semester_5 = $data["txt_snr_rataan_semester_5"];
        $date_create = date("Y-m-d H:i:s");
        $user_create = $this->session->userdata("userId");
        
        $cek = $this->check_siswa($snr_siswa);
        
        if($cek === 0)
        {
            $sql = "insert into siswa_nilai_rapor(snr_siswa, snr_rataan_semester_1, snr_rataan_semester_2, snr_rataan_semester_3, snr_rataan_semester_4, snr_rataan_semester_5, snr_date_create, snr_user_create) values($snr_siswa,$snr_rataan_semester_1,$snr_rataan_semester_2,$snr_rataan_semester_3,$snr_rataan_semester_4,$snr_rataan_semester_5,'$date_create',$user_create)";
        }
        elseif($cek === 1)
        {
            $sql = "update siswa_nilai_rapor set snr_rataan_semester_1=$snr_rataan_semester_1, snr_rataan_semester_2=$snr_rataan_semester_2, snr_rataan_semester_3=$snr_rataan_semester_3, snr_rataan_semester_4=$snr_rataan_semester_4, snr_rataan_semester_5=$snr_rataan_semester_5, snr_date_create='$date_create', snr_user_create=$user_create where snr_siswa=$snr_siswa";
        }
        
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    function count_siswa_nilai()
    {
        return $this->db->count_all("siswa_nilai_rapor");
    }
    
    function check_siswa($id)
    {
        $sql = "select * from siswa_nilai_rapor where snr_siswa = ".$id;
        $qry = $this->db->query($sql);
        return $qry->num_rows();
    }
}

/* End of file siswa_nilai_model.php */
/* Location: ./application/models/siswa_nilai_model.php */