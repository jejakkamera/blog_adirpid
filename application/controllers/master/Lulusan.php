<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lulusan extends Master_lib{

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
			'link_json'=>'Master_control/json_master/lulusan',
			'header'=>'Data Mahasiswa lulusan',
            'tabel_detail'=>'List Lulusan',

            'button_name'=>'Tambah Lulusan',
			'button_action_link'=>'master_control/master_form/add/lulusan',
            'button_icon'=>'fas fa-plus',
            
            //'button_name2'=>'Tambah Blog',
			//'button_action_link2'=>'add_kec',
			//'button_icon2'=>'fas fa-plug',
		);
		
		return $data_master;
	}
	
	protected function detail_form($action,$kode='')
    {	
		$data_master=array(
			//'action'=> base_url('knadmin/action_add_kec'),
			'form_detail'=>'Add Lulusan',
			'module_list'=>'login_sipt',
			'button_name'=>'Tambah',
			'action_status'=>$action,
		);

		if($action=='update'){
			$data_master['action']=base_url('master_control/master_action/update/lulusan/'.$kode);
			
		}else{
			$data_master['action']=base_url('master_control/master_action/add/lulusan/');
		}
		
		return $data_master;
		//print_r ($data);
	}
	
	protected function action_create()
	{
		$this->_rule('create');
		//$nim=$this->CI->input->post('nim',TRUE);
		if ( ($this->CI->form_validation->run() == TRUE) ) {
			$where_=array(
				'nim'=>$this->CI->input->post('nim',TRUE)
			);

			$cek_user=$this->CI->Master_model->master_get($where_,'ms_lulusan');

			if($cek_user){

				$text = $this->CI->alert->warning('Nim already in use');
				$this->CI->session->set_flashdata('message', $text);

				redirect(site_url('master_control/master_form/add/lulusan'));
				
			}else{
				
				date_default_timezone_set("Asia/Bangkok");
				$data = array(
					'nim' => $this->CI->input->post('nim',TRUE),
					'tanggal_lulus' => $this->CI->input->post('tanggal_lulus',TRUE),
					'no_surat' => $this->CI->input->post('no_surat',TRUE),
					'prodi' => $this->CI->session->userdata('id'),
					'last_edit_info' => $this->CI->Master_model->user_cek_ident(),
				);
				$this->CI->Master_model->insert_query('ms_lulusan',$data);

				$data_history=json_encode($data);
				$this->CI->Master_model->insert_history('Add','lulusan', $data_history);
				

				/*$text = $this->CI->alert->success('Data successfully add');
				$this->CI->session->set_flashdata('message', $text);*/
				redirect(site_url('custom_controler/list_mk_form/'.$this->CI->input->post('nim',TRUE)));
			}
		}else{
			return false;
		}
		
	}

	protected function action_update($kode)
	{
		$this->_rule('update');
		//$nim=$this->CI->input->post('nim',TRUE);
		if ( ($this->CI->form_validation->run() == TRUE) ) {
			//echo 'berhasil';
			$where_=array(
				'nim'=>$kode
			);
			$tabel='ms_lulusan';

			$cek_user=$this->CI->Master_model->master_get($where_,$tabel);

			if($cek_user){

				date_default_timezone_set("Asia/Bangkok");
				$data = array(
					'tanggal_lulus' => $this->CI->input->post('tanggal_lulus',TRUE),
					'no_surat' => $this->CI->input->post('no_surat',TRUE),
					'last_edit_info' => $this->CI->Master_model->user_cek_ident(),
				);
				$this->CI->Master_model->update($where_,$data,$tabel);

				$data_history=json_encode($data);
				$this->CI->Master_model->insert_history('Update','lulusan', $data_history);

				$text = $this->CI->alert->success('Data successfully Update');
				$this->CI->session->set_flashdata('message', $text);
				redirect(site_url('master_control/master_list/lulusan'));
				
				
			}else{

				return false;
				
			}
		}else{
			//echo 'gagal';
			return false;
		}
		
	}

	public function data_master($kode)
    {	
		$where_=array(
			'nim'=>$kode
		);
		$data=$this->CI->Master_model->master_get($where_,'v_lulusan');
		
		return $data;
		//print_r ($data);
		
    }

	protected function action_delete(){}

	protected function _rule($action='')
	{	
		if($action!='update'){
			$this->CI->form_validation->set_rules('nim', 'nim', 'trim|required|xss_clean');
		}
		
		$this->CI->form_validation->set_rules('tanggal_lulus', 'tanggal_lulus', 'trim|required|xss_clean');
		$this->CI->form_validation->set_rules('no_surat', 'no_surat', 'trim|required|xss_clean');
		$this->CI->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');	
	}
}
