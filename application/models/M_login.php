<?php
class M_login extends CI_Model{//baku
	function __construct()
	{
		parent::__construct();
		$this->tbl = "user";
		$this->db1 = $this->load->database('default', TRUE);

	}

	function cek_user($id="")
	{

			$query = $this->db1->get_where($this->tbl, array('username' => $id));
			$query = $query->result_array();
				
			if($query){
					return $query;
			}
				return array();

	}

	function ambil_user($id)
        {

		$query = $this->db1->get_where($this->tbl, array('username' => $id));
		$query = $query->row();
		if($query){
            return $query;
        }

    }
	
	

	function update_login($id,$data)
        {
				$this->db1->where($id);
		      $this->db1->update($this->tbl,$data);
    		}

    function cek_usersesion($stat)
	{
		if($stat==0){
			return "Super Admin";
		}else{
		return FALSE;
	}
	}

    

}
