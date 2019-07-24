<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	    $this->load->library('form_validation');
	    $this->load->library('session');
	    $this->load->library('Alert');
	    $this->load->helper('security');
    }
    
	
    public function index()
	{

        $session = $this->session->userdata('isLogin');
        if($session == FALSE) //jika session false maka akan menampilkan halaman login
            {
                $this->load->view('login/login');
        }else{
            redirect('dashboard/','refresh');
        }
	}
	
   

    public function login()
	{
		$this->index();
	}
    
    public function login_admin()
	{
		$session = $this->session->userdata('isLogin');
		if($session == FALSE) //jika session false maka akan menampilkan halaman login
        {
		$this->load->view('login');
		$this->load->view('master/footer');
	}else{
		redirect('/admin/','refresh');
	 }
	}
	
	

    
    public function hash_info()
    {
		$data['password']=password_hash("superadmin", PASSWORD_DEFAULT);
		print_r($data);
	}
	
    public function _rules()
    {
	$this->form_validation->set_rules('uname_id', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('pass', 'Password', 'trim|required|xss_clean');
    }

    function logout()
	{

		$this->session->sess_destroy();
		redirect('','refresh');
	}

    function login_proses()
	{

		$id = $this->input->post("uname_id",TRUE);
		$pass = $this->input->post("pass",TRUE);
				
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
            $kembali='Pastikan Username Dan Password di Isi Dengan Benar';
            $kembali = $this->alert->warning($kembali);
			$data=array(
                'status'=>'502',
				'error'=>true,
				'message'=>$kembali

            );
			echo json_encode($data);
			
        } else {
			$this->load->model('m_login');
			$cek = $this->m_login->cek_user($id);
			if(count($cek) == 1){
				foreach ($cek as $cek) {
					$username = $cek['username'];
					$level = $cek['level'];
					$status= $cek['status'];
					$password= $cek['password'];
				}
				if(password_verify($pass, $password)){
						
					$this->session->set_userdata(array(
						'isLogin'   => TRUE, //set data telah login
						'username'  => $username, //set session username
						'level'      => $level,
						'status'      => $status,
					));
						
						$kembali='Selamat Datang '.$username;
						$kembali = $this->alert->success($kembali);
						$data=array(
							'status'=>'200',
							'error'=>false,
							'message'=>$kembali
						);

						echo json_encode($data);
				}else{
					$kembali='Username dan Password tidak cocok';
					$kembali = $this->alert->warning($kembali);
					$data=array(
						'status'=>'502',
						'error'=>false,
						'message'=>$kembali

					);

					echo json_encode($data);
				}


			}else{
						
				$kembali='Username Tidak Ditemukan / Belum aktif';
				$kembali = $this->alert->warning($kembali);
				$data=array(
					'status'=>'502',
					'error'=>true,
					'message'=>$kembali

				);

					echo json_encode($data);

			}
		}
	}
}
