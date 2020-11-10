<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slip_gaji extends CI_Controller {

        public function __construct(){
        parent::__construct();
        if($this->session->userdata('role_id') != '1'){
        redirect('auth','refresh');
    }
}


	public function index()
	{
        $data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Filter Cetak Slip Gaji Pegawai';
        $data['pegawai'] = $this->penggajian_model->get_data_pegawai();
        $bulan        = $this->input->post('bulan');
        $tahun        = $this->input->post('tahun');
        $bulantahun   = $bulan.$tahun;
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/filter_cetak_slip',$data);
		$this->load->view('templates/footer');
	}

    public function cetak_slip()
    {
        $data['title']   = 'Cetak Slip Gaji Pegawai';
        $data['pegawai'] = $this->penggajian_model->get_data_pegawai();
        $nama            = $this->input->post('nama_pegawai');
        $bulan           = $this->input->post('bulan');
        $tahun           = $this->input->post('tahun');
        $bulantahun      = $bulan.$tahun;
        $data['cetak_slip'] = $this->db->query("SELECT tbl_pegawai.nama_pegawai, tbl_pegawai.nik, tbl_pegawai.jenis_kelamin, tbl_jabatan.nama_jabatan, tbl_jabatan.gaji_pokok, tbl_jabatan.uang_transport, tbl_jabatan.uang_makan, tbl_kehadiran.alpha, tbl_kehadiran.hadir, tbl_kehadiran.bulan
            FROM tbl_pegawai
            INNER JOIN tbl_kehadiran ON tbl_kehadiran.nik = tbl_pegawai.nik
            INNER JOIN tbl_jabatan ON tbl_pegawai.nama_jabatan = tbl_jabatan.nama_jabatan
            WHERE tbl_kehadiran.bulan = '$bulantahun' AND tbl_pegawai.nama_pegawai = '$nama'")->result();
        $data['potongan'] = $this->penggajian_model->get_data_potongan();
        $this->load->view('templates/header',$data);
        $this->load->view('admin/cetak_slip_gaji',$data);
    }

	

}
