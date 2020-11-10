<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Halaman';
		$this->load->view('templates/header',$data);
		$this->load->view('login');
		$this->load->view('templates/footer_login');
	}

	public function login()
	{

		$this->_rules();

		if($this->form_validation->run() == FALSE){
		$data['title'] = 'Halaman Login';
		$this->load->view('templates/header.php',$data);
		$this->load->view('login');
		$this->load->view('templates/footer_login.php');	
		} else{
			$nik 				= $this->input->post('nik');
			$password 			= md5($this->input->post('password'));

			$cek = $this->penggajian_model->cek_login($nik, $password);

			if ($cek == FALSE)
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>NIK atau Password Salah!!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
			}else{
				$this->session->set_userdata('id_pegawai', $cek->id_pegawai);
				$this->session->set_userdata('nik', $cek->nik);
				$this->session->set_userdata('role_id', $cek->role_id);
				$this->session->set_userdata('nama_pegawai', $cek->nama_pegawai);

				switch ($cek->role_id) {
					case 1 : redirect('dashboard');
						break;
					case 2 : redirect('pegawai/dashboard');
						break;
					
					default:
					break;
				}
			}
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anda Telah Logout!!</div>');
		redirect('auth');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nik','NIK','required',[
			'required' => 'NIK harus diisi!!']);
		$this->form_validation->set_rules('password','Password','required',[
			'required' => 'Password harus diisi!!']);
	}
}
