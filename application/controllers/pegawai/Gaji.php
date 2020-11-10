<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

        public function __construct(){
        parent::__construct();
        if($this->session->userdata('role_id') != '2'){
        redirect('auth','refresh');
    }
}


	public function index()
	{
        $data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Data Gaji';
        $nik = $this->session->userdata('nik');
        $data['gaji'] = $this->db->query("SELECT tbl_pegawai.nama_pegawai, tbl_pegawai.nik, tbl_jabatan.nama_jabatan, tbl_jabatan.gaji_pokok, tbl_jabatan.uang_transport, tbl_jabatan.uang_makan, tbl_kehadiran.alpha, tbl_kehadiran.bulan, tbl_kehadiran.id_kehadiran, tbl_kehadiran.hadir
        	FROM tbl_pegawai
        	INNER JOIN tbl_kehadiran ON tbl_kehadiran.nik = tbl_pegawai.nik
        	INNER JOIN tbl_jabatan ON tbl_pegawai.nama_jabatan = tbl_jabatan.nama_jabatan
        	WHERE tbl_kehadiran.nik = '$nik'
        	ORDER BY tbl_kehadiran.bulan DESC")->result();
        $data['potongan'] = $this->penggajian_model->get_data_potongan();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar_pegawai',$data);
		$this->load->view('pegawai/data_gaji',$data);
		$this->load->view('templates/footer');
	}


        public function cetak_slip($id)
    {
        $data['title']   = 'Cetak Slip Gaji';
        $data['pegawai'] = $this->penggajian_model->get_data_pegawai();
        $data['print_slip'] = $this->db->query("SELECT tbl_pegawai.nama_pegawai, tbl_pegawai.nik, tbl_jabatan.nama_jabatan, tbl_jabatan.gaji_pokok, tbl_jabatan.uang_transport, tbl_jabatan.uang_makan, tbl_kehadiran.alpha, tbl_kehadiran.id_kehadiran, tbl_kehadiran.bulan, tbl_kehadiran.hadir
            FROM tbl_pegawai
            INNER JOIN tbl_kehadiran ON tbl_kehadiran.nik = tbl_pegawai.nik
            INNER JOIN tbl_jabatan ON tbl_pegawai.nama_jabatan = tbl_jabatan.nama_jabatan
            WHERE tbl_kehadiran.id_kehadiran = '$id'")->result();
        $data['potongan'] = $this->penggajian_model->get_data_potongan();
        $this->load->view('templates/header',$data);
        $this->load->view('pegawai/cetak_slip_gaji',$data);
    }



	

}