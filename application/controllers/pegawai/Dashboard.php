<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

		public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '2'){
		redirect('auth','refresh');
	}
}


	public function index()
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Dashboard Pegawai';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar_pegawai',$data);
		$this->load->view('pegawai/dashboard',$data);
		$this->load->view('templates/footer');
	}
}
