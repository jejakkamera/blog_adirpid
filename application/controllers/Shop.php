<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	
	public function index()
	{
		$data=array('judul'=>'shop');
		$this->header('adirp produk');
		$this->load->view('global/shop',$data);
		$this->footer();
	}

	public function search($keyword,$coloum='')
	{
		$data=array('judul'=>$keyword);
		$this->header($keyword);
		$this->load->view('global/shop',$data);
		$this->footer();
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