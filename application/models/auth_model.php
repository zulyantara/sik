<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    /*
     * @author zulyantara <zulyantara@gmail.com>
     * @copyright copyright 2014 zulyantara
     */

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function validate($username, $userpassword)
    {
        $this->db->select("user_id, user_name, user_password, user_real_name, user_cabang, cabang_deskripsi, user_level");
        $this->db->where('user_name', $username);
        $this->db->where('user_password', sha1($userpassword));
        $this->db->join("cabang", "user_cabang=cabang_id", "left");
        $query = $this->db->get('user');

        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    function get_data_by_id($id)
    {
        $sql = "select * from user where user_id=".$id;
        $qry = $this->db->query($sql);
        return ($qry->num_rows() > 0) ? $qry->row() : FALSE;
    }

    function update_password($data = array())
    {
        $id = $data["txt_user_id"];
        $password = sha1($data["txt_new_password"]);
        $sql = "update user set user_password='".$password."' where user_id=".$id;
        $qry = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    function check_password($data = array())
    {
        $id = $data["txt_user_id"];
        $password = sha1($data["txt_old_password"]);

        $sql = "select count(*) as jml from user where user_id = ".$id." and user_password='".$password."'";

        $qry = $this->db->query($sql);

        return $qry->row();
    }
}

/* End of file auth_model.php */
/* Location: ./application/controllers/auth_model.php */
