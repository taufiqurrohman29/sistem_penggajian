<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran extends CI_Controller {

		public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '1'){
		redirect('auth','refresh');
	}
}


	public function index()
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Data Kehadiran';
		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
        $data['kehadiran'] = $this->db->query("SELECT tbl_kehadiran.*, tbl_pegawai.nama_pegawai, tbl_pegawai.jenis_kelamin, tbl_pegawai.nama_jabatan
        	FROM tbl_kehadiran
        	INNER JOIN tbl_pegawai ON tbl_kehadiran.nik = tbl_pegawai.nik
        	INNER JOIN tbl_jabatan ON tbl_pegawai.nama_jabatan = tbl_jabatan.nama_jabatan
        	WHERE tbl_kehadiran.bulan = '$bulantahun'
        	ORDER BY tbl_pegawai.nama_pegawai ASC")->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/data_kehadiran',$data);
		$this->load->view('templates/footer');
	}

	public function input_kehadiran()
	{
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();

		if($this->input->post('submit', TRUE) == 'submit'){

			$post = $this->input->post();

			foreach ($post['bulan'] as $key => $value) {
				if($post['bulan'][$key] !='' || $post['nik'][$key] !='')
				{
					$simpan[] = array(
						'bulan' 			=> $post['bulan'][$key],
						'nik' 				=> $post['nik'][$key],
						'nama_pegawai' 		=> $post['nama_pegawai'][$key],
						'jenis_kelamin' 	=> $post['jenis_kelamin'][$key],
						'nama_jabatan' 		=> $post['nama_jabatan'][$key],
						'hadir' 			=> $post['hadir'][$key],
						'sakit' 			=> $post['sakit'][$key],
						'alpha' 			=> $post['alpha'][$key],
					);
				}
			}

			$this->penggajian_model->insert_batch('tbl_kehadiran', $simpan);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Data Kehadiran berhasil di tambahkan!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('admin/kehadiran');
		}
		$data['title'] = 'Input Data Kehadiran';
		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }

         
        $data['input_kehadiran'] = $this->db->query("SELECT tbl_pegawai.*, tbl_jabatan.nama_jabatan
        	FROM tbl_pegawai
        	INNER JOIN tbl_jabatan ON tbl_pegawai.nama_jabatan = tbl_jabatan.nama_jabatan
        	WHERE NOT EXISTS (SELECT * FROM tbl_kehadiran WHERE bulan='$bulantahun' AND tbl_pegawai.nik=tbl_kehadiran.nik)
        	ORDER BY tbl_pegawai.nama_pegawai ASC")->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/form_input_kehadiran',$data);
		$this->load->view('templates/footer');
	}

	public function delete_kehadiran($id_kehadiran)
	{
		$where = array('id_kehadiran' => $id_kehadiran);
		$this->penggajian_model->delete_data_kehadiran($where,'tbl_kehadiran');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Data Kehadiran berhasil di hapus!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('admin/kehadiran');
	}

	public function update_kehadiran($id){
		$data['pengguna'] = $this->db->get_where('tbl_pegawai',['nik' => $this->session->userdata('nik')])->row_array();
		$data['title'] = 'Update Data Kehadiran';
		$where = array('id_kehadiran' => $id);
		$data['kehadiran'] = $this->db->query("SELECT * FROM tbl_kehadiran WHERE id_kehadiran = '$id'")->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/form_update_kehadiran',$data);
		$this->load->view('templates/footer');
	}

	public function update_kehadiran_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->update_kehadiran();
		} else {
			$id 					= $this->input->post('id_kehadiran');
			$bulan 					= $this->input->post('bulan');
			$nik 					= $this->input->post('nik');
			$nama_pegawai 			= $this->input->post('nama_pegawai');
			$jenis_kelamin 			= $this->input->post('jenis_kelamin');
			$nama_jabatan 			= $this->input->post('nama_jabatan');
			$hadir 					= $this->input->post('hadir');
			$sakit 					= $this->input->post('sakit');
			$alpha 					= $this->input->post('alpha');

			$data = array(
				'bulan'		 	 => $bulan,
				'nik'			 => $nik,
				'nama_pegawai'	 => $nama_pegawai,
				'jenis_kelamin'	 => $jenis_kelamin,
				'nama_jabatan'	 => $nama_jabatan,
				'hadir'	 		 => $hadir,
				'sakit'	 		 => $sakit,
				'alpha'	 		 => $alpha,
			);

			$where = array(
				'id_kehadiran' => $id
			);

			$this->penggajian_model->update_data('tbl_kehadiran', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Data Kehadiran berhasil di update!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('admin/kehadiran');
		}

	}

	public function pdf()
	{
		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
        $data['kehadiran'] = $this->db->query("SELECT tbl_kehadiran.*, tbl_pegawai.nama_pegawai, tbl_pegawai.jenis_kelamin, tbl_pegawai.nama_jabatan
        	FROM tbl_kehadiran
        	INNER JOIN tbl_pegawai ON tbl_kehadiran.nik = tbl_pegawai.nik
        	INNER JOIN tbl_jabatan ON tbl_pegawai.nama_jabatan = tbl_jabatan.nama_jabatan
        	WHERE tbl_kehadiran.bulan = '$bulantahun'
        	ORDER BY tbl_pegawai.nama_pegawai ASC")->result();
		$this->load->library('dompdf_gen');
        $this->load->view('laporan_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_kehadiran_pegawai.pdf", array('Attachment' =>0));



	}

		public function _rules(){
		$this->form_validation->set_rules('bulan','Bulan','required');
		$this->form_validation->set_rules('nik','NIK','required');
		$this->form_validation->set_rules('nama_pegawai','nama_pegawai','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		$this->form_validation->set_rules('nama_jabatan','nama_jabatan','required');
		$this->form_validation->set_rules('hadir','hadir','required');
		$this->form_validation->set_rules('sakit','sakit','required');
		$this->form_validation->set_rules('alpha','alpha','required');

	}

}
