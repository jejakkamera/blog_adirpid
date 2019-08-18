<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	
	public function index()
	{
		
		$this->header('adirp.id');
		$this->load->view('global/home_page');
		$this->footer();
	}

	


	public function error_404()
	{
		
		$this->header('404 Page Not Found');
		$this->load->view('global/error_404');
		$this->footer();
	}

	public function sitemap_html()
	{
		$this->load->model('Master_model');
		$where_=array(
			'status_post'=>1
		);
		$data_post=$this->Master_model->master_result($where_,'v_post');
		$data['items'] = $data_post;
		$this->header('sitemap');
		$this->load->view('global/sitemap_html', $data);
		$this->footer();
	}

	public function sitemap_xml()
	{
		$this->load->model('Master_model');
		$where_=array(
			'status_post'=>1
		);
		$data_post=$this->Master_model->master_result($where_,'v_post');
        $data['items'] = $data_post;
        $this->load->view('global/sitemap', $data);
	}

	public function category($name)
	{
		$this->load->helper('security');
		$name=xss_clean($name);
		$data=array('judul'=>$name,'category_search'=>'category','cetegory_name'=>$name);
		$this->header($name);
		$this->load->view('global/list_blog',$data);
		$this->footer();
	}

	public function search($label,$kode)
	{
		$this->load->helper('security');
		$kode=xss_clean($kode);
		$label=xss_clean($label);
		$data=array('judul'=>$kode,'category_search'=>$label,'cetegory_name'=>$kode);
		$this->header($kode);
		$this->load->view('global/list_blog',$data);
		$this->footer();
	}

	public function search_key()
	{
		$this->load->helper('security');
		$kode=$this->input->post('search',true);
		$kode=xss_clean($kode);
		$data=array('judul'=>$kode,'cetegory_name'=>$kode,'category_search'=>'');
		$this->header($kode);
		$this->load->view('global/list_blog',$data);
		$this->footer();
	}

	public function post($id_post)
	{
		$this->load->model('Master_model');
        $where_=array('tubmail'=>$id_post);
        $data_post=$this->Master_model->master_get($where_,'v_post');
        
        if($data_post){
			$data=array('post'=>$data_post);
            $this->header($data_post->judul);
            $this->load->view('global/detail_post',$data);
            $this->footer();
        }
		
	}

	
	
	public function header($header='')
	{
		$data_header=array('header'=>$header);
		$this->load->view('global/header',$data_header);
	}
	
	public function footer()
	{
		$this->load->view('global/footer');
	}
}
