<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik_Controller extends CI_Controller {
	protected $_model 		= '';
	protected $_nama_model	= '';
	protected $_layout		= 'Master_layout_view';
	public $data			= array(
		'title' => 'Sistem Informasi Manajemen BLCC',
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
		$uri					 = uri_string();
		
		if($this->data['logged_in'] && $uri != 'publik/autentikasi/logout'){
			if($this->data['level'] == 0){
				redirect(site_url('admin'));
			} else {
				redirect(site_url('peserta'));
			}
		}
	}
}

/* End of file Publik_Controller.php */
/* Location: ./application/core/Publik_Controller.php */