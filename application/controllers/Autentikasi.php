<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends Publik_Controller {
	protected $_model = 'Autentikasi_Model';
	protected $_nama_model = 'autentikasi';
	protected $_error_msg = 'Username atau Password Salah,';

	public function index(){
		//view login
		$this->data['content_view_location'] = 'Login_view';
		$this->load->view($this->_layout, $this->data);
	}

	public function login(){
		//validation
		/*
		if($this->form_validation->run()){
			//view login
			$this->data['content_view_location'] = 'Login_view';
			$this->load->view($this->_layout, $this->data);
			return;		
		}*/

		//get input
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//login admin atau peserta ?
		if(preg_match('/[0-9]/', $username)){
			//peserta
			$data_peserta = $this->autentikasi->cek_login_peserta($username, $password);

			if($data_peserta){
				//konfigurasi session
				$session = array(
					'level'						=> 1,
					'logged_in'					=> TRUE,
					'id_peserta'				=> $data_peserta->id_peserta,
					'nama_peserta'				=> $data_peserta->nama_peserta,
					'tingkat_sekolah_peserta'	=> $data_peserta->id_tingkat_sekolah_peserta,
					'verifikasi_peserta'		=> $data_peserta->verifikasi_peserta,
					'ikuti_lomba_peserta'		=> $data_peserta->ikuti_lomba_peserta
				);
				$this->session->set_userdata($session);

				//redirect
				redirect(site_url('peserta'));
			} else {
				$this->session->set_flashdata('msg_error', $this->_error_msg);
				redirect(site_url('publik/autentikasi'));
			}
		} else {
			//admin
			$data_admin = $this->autentikasi->cek_login_admin($username, $password);
			
			if($data_admin){
				//konfigurasi session
				$session = array(
					'level' 		=> 0,
					'logged_in' 	=> TRUE,
					'id_admin' 		=> $data_admin->id_admin,
					'nama_admin' 	=> $data_admin->nama_admin
				);
				$this->session->set_userdata($session);
				//$this->autentikasi->log_aktivitas_admin('Login SIMBLCC');
				//redirect
				redirect(site_url('admin'));
			} else {
				$this->session->set_flashdata('msg_error', $this->_error_msg);
				redirect(site_url('publik/autentikasi'));
			}
		}
	}

	public function logout(){
		//is there any user login?
		if(!$this->session->userdata('logged_in')){
			redirect(site_url());
		}

		//is login admin or peserta?
		if($this->session->userdata('level') == 0){
			//admin
			//$this->autentikasi->log_aktivitas_admin('Logout SIMBLCC');
			$session = array('level', 'logged_in', 'id_admin', 'nama_admin');
		} else {
			//peserta
			$session = array('level', 'logged_in', 'id_peserta', 'nama_peserta', 'tingkat_sekolah_peserta', 'verifikasi_peserta', 'ikuti_lomba_peserta');
		}
		$this->session->unset_userdata($session);
		$this->session->sess_destroy();

		redirect(site_url('publik'));
	}
}