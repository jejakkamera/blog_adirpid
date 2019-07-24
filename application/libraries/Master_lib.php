<?php (! defined('BASEPATH')) and exit('No direct script access allowed');

class Master_lib {
    private $_ci;
    public function __construct()
    {
        $this->_ci = & get_instance();
        $this->_ci->load->helper('url');
        $this->_ci->load->library('session');
        $this->_ci->load->library('Alert');
        $this->_ci->load->model('Master_model');

    }

    public function master_list($module,$kode="")
	{
            $data_isi=$this->isi_list1($module);
            //print_r($data_isi);

            $this->_ci->load->library('../controllers/master/'.$module);

            $obj = new $this->_ci->$module();
            $data_detail=$obj->detail($kode);

            $data_kirim=array(
                'data_isi'=>$data_isi,
                'data_detail'=>$data_detail,
            );

            return $data_kirim;
    }

    public function isi_list1($menu_list)
    {	
		$where_=array(
			'module'=>$menu_list
		);
        $data_h=$this->_ci->Master_model->ms_list($where_,'tabel');

        
		if($data_h){
            //'coloum'=>'[{"COLUMNS":[{ "data": "nim"},{ "data": "nim"},{ "data": "tahun"}, { "data": "tanggal"},{ "data": "uang_masuk"},{ "data": "cicilan"}, { "data": "action", "orderable":false,"bSearchable": false}]}]'
            //print_r($data_h[0]['code_nama']);
            $coloum='[{"COLUMNS":[{ "data": "'.$data_h[0]['code_nama'].'"},';
            $search_able=array();
            $i=1;
            foreach($data_h as $rows){
                $coloum=$coloum.'{ "data": "'.$rows['code_nama'].'"';
                    if($rows['orderable']==1){
                        $coloum=$coloum.'},';
                        array_push($search_able,$i);
                    }else{
                        $coloum=$coloum.', "orderable":false,"bSearchable": false},';
                    }
                    $i++;
            }
            $coloum=$coloum.']}]';
            $data=array(
                'header'=>$data_h,
                'coloum'=>$coloum,
                'search'=>$search_able,
            );
			return $data;
		}else{
			$text = $this->_ci->alert->warning('Sistem Not Found');
			$this->_ci->session->set_flashdata('message',$text);
			redirect(site_url('Master_control'));
		}
    }

    public function master_form($action,$module,$kode="")
    {
        
		$isi='isi_form';
		$data_isi=$this->$isi($action,$module);

        $this->_ci->load->library('../controllers/master/'.$module);

        $obj = new $this->_ci->$module();
        $data_detail=$obj->detail_form($action,$kode);


		$data_kirim=array(
			'data_isi'=>$data_isi,
            'data_detail'=>$data_detail,
            'module'=>$module
		);

		if($action=='update'){
            
            $data_detail=$obj->data_master($kode);
            $data_detail = json_decode(json_encode($data_detail), True);

		        if(!$data_detail){
                    $text = $this->_ci->alert->warning('Data Not Found');
                    $this->_ci->session->set_flashdata('message', $text);

                    redirect(site_url('master_control/master_list/'.$module));
		        }

			$data_kirim['status']='update';
			//$data_kirim['module']=$module;
			$data_kirim['data_master']=$data_detail;
			
		}else{
			$data_kirim['status']='';
        }
        
        return $data_kirim;

    }

    public function isi_form($action,$menu_list)
    {	
		$where_=array(
			'menu'=>$menu_list,
        );
        
		if($action=='update'){
			$where_['id_tabel']=0;
		}

        $data=$this->_ci->Master_model->ms_list($where_,'form');

		if($data){
			return $data;
		}else{
			$text = $this->_ci->alert->warning('Sistem Not Found');
			$this->_ci->session->set_flashdata('message',$text);
			redirect(site_url('Master_control'));
		}
    }


    public function master_action($action,$module,$kode="")
    {	
        if($action=="update"){
            $this->_ci->load->library('../controllers/master/'.$module);

            $obj = new $this->_ci->$module();
            $data_detail=$obj->action_update($kode);

            if($data_detail==false){
                $this->_ci->master_form($action,$module,$kode);
            }

        }else{
            $this->_ci->load->library('../controllers/master/'.$module);

            $obj = new $this->_ci->$module();
            $data_detail=$obj->action_create($kode);

            if($data_detail==false){
                $this->_ci->master_form($action,$module,$kode);
            }

        }

    }

   

    public function master_delete($module,$tabel,$id,$coloum_id,$id2='',$coloum_id2='')
    {	
        $where_=array(
            $coloum_id=>$id
        );
        if($id2!=''){
            $where_[$coloum_id2]=$id2;
        }

        //$cek_user=$this->M_master->master_get($where_,$tabel);
        $cek_user=$this->_ci->Master_model->master_get($where_,$tabel);

        if ($cek_user) {
            
            $this->_ci->load->library('../controllers/master/'.$module);

            $obj = new $this->_ci->$module();
            $data_detail=$obj->action_delete($id,$id2);

            $this->_ci->Master_model->delete_query($where_, $tabel);

            $data_history=json_encode($cek_user);
			$this->_ci->Master_model->insert_history('Delete',$tabel, $data_history);

            $text = $this->_ci->alert->success('record successfully deleted');
            $this->_ci->session->set_flashdata('message',$text);
            redirect(site_url('master_control/master_list/'.$module));
            
        } else {

            $text = $this->_ci->alert->warning('Record Not Found');
            $this->_ci->session->set_flashdata('message',$text);
            redirect(site_url('master_control/master_list/'.$module));
            
        }

    }

    public function cek_akses($module,$level,$action){
        $access = $this->_ci->Master_model->cek_akses($module,$level,$action);
        if($access==1){
            return true;
        }else if($access==0){
			
            $text = $this->_ci->alert->warning('Anda Tidak Memiliki Akses');
            $this->_ci->session->set_flashdata('message',$text);
            redirect(site_url('Master_control'));
      
        }else{
      
            $text = $this->_ci->alert->danger('Sistem Not Found');
            $this->_ci->session->set_flashdata('message',$text);
            redirect(site_url('Master_control'));
            
        }
    }
  

}