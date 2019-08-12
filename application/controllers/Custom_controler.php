<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_controler extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->load->model('Master_model');
        $this->load->model('Custom_model');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->library('Master_lib');
		$this->load->helper('form');
		
	}
	
	public function edit_post($id_post)
	{	
		$level=$this->session->userdata('level');
        $action='post';
		$module='postingan';
		$this->master_lib->cek_akses($module,$level,$action);
		$where_=array('id_post'=>$id_post);
		$data_post=$this->Master_model->master_get($where_,'ms_post');
		if($data_post){
		
		$where=array();
		$bahasa= $this->Master_model->master_result($where,'ms_bahasa');
		$tag= $this->Master_model->master_result($where,'ms_tag');
		$category= $this->Master_model->master_result($where,'ms_category');

		$data=array(
			'judul'=>$data_post->judul,
			'detail'=>stripcslashes($data_post->detail),
			'label'=>$data_post->label,
			'img_tub'=>$data_post->img_tub,
			'bahasa_pilih'=>$data_post->bahasa,
			'category_pilih'=>$data_post->category,
			'status_post'=>$data_post->status_post,
			'category'=>$category,
			'bahasa'=>$bahasa,
			'tag'=>$tag,
			'action'=>'custom_controler/edit_post_acction/'.$id_post,
			'status'=>'update',
		);
		$this->header();
		$this->load->view('custom_view/add_post',$data);
		$this->footer();
		}else{
			$text = $this->alert->warning('Data Not Found');
			$this->session->set_flashdata('message', $text);
			redirect(site_url('master_control/master_list/postingan'));
		}		
	}

	public function edit_post_acction($id_post)
	{	
		$level=$this->session->userdata('level');
        $action='post';
		$module='postingan';
		$this->master_lib->cek_akses($module,$level,$action);
		$this->_post_rule();
		if ( ($this->form_validation->run() == TRUE) ) {
			$where_=array('id_post'=>$id_post);
			$data_post=$this->Master_model->master_get($where_,'ms_post');
			if($data_post){
				$tags=json_encode($this->input->post('text_tags',TRUE));
				$tags=str_replace('"',"",$tags);
				$data = array(
					'judul' => $this->input->post('post',TRUE),
					'detail' => addslashes($this->input->post('editor1',false)),
					'img_tub' => $this->input->post('img_tub',false),
					'label' => $tags,
					'category' => $this->input->post('category',false),
					'bahasa' => $this->input->post('bahasa',false),
					'status_post' => $this->input->post('publish',false),
					'last_edit_info' => $this->Master_model->user_cek_ident(),
				);

				$str_arr = explode (",", $tags);
				foreach($str_arr as $row){
					$data_tag=array('tags'=>$row);
					$this->Master_model->replace_query('ms_tag',$data_tag);
				} 
				$where_array=array('id_post'=>$id_post);
				$this->Master_model->update_query($where_array, $data, 'ms_post');

				$data_history=json_encode($data);
				$this->Master_model->insert_history('update','post', $data_history);
				$text = $this->alert->success('Data successfully Update');
				$this->session->set_flashdata('message', $text);
				redirect(site_url('master_control/master_list/postingan'));

			}else{
				$text = $this->alert->warning('Data Not Found');
				$this->session->set_flashdata('message', $text);
				redirect(site_url('master_control/master_list/postingan'));
			}
		}else{
			$this->edit_post($id_post);
		}
	}

	public function add_post()
	{	
		$level=$this->session->userdata('level');
        $action='post';
		$module='postingan';
		$this->master_lib->cek_akses($module,$level,$action);
		$where=array();
		$bahasa= $this->Master_model->master_result($where,'ms_bahasa');
		$tag= $this->Master_model->master_result($where,'ms_tag');
		$category= $this->Master_model->master_result($where,'ms_category');

		$data=array(
			'judul'=>"",
			'detail'=>"",
			'label'=>"",
			'img_tub'=>"",
			'category_pilih'=>"",
			'bahasa_pilih'=>"",
			'status_post'=>"",

			'bahasa'=>$bahasa,
			'category'=>$category,
			'tag'=>$tag,
			'action'=>'custom_controler/add_post_acction',
			'status'=>'create',
		);
		$this->header();
		$this->load->view('custom_view/add_post',$data);
		$this->footer();
			
	}

	public function add_post_acction()
	{	
		$level=$this->session->userdata('level');
        $action='post';
		$module='postingan';
		$this->master_lib->cek_akses($module,$level,$action);
		$this->_post_rule();
		if ( ($this->form_validation->run() == TRUE) ) {
				$post=$this->input->post('post',TRUE);
				$this->load->library('Custom_lib');
				$tubmail=$this->custom_lib->slug($post);
				$tabel='ms_post';
				$where_=array('tubmail'=>$tubmail);
				$cek_user=$this->Master_model->master_get($where_,$tabel);
				if($cek_user){ $tubmail=$tubmail.date('-d-F-y-his');}

				date_default_timezone_set("Asia/Bangkok");
				$tags=json_encode($this->input->post('text_tags',TRUE));
				$tags=str_replace('"',"",$tags);
				$id_post=$this->custom_lib->generateRandomString(49);
				$data = array(
					'id_post' => $id_post,
					'judul' => $this->input->post('post',TRUE),
					'detail' => addslashes($this->input->post('editor1',false)),
					'img_tub' => $this->input->post('img_tub',false),
					'label' => $tags,
					'create_date' => date('Y-m-d h:i:s'),
					'bahasa' => $this->input->post('bahasa',false),
					'category' => $this->input->post('category',false),
					'status_post' => $this->input->post('publish',false),
					'tubmail' => $tubmail,

					'last_edit_info' => $this->Master_model->user_cek_ident(),
				);

				$str_arr = explode (",", $tags);
				foreach($str_arr as $row){
					$data_tag=array('tags'=>$row);
					$this->Master_model->replace_query('ms_tag',$data_tag);
				} 
				//print_r($data_tag);
				$this->Master_model->insert_query('ms_post',$data);

				$data_history=json_encode($data);
				$this->Master_model->insert_history('Add','post', $data_history);
				redirect(site_url('master_control/master_list/postingan'));

				//echo $tubmail;
		}else{
			$this->add_post();
		}
	}

	protected function _post_rule()
	{	

		
		$this->form_validation->set_rules('post', 'Judul Post', 'trim|required|xss_clean');
		$this->form_validation->set_rules('editor1', 'editor1', 'trim');
		$this->form_validation->set_rules('img_tub', 'img_tub', 'trim|xss_clean');
		$this->form_validation->set_rules('text_tags', 'Tags', 'trim|xss_clean');
		$this->form_validation->set_rules('category', 'category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('bahasa', 'bahasa', 'trim|required|xss_clean');
		$this->form_validation->set_rules('publish', 'publish', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');	
	}


	public function file_master()
	{	
		$level=$this->session->userdata('level');
        $action='get';
		$module='file';
		$this->master_lib->cek_akses($module,$level,$action);
		
		$this->load->view('custom_view/file_master');
		
			
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
