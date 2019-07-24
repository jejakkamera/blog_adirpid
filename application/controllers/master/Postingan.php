<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postingan extends Master_lib{

	public function __construct()
    {
		$this->CI =& get_instance();
		$this->CI->load->helper('form');
		$this->CI->load->helper('security');
		$this->CI->load->library('form_validation');
		$this->CI->load->model('Master_model');
		$this->CI->load->model('Custom_model');
		$this->CI->load->library('Alert');

    }

	protected function detail()
    {
		$data_master=array(
			'link_json'=>'Master_control/json_master/postingan',
			'header'=>'Postingan',
            'tabel_detail'=>'List Post',

            'button_name'=>'Tambah Posting',
			'button_action_link'=>'custom_controler/add_post',
            'button_icon'=>'fas fa-plus',
            
            //'button_name2'=>'Tambah Blog',
			//'button_action_link2'=>'add_kec',
			//'button_icon2'=>'fas fa-plug',
		);
		
		return $data_master;
	}
	
	protected function action_delete(){}
    
}