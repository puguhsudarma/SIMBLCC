<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {
	protected $_nama_admin	= '';
	protected $_model 		= '';
	protected $_nama_model	= '';
	protected $_layout		= 'admin/master/Master_layout_view';
	public $data			= array(
		'title' => 'Admin - Sistem Informasi Manajemen BLCC',
		'footer' => 'Copyright &copy; 2015 <a href="#">Kelompok PBW</a>.</strong> All rights reserved.'
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
			if($this->data['level'] !== 0){
				redirect(site_url('peserta'));
			}	
		}

		//load nama user session
		$this->data['nama_user'] = $this->session->userdata('nama_admin');
	}
}

/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */