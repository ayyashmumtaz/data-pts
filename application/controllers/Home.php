<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mobil_model');
		$this->load->helper(['url_helper', 'form']);
    	$this->load->library(['form_validation', 'session']);
	}

	public function cari()
	{
		$date = $this->input->post('date');
		$data = $this->mobil_model->cariData($date);

		if ($data != false) {
			$data1['database'] = $this->mobil_model->cariData($date);
		$this->load->view('templates/header', $data1);
		$this->load->view('tampildata', $data1);
		$this->load->view('templates/footer');
		}else{
echo '<script>alert("DATA TIDAK DITEMUKAN!!");</script>';
redirect('home/lihatdata','refresh');
		}

		
		}

	public function lihatdata()
	{
		$data['database'] = $this->mobil_model->get_all_data();

		$data['title'] = "DATA PTS ALKAUTSAR";

		$this->load->view('templates/header', $data);
		$this->load->view('tampildata', $data);
		$this->load->view('templates/footer');
	}

	public function formtambah()
	{
		$data['title'] = "Tambah Data | Test tampil Database";

		$this->load->view('templates/header', $data);
		$this->load->view('formtambah');
		$this->load->view('templates/footer');
	}

	public function tambahmobil()
	{
			$this->mobil_model->tambah_mobil();
			$this->session->set_flashdata('input_sukses','Data siswa berhasil di input');
			redirect('home/lihatdata','refresh');
		
	}

	public function hapusdata($id)
	{
		$this->mobil_model->hapus_mobil($id);
		$this->session->set_flashdata('hapus_sukses','Data siswa berhasil di hapus');
		redirect('/home/lihatdata');
	}

	public function formedit($id)
	{
		$data['title'] = 'Edit Data | Test tampil Database';

		$data['db'] = $this->mobil_model->edit_mobil($id);

		$this->load->view('templates/header', $data);
		$this->load->view('formedit', $data);
		$this->load->view('templates/footer');
	}

	public function updatemobil($id)
	{
		$this->validasi();

		if($this->form_validation->run() === FALSE)
		{
			$this->formedit($id);
		}
		else
		{
			$this->mobil_model->update_mobil();
			$this->session->set_flashdata('update_sukses', 'Data siswa berhasil diperbaharui');
			redirect('/home/lihatdata');
		}
	}

	public function validasi()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'jenis',
					'label' => 'Jenis',
					'rules' => 'required'
				],
				[
					'field' => 'tahun',
					'label' => 'Tahun',
					'rules' => 'required'
				]];

		$this->form_validation->set_rules($config);
	}

	public function export_excel(){
           $data = array( 'title' => 'Data PTS',
                'buku' => $this->mobil_model->getAll());
 
           $this->load->view('vw_laporan_excel',$data);
      }

	
}
?>