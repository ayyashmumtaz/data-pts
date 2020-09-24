<?php

class Mobil_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_data()
	{
		$query = $this->db->get('mobil');
		return $query->result();
	}

	public function cariData($date)
	{
	$this->db->select('*');
	$this->db->from('mobil');
	$this->db->where('tgl_daftar', $date);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
	return $query->result();
	} else {
	return false;
	}
	}

	public function tambah_mobil()
	{
		$data = [
					'kdmobil' => $this->input->post('kdmobil'),
					'jenis' => $this->input->post('jenis'),
					'tahun' => $this->input->post('tahun'),
				];

		$this->db->insert('mobil', $data);
	}

	public function edit_mobil($id)
	{
		$query = $this->db->get_where('mobil', ['kdmobil' => $id]);
		return $query->row();
	}

	public function update_mobil()
	{
		$kondisi = ['kdmobil' => $this->input->post('kdmobil')];
		
		$data = [
					'jenis' => $this->input->post('jenis'),
					'tahun' => $this->input->post('tahun'),

				];

		$this->db->update('mobil', $data, $kondisi);
	}

	public function hapus_mobil($id)
	{
		$this->db->delete('mobil', ['kdmobil' => $id]);
	}

	public function getAll() {
           $this->db->select('*');
           $this->db->from('mobil');
           $query = $this->db->get();
           return $query->result();
      }

}

?>