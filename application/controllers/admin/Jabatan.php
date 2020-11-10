<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

		public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '1'){
		redirect('auth','refresh');
	}
}


	public function index()
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Data Jabatan';
		$data['jabatan'] = $this->penggajian_model->get_data_jabatan();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/data_jabatan',$data);
		$this->load->view('templates/footer');
	}

		public function tambah_jabatan()
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Tambah Data Jabatan';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/form_tambah_jabatan',$data);
		$this->load->view('templates/footer');
	}

		public function tambah_jabatan_aksi()
	{

		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_jabatan();
		} else {
			$nama_jabatan 		= $this->input->post('nama_jabatan');
			$gaji_pokok 		= $this->input->post('gaji_pokok');
			$uang_transport 	= $this->input->post('uang_transport');
			$uang_makan 		= $this->input->post('uang_makan');
			

			$data = array(
				'nama_jabatan'		 => $nama_jabatan,
				'gaji_pokok'		 => $gaji_pokok,
				'uang_transport'	 => $uang_transport,
				'uang_makan'		 => $uang_makan
			);

			$this->penggajian_model->insert_data($data,'tbl_jabatan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Data Jabatan berhasil di tambahkan!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('admin/jabatan');
		}
	}

	public function update_jabatan($id_jabatan)
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Form Edit Data Jabatan';
		$where = array('id_jabatan' => $id_jabatan);
		$data['jabatan'] = $this->db->query("SELECT * FROM tbl_jabatan WHERE id_jabatan = '$id_jabatan'")->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/form_edit_jabatan',$data);
		$this->load->view('templates/footer');
	}

	public function update_jabatan_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->update_type();
		} else {
			$id_jabatan 		= $this->input->post('id_jabatan');
			$nama_jabatan 		= $this->input->post('nama_jabatan');
			$gaji_pokok 		= $this->input->post('gaji_pokok');
			$uang_transport 	= $this->input->post('uang_transport');
			$uang_makan 		= $this->input->post('uang_makan');

			$data = array(
				'nama_jabatan'		 => $nama_jabatan,
				'gaji_pokok'		 => $gaji_pokok,
				'uang_transport'	 => $uang_transport,
				'uang_makan'		 => $uang_makan
			);

			$where = array(
				'id_jabatan' => $id_jabatan
			);

			$this->penggajian_model->update_data('tbl_jabatan', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Data Jabatan berhasil di update!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('admin/jabatan');
		}

	}

	public function _rules(){
		$this->form_validation->set_rules('nama_jabatan','Nama Jabatan','required',[
			'required' => 'Nama Jabatan harus diisi!!']);
		$this->form_validation->set_rules('gaji_pokok','Gaji Pokok','required',[
			'required' => 'Gaji Pokok harus diisi!!']);
		$this->form_validation->set_rules('uang_transport','Uang Transport','required',[
			'required' => 'Uang Transport harus diisi!!']);
		$this->form_validation->set_rules('uang_makan','Uang Makan','required',[
			'required' => 'Uang Makan harus diisi!!']);
	}
}
