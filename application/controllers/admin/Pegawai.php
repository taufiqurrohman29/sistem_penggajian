<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

		public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '1'){
		redirect('auth','refresh');
	}
}


	public function index()
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Data Pegawai';
		$data['pegawai'] = $this->penggajian_model->get_data_pegawai();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/data_pegawai',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_pegawai()
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Tambah Data Pegawai';
		$data['jabatan'] = $this->penggajian_model->get_data_jabatan();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/form_tambah_pegawai',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_pegawai_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_pegawai();
		} else {
			$nik 					= $this->input->post('nik');
			$nama_pegawai 			= $this->input->post('nama_pegawai');
			$jenis_kelamin 			= $this->input->post('jenis_kelamin');
			$nama_jabatan 			= $this->input->post('nama_jabatan');
			$tanggal_masuk 			= $this->input->post('tanggal_masuk');
			$status 				= $this->input->post('status');
			$foto 		= $_FILES['foto']['name'];
			if($foto = ''){}else{
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto')) {
					echo "Foto gagal di upload!";
				} else {
					$foto = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nik'					=> $nik,
				'nama_pegawai'		 	=> $nama_pegawai,
				'jenis_kelamin'		 	=> $jenis_kelamin,
				'nama_jabatan' 				=> $nama_jabatan,
				'tanggal_masuk' 		=> $tanggal_masuk,
				'status' 				=> $status,
				'foto' 					=> $foto
			);

			$this->penggajian_model->insert_data($data,'tbl_pegawai');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Data Pegawai berhasil di tambahkan!</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
			redirect('admin/pegawai');
		}
	}

	public function delete_pegawai($id_pegawai)
	{
		$where = array('id_pegawai' => $id_pegawai);
		$this->penggajian_model->delete_data($where,'tbl_pegawai');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Data Pegawai berhasil di hapus!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('admin/pegawai');
	}

	public function _rules(){
		$this->form_validation->set_rules('nik','NIK','required',[
			'required' => 'NIK harus diisi!!']);
		$this->form_validation->set_rules('nama_pegawai','Nama Pegawai','required',[
			'required' => 'Nama Pegawai harus diisi!!']);
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',[
			'required' => 'Jenis Kelamin harus diisi!!']);
		$this->form_validation->set_rules('nama_jabatan','Jabatan','required',[
			'required' => 'Jabatan harus diisi!!']);
		$this->form_validation->set_rules('tanggal_masuk','Tanggal Masuk','required',[
			'required' => 'Tanggal Masuk harus diisi!!']);
		$this->form_validation->set_rules('status','Status','required',[
			'required' => 'Status harus diisi!!']);
	}
}
