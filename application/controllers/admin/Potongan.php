<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller {

		public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '1'){
		redirect('auth','refresh');
	}
}


	public function index()
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Data Potongan Gaji';
		$data['potongan'] = $this->penggajian_model->get_data_potongan();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/data_potongan',$data);
		$this->load->view('templates/footer');
	}

}
