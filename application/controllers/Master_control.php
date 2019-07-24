<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->load->model('Master_model');
        $this->load->model('Custom_model');
		$this->load->library('Alert');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->library('Master_lib');
    }

	public function index()
	{
		$this->header();
		$this->dashboard();
		$this->footer();
	}

	public function master_list($module,$kode="")
	{
		$level=$this->session->userdata('level');
        $action='get';
		$access = $this->Master_model->cek_akses($module,$level,$action);
		
		if($this->session->userdata('tugas')!='null' & $access==0){
			$tugas = array_column(json_decode($this->session->userdata('tugas')),'code_menu');
			$cek_module = array_search($module,$tugas); 
			if($cek_module>=0){
				//echo "ok";
				$access = $this->Master_model->cek_akses($module,'1',$action);
			}
		}

		//print_r($cek_module);
        if($access==1){
			
		$this->load->library('Master_lib');
		$data_kirim=$this->master_lib->master_list($module,$kode);
		//print_r($data_kirim);
		
           	$this->header();
            $this->load->view('master_view/master_list',$data_kirim); 
            $this->footer();

		}else if($access==0){
			
		$text = $this->alert->warning('Anda Tidak Memiliki Akses');
		$this->session->set_flashdata('message',$text);
		redirect(site_url('Master_control'));
  
	  	}else{
  
		$text = $this->alert->danger('Sistem Not Found');
		$this->session->set_flashdata('message',$text);
		redirect(site_url('Master_control'));
		
	  	}
	}

	public function master_form($action,$module,$kode="")
    {
        $level=$this->session->userdata('level');
		if($action=='update'){ $action_db='put'; }else{ $action_db='post'; }
		
		$access = $this->Master_model->cek_akses($module,$level,$action_db);

		if($this->session->userdata('tugas')!='null' & $access==0){
			$tugas = array_column(json_decode($this->session->userdata('tugas')),'code_menu');
			$cek_module = array_search($module,$tugas); 
			if($cek_module>=0){
				//echo "ok";
				$access = $this->Master_model->cek_akses($module,'1',$action_db);
			}
		}
        if($access==1){

		$this->load->library('Master_lib');
		$data_kirim=$this->master_lib->master_form($action,$module,$kode);

		$active="master";

		$this->header($active);
		$this->load->view('master_view/master_form',$data_kirim);
		$this->footer();
		
    }else if($access==0){
			
        $text = $this->alert->warning('Anda Tidak Memiliki Akses');
        $this->session->set_flashdata('message',$text);
        redirect(site_url('Master_control'));
  
      }else{
  
        $text = $this->alert->warning('Sistem Not Found');
        $this->session->set_flashdata('message',$text);
        redirect(site_url('Master_control'));
        
      }
	}
	
	public function master_action($action,$module,$kode="")
    {
        if($action=='update'){ $action_db='put'; }else{ $action_db='post'; }
        
        $level=$this->session->userdata('level');
		$access = $this->Master_model->cek_akses($module,$level,$action_db);
		if($this->session->userdata('tugas')!='null' & $access==0){
			$tugas = array_column(json_decode($this->session->userdata('tugas')),'code_menu');
			$cek_module = array_search($module,$tugas); 
			if($cek_module>=0){
				//echo "ok";
				$access = $this->Master_model->cek_akses($module,'1',$action_db);
			}
		}
		//echo $access;
    if($access==1){

		$this->load->library('Master_lib');
		$this->master_lib->master_action($action,$module,$kode);

        /*$isi='action_'.$action.'_'.$module;
		$this->$isi($kode);*/
        
    }else if($access==0){

		//echo $access;
        $text = $this->alert->warning('Anda Tidak Memiliki Akses');
        $this->session->set_flashdata('message',$text);
        redirect(site_url('Master_control'));
  
      }else{
  
        $text = $this->alert->warning('Sistem Not Found');
        $this->session->set_flashdata('message',$text);
        redirect(site_url('Master_control'));
        
	  }
    }

	public function json_master($module,$idna='')
	{	
    	$level=$this->session->userdata('level');
        $action='get';
		$access = $this->Master_model->cek_akses($module,$level,$action);
			if($this->session->userdata('tugas')!='null' & $access==0){
				$tugas = array_column(json_decode($this->session->userdata('tugas')),'code_menu');
				$cek_module = array_search($module,$tugas); 
				if($cek_module>=0){
						$access = $this->Master_model->cek_akses($module,'1',$action);
				}
			}

        if($access==1){
          	$this->load->library('datatables');
			header('Content-Type: application/json');
          	//$this->load->library('datatables_ssp');
          	$to='module_'.$module;
          	echo $this->Custom_model->$to($idna);
		}else if($access==0){
			$text = $this->alert->warning('Anda Tidak Memiliki Akses');
			$this->session->set_flashdata('message',$text);
			redirect(site_url('Master_control'));
		}else{
			$text = $this->alert->warning('Sistem Not Found');
			$this->session->set_flashdata('message',$text);
			redirect(site_url('Master_control'));
			
		}
	  }

	  public function master_delete($module,$tabel,$id,$coloum_id,$id2='',$coloum_id2='')
	  {
		  $level=$this->session->userdata('level');
		  $action_db='delete';
		  $access = $this->Master_model->cek_akses($module,$level,$action_db);
  
		  if($this->session->userdata('tugas')!='null' & $access==0){
			  $tugas = array_column(json_decode($this->session->userdata('tugas')),'code_menu');
			  $cek_module = array_search($module,$tugas); 
			  if($cek_module>=0){
				  //echo "ok";
				  $access = $this->Master_model->cek_akses($module,'1',$action_db);
			  }
		  }
		  
		  if($access==1){
  
			$this->load->library('Master_lib');
			$this->master_lib->master_delete($module,$tabel,$id,$coloum_id,$id2,$coloum_id2);
  
  
		  }else if($access==0){
			  
			$text = $this->alert->warning('Anda Tidak Memiliki Akses');
			$this->session->set_flashdata('message',$text);
			redirect(site_url('Master_control'));
		  
	
		}else{
	
		  	$text = $this->alert->warning('Sistem Not Found');
		  	$this->session->set_flashdata('message',$text);
			redirect(site_url('Master_control'));
		  
		}
	  
	  }
	  
	public function master_json_select($kode) {
		
		$mk = $this->input->post('kec');
		header('Content-Type: application/json');
		$data_dosen=$this->Custom_model->$kode($mk);
		echo ($data_dosen);
    
	}

	public function dashboard()
	{
		$this->load->view('master_view/dashboard');
	}

	public function header()
	{
		$this->load->view('master_view/header');
	}
    
    public function footer()
	{
		$this->load->view('master_view/footer');
    }

	
}
