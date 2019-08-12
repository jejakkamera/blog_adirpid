<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        
        $this->load->model('Master_model');
	    $this->load->library('form_validation');
	    $this->load->library('Alert');
        $this->load->helper('security');
        date_default_timezone_set('asia/jakarta');
    }

    public function post()
	{
		$data = $this->input->post("data",TRUE);
        $category = $this->input->post("category",TRUE);
        $tags = $this->input->post("tags",TRUE);
        $bahasa = $this->input->post("bahasa",TRUE);
        $this->_rules();
		if ($this->form_validation->run() == FALSE) {

            if($data=="blog"){
                $where_=array(
                    'status_post'=>1
                );
                $data_post=$this->Master_model->master_result($where_,'v_post');
                $count = count($data_post);
                $kembali='Blog data found '.$count;
                
                $data=array(
                    'status'=>'200',
                    'error'=>true,
                    'message'=>$kembali,
                    'data'=>$data_post
                );
            echo json_encode($data);
            }elseif($data=="tag"){
                $where_=array();
                $data_post=$this->Master_model->master_result($where_,'tag_post');
                $count = count($data_post);
                $kembali='tag data found ';
                
                $data=array(
                    'status'=>'200',
                    'error'=>true,
                    'message'=>$kembali,
                    'data'=>$data_post
                );
                echo json_encode($data);

            }else{
                $kembali='Data not found';
                $kembali = $this->alert->warning($kembali);
                $data=array(
                    'status'=>'502',
                    'error'=>true,
                    'message'=>$kembali,
                    'data'=>null
                );
			echo json_encode($data);
            }

        }else{
            $kembali='Error Connection';
			$kembali = $this->alert->warning($kembali);
			$data=array(
				'status'=>'502',
				'error'=>true,
                'message'=>$kembali,
                'data'=>null
			);
			echo json_encode($data);
        }
        

    }
    
    public function _rules()
    {
	$this->form_validation->set_rules('data', 'data', 'trim|required|xss_clean');
	$this->form_validation->set_rules('category', 'category', 'trim|required|xss_clean');
    }

    protected function rules_fetch()
	{	
		$this->form_validation->set_rules('cetegory_name', 'category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('category_search', 'category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('limit', 'category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('start', 'category', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');	
	}

	function fetch()
	{
		$output = '';
		$this->load->model('Custom_model');
		$this->load->library('form_validation');
		$this->load->library('Alert');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->rules_fetch();

		if ( ($this->form_validation->run() == TRUE) ) {

			$where_=array(
				$this->input->post('category_search')=>$this->input->post('cetegory_name')
			);
			$data = $this->Custom_model->fetch_data($this->input->post('limit'), $this->input->post('start'),$where_);
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $row)
				{
                    $output .= ' <article class="blog_item">
                    <div class="blog_item_img">
                        <img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
                        <a href="'.base_url("web/post/").$row->tubmail.'" class="blog_item_date">
                            <p>'.date("d, M-Y",strtotime($row->create_date)).'</p>
                        </a>
                    </div>

                    <div class="blog_details">
                        <a class="d-inline-block" href="'.base_url("web/post/").$row->tubmail.'">
                            <h2>'.$row->judul.'</h2>
                        </a>
                        <p>'.$row->isi_post.'</p>
                        <ul class="blog-info-link">
                            <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                            <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                        </ul>
                    </div>
                </article>';
                    
                    
                    /*$output .= '
					<div class="post_data">
					<h3 class="text-danger">'.$row->judul.'</h3>
					<p>'.$row->isi_post.'</p>
					</div>
                    ';*/
                    
                    
				}
			}
			echo $output;

		}else{
			$text = $this->alert->warning('Error data form');
			echo $text;
		}

		
	}

}