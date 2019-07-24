<?php
class Master_model extends CI_Model{//baku
	function __construct()
	{
		parent::__construct();
        $this->db = $this->load->database('default', TRUE);

    }

    public function get_header($level){

        $this->db->select('*');
        $this->db->from('header_master');
        $this->db->join('header_sub','header_sub.code_menu=header_master.code_menu');
        $this->db->where('level',$level);
        $this->db->order_by('header_master.urutan,header_sub.urut', 'ASC');

        $query=$getData=$this->db->get();
     
            if($getData->num_rows() > 0)
     
            return $query->result_array();
     
     else 
     
            return null;
    }

    public function get_tugas($id){

        $this->db->select('*');
        $this->db->from('header_master');
        $this->db->join('header_sub','header_sub.code_menu=header_master.code_menu');
        $this->db->join('header_tugas','header_sub.id=header_tugas.id_header_sub');
        $this->db->where('id_user',$id);
        $this->db->order_by('header_master.urutan,header_sub.urut', 'ASC');

        $query=$getData=$this->db->get();
     
            if($getData->num_rows() > 0)
     
            return $query->result_array();
     
     else 
     
            return null;
    }

    public function cek_akses($module,$level,$method){
        $this->db->select('*');
        $this->db->from('access_user');
        $this->db->where('access_user.level',$level);
        $this->db->where('module',$module);

        $query=$getData=$this->db->get();
    
            if($getData->num_rows() > 0)
    
            return $query->row($method);
    
    else 
    
            return null;
    }

    public function insert_history($aksi,$tabel,$data)
    {

		$data=array(
			'aksi'=>$aksi,
			'tabel'=>$tabel,
			'data'=>$data,
			'user_id'=>$this->session->userdata('username'),
			'detail_user'=>$this->user_cek_ident(),
		);
		$this->insert_query('histori_',$data);

    }
    
    public function user_cek_ident()
	{
		$this->load->library('user_agent');
		
		if ($this->agent->is_browser())
		{
				$agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
				$agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
				$agent = $this->agent->mobile();
		}
		else
		{
				$agent = 'Unidentified User Agent';
		}
		$name_pc=gethostbyaddr($_SERVER['REMOTE_ADDR']); //echo "<br>";          
		$browser_use=$agent." "; //echo "<br>";
		$ip_addres=$this->input->ip_address(); //echo "<br>";
		$oprating_sistem=$this->agent->platform(); //echo "<br>";
		date_default_timezone_set("Asia/Bangkok"); 
		$datetime=date('Y-m-d H:s:i'); //echo "<br>"; 

		$username=$this->session->userdata('id'); //echo "<br>"; 
		$name=$this->session->userdata('name'); //echo "<br>"; 
		//$bagian=$this->session->userdata('bagian'); //echo "<br>"; 

		return $name_pc." ".$browser_use." ".$ip_addres." ".$oprating_sistem." date : ".$datetime." login Detail : ".$username.",".$name;
	}



    function master_result($where,$tabel)
    {
        $this->db->where($where);
        return $this->db->get($tabel)->result_array();
    }
    
    function master_get_or($where_,$nama_tabel)
    {
        $this->db->or_where($where_);
        return $this->db->get($nama_tabel)->row();
    }

    function master_get($where_,$nama_tabel)
    {
        $this->db->where($where_);
        return $this->db->get($nama_tabel)->row();
    }

    function delete_query($where_array, $nama_tabel)
    {
        $this->db->where($where_array);
        $this->db->delete($nama_tabel);
    }

    function truncate_query( $nama_tabel)
    {
        $this->db->truncate($nama_tabel);
    }

    function insert_query($nm_table,$data)
	{
		$this->db->insert($nm_table, $data);
    }
    
    function replace_query($nm_table,$data)
	{
        $this->db->replace($nm_table, $data);
    }

    function insert_batch_query($nm_table,$data)
	{
		$this->db->insert_batch($nm_table, $data);
    }

    function insert_string_query($nm_table,$data)
	{
		$sql = $this->db->insert_string($nm_table, $data) . ' ON DUPLICATE KEY UPDATE duplicate=duplicate+1';
        $this->db->query($sql);
        $id = $this->db->insert_id();
    }

    function insert_query_retrun_id($nm_table,$data)
	{
        $this->db->insert($nm_table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;

    }
    
    function update_query($where_array, $data, $nama_tabel)
    {
        $this->db->where($where_array);
        $this->db->update($nama_tabel, $data);
    }

    function ms_list($where,$tabel)
    {
        $this->db->where($where);
        $this->db->order_by('urut','ASC');
        return $this->db->get($tabel)->result_array();
    }

    
    
}