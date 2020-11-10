<?php

class Penggajian_model extends CI_model{

	public function get_data_pegawai(){
		return $this->db->get('tbl_pegawai')->result();
	}

	public function get_data_jabatan(){
		return $this->db->get('tbl_jabatan')->result();
	}


	public function get_data_potongan(){
		return $this->db->get('tbl_potongan_gaji')->result();
	}


	public function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function update_data($table, $data, $where){
		$this->db->update($table, $data, $where);
	}

	public function delete_data($data){
		$this->db->where('id_pegawai', $data['id_pegawai']);
		$this->db->delete('tbl_pegawai',$data);
	}

	public function delete_data_kehadiran($data){
		$this->db->where('id_kehadiran', $data['id_kehadiran']);
		$this->db->delete('tbl_kehadiran',$data);
	}


	public function total_pegawai(){
		return $this->db->get('tbl_pegawai')->num_rows();
	}
		public function downloadPembayaran($id)
	{
		$query= $this->db->get_where('transaksi', array('id_rental' => $id));
		return $query->row_array();
	}

		public function get_where($where,$table){
		return $this->db->get_where($table,$where);
	}

		public function get_data_mobil($id_mobil){
		$this->db->select('*');
		$this->db->from('mobil');
		$this->db->join('type', 'type.id_type = mobil.id_type', 'left');
		$this->db->where('id_mobil',$id_mobil);
		return $this->db->get()->row();
	}

	public function insert_batch($table = null, $data = array())
	{
		$jumlah = count($data);
		if($jumlah > 0)
		{
			$this->db->insert_batch($table, $data);
		}
	}


	public function cek_login()
	{
		$nik = set_value('nik');
		$password = set_value('password');

		$result = $this->db
						->where('nik',$nik)
						->where('password',md5($password))
						->limit(1)
						->get('tbl_pegawai');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return FALSE;
		}
	}
 }
  
?>