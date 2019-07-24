<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	    $this->load->library('session');
	    $this->load->library('Alert');
        $this->load->library('Master_lib');
        $this->load->model('Master_model');
    }
    
	
    public function index()
	{
        $level=$this->session->userdata('level');
        $action='get';
        $module='dashboard';
        $this->master_lib->cek_akses($module,$level,$action);

        $header= $this->Master_model->get_header($this->session->userdata('level'));

        $header=json_encode($header);
        $this->session->set_userdata(array(
            'header'      =>  $header,
        ));

        $text = $this->alert->success('Selamat Datang :'.$this->session->userdata('username'));
		$this->session->set_flashdata('message',$text);
		redirect(site_url('Master_control'));
	}
	
   
}
