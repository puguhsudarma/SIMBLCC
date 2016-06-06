<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_Controller extends CI_Controller {
	//attribut peserta
	protected $_id_peserta;
	protected $_nama_peserta;
	protected $_tingkat_sekolah_peserta;
	protected $_verifikasi_peserta;
	protected $_ikuti_lomba_peserta;

	protected $_model 		= '';
	protected $_nama_model	= '';
	protected $_layout		= 'Master_layout_view';
	public $data			= array(
		'title' => 'Peserta - Sistem Informasi Manajemen BLCC',
		'header' => 'BLCC VIII',
		'mini_header' => 'Open your mind, Open your logic.',
		'footer' => 'Copyright&copy; Kelompok 3 PBW. 2016'
	);

	public function __construct(){
		parent::__construct();

		//otomatis loading model
		$this->load->model($this->_model, $this->_nama_model);
	
		//periksa user
		$this->data['logged_in'] = $this->session->userdata('logged_in');
		$this->data['level'] 	 = $this->session->userdata('level');
		
		if(!$this->data['logged_in']){
			redirect(site_url());
		} else {
			if($this->data['level'] !== 1){
				redirect(site_url('admin'));
			}	
		}

		//load atribut peserta dari session login
		$this->_id_peserta				= $this->session->userdata('id_peserta');
		$this->_nama_peserta			= $this->session->userdata('nama_peserta');
		$this->_tingkat_sekolah_peserta	= $this->session->userdata('tingkat_sekolah_peserta');
		$this->_verifikasi_peserta		= $this->session->userdata('verifikasi_peserta');
		$this->_ikuti_lomba_peserta		= $this->session->userdata('ikuti_lomba_peserta');

		//load nama user session
		$this->data['nama_user'] = $this->session->userdata('nama_peserta');
		$this->data['verifikasi'] = $this->session->userdata('verifikasi_peserta');
	}
}

/* End of file Peserta_Controller.php */
/* Location: ./application/core/Peserta_Controller.php */