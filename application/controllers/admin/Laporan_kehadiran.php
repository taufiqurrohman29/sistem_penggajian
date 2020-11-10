<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kehadiran extends CI_Controller {

		public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '1'){
		redirect('auth','refresh');
	}
}


	public function index()
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Laporan Kehadiran Pegawai';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/laporan_kehadiran',$data);
		$this->load->view('templates/footer');
	}

	public function cetak_kehadiran()
	{
		$data['title'] = 'Cetak Kehadiran Pegawai';
		$bulan 		  = $this->input->post('bulan');
        $tahun 		  = $this->input->post('tahun');
        $bulantahun = $bulan.$tahun;
        $data['laporan_kehadiran'] = $this->db->query("SELECT * FROM tbl_kehadiran
        	WHERE bulan = '$bulantahun'
        	ORDER BY nama_pegawai ASC")->result();
		$this->load->view('templates/header',$data);
		$this->load->view('admin/cetak_kehadiran',$data);
	}

	
}
