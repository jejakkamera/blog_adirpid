<?php
class Custom_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->db1 = $this->load->database('default', TRUE);

	}

	function module_lulusan()
	{	
        $this->datatables->select('*,nim');
		$this->datatables->from('v_lulusan');

		if($this->session->userdata('level')==4){
            //$this->datatables->join('ms_status','ms_status.kode_status=v_jadwal.status_gedung');
            $this->datatables->where('prodi',$this->session->userdata('id'));
			$this->datatables->add_column('action',        
        anchor(
			site_url('custom_controler/list_mk_form/$1'),'<span class="btn-label"><i class="fa fa-trash-o"></i></span> Seleksi MK','class="btn btn-success" ').' | '.
		anchor(
			site_url('master_control/master_delete/lulusan/ms_lulusan/$1/nim'),'<span class="btn-label"><i class="fa fa-trash-o"></i></span> Delete','class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure Delete $1  ?\')"').' | '.
		anchor(
                site_url('master_control/master_form/update/lulusan/$1'),'<span class="btn-label"><i class="fa fa-trash-o"></i></span> Upadate','class="btn btn-info"'), 'nim');
       
		}else if($this->session->userdata('level')==2){
			$this->datatables->where('nim',$this->session->userdata('id'));
			$this->datatables->add_column('action',        
		anchor(
                site_url('master_control/master_form/update/mhs_lulusan/$1'),'<span class="btn-label"><i class="fas fa-tags"></i></span> Pendaftaran Pembuatan ijazah','class="btn btn-info"'), 'nim');
      
		}else if($this->session->userdata('level')==6){
			$this->datatables->where('status >=','2');
			$this->datatables->add_column('action',
			        
		anchor(
				site_url('master_control/master_form/update/akademik_lulusan/$1'),'<span class="btn-label"><i class="fas fa-tags"></i></span> Update Pin','class="btn btn-info"').' | '.
		anchor(
				site_url('master_control/master_list/skpi/$1'),'<span class="btn-label"><i class="fas fa-tags"></i></span> Cek SKPI','class="btn btn-warning"').' | '.
		anchor(
					site_url('master_control/master_list/transkip/$1'),'<span class="btn-label"><i class="fas fa-tags"></i></span> Cek Transkip','class="btn btn-success" ')		
		, 'nim');
      
		}
		
         return $this->datatables->generate();
	}

	function module_ijazah()
	{	
        $this->datatables->select('*,nim');
		$this->datatables->from('v_lulusan');
		$this->datatables->where('status','3');
		if($this->session->userdata('level')==6){
		$this->datatables->add_column('action',
		
		
		anchor(
				site_url('custom_controler/cetak_jazah/$1'),'<span class="btn-label"><i class="fas fa-tags"></i></span> Cetak Ijazah','class="btn btn-info"').' | '.
		anchor(
				site_url('master_control/master_list/skpi/$1'),'<span class="btn-label"><i class="fas fa-tags"></i></span> Cetak SKPI','class="btn btn-warning"').' | '.
		anchor(
					site_url('custom_controler/cetak_transkip/$1'),'<span class="btn-label"><i class="fas fa-tags"></i></span> Cetak Transkip','class="btn btn-success" ')		
		, 'nim');
		}
		
        return $this->datatables->generate();
	}

	function module_transkip($nim)
	{	
        $this->datatables->select('*,kode_mk');
		$this->datatables->from('transkip_nilai');
		$this->datatables->where('nim',$nim);

        return $this->datatables->generate();
	}

	function module_postingan()
	{	
        $this->datatables->select('*,id_post');
		$this->datatables->from('v_post');
		$this->datatables->add_column('action',
		anchor(
			site_url('master_control/master_delete/postingan/ms_post/$1/id_post'),'<span class="btn-label"><i class="fa fa-trash-o"></i></span> Delete','class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure Delete $1  ?\')"').' | '.       
		anchor(
                site_url('custom_controler/edit_post/$1'),'<span class="btn-label"><i class="fas fa-tags"></i></span> Edit','class="btn btn-info"'), 'id_post');
      
        return $this->datatables->generate();
	}
	
	function nim($mk) {
		
		//http://sipt.ubpkarawang.ac.id/api/list_mhs/55201/6Lc11KcUAAAAAHUqiNdD6cUNEgEtuGIxH
		$url = 'http://sipt.ubpkarawang.ac.id/api/list_mhs/'.$this->session->userdata('id').'/6Lc11KcUAAAAAHUqiNdD6cUNEgEtuGIxH';
						$data = array('kec' => $mk);
						$options = array(
										'http' => array(
										'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
										'method'  => 'POST',
										'content' => http_build_query($data),
								)
						);
						
						$context  = stream_context_create($options);
						$result = file_get_contents($url, false, $context);
						return $result;
						//$data_json=json_decode($result);
      
	}
	
	function pem_1($mk) {
		
		//http://sipt.ubpkarawang.ac.id/api/list_mhs/55201/6Lc11KcUAAAAAHUqiNdD6cUNEgEtuGIxH
		$url = 'http://sipt.ubpkarawang.ac.id/api/dosen_list/data/6Lc11KcUAAAAAHUqiNdD6cUNEgEtuGIxH';
						$data = array('kec' => $mk);
						$options = array(
										'http' => array(
										'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
										'method'  => 'POST',
										'content' => http_build_query($data),
								)
						);
						
						$context  = stream_context_create($options);
						$result = file_get_contents($url, false, $context);
						return $result;
						//$data_json=json_decode($result);
      
	}
	
	function pem_2($mk) {
		
		$result = $this->pem_1($mk);
		return $result;
      
	}
	
	function jenis_kelamin($mk) {
        //$this->cek_login();
        $this->db->select('kode_jk as kode,nama_jk as nama');
        $this->db->from('ms_jk');
        $this->db->like('nama_jk',$mk);

        $query=$getData=$this->db->get();
     
            if($getData->num_rows() > 0)
     
            return json_encode($query->result());
     
     else
     
            return null;
      
    }
	
	

}
