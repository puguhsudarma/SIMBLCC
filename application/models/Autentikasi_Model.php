<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi_Model extends MY_Model {
	//Read data to database from reference input (admin)
	public function cek_login_admin($username, $password){
		//override atribut superkelas
		$this->_tabel = 'sbc_admin';

		//Konfigurasi read data
		$kondisi = array(
			'username_admin' => $username,
			'password_admin' => md5($password)
		);
		
		//read data dan simpan pada variabel objek $data
		$data = $this->get_one($kondisi);

		if($data){
			return $data;
		} else {
			return FALSE;
		}
	}

	//Read data to database from reference input (peserta)
	public function cek_login_peserta($username, $password){
		//override atribut superkelas
		$this->_tabel = 'all_data_peserta';
		
		//Konfigurasi read data
		$kondisi = array(
			'id_peserta' => $username,
			'password_peserta' => md5($password)
		);
		
		//read data dan simpan pada variabel objek $data
		$data = $this->get_one($kondisi);

		//return data
		if($data){
			return $data;
		} else {
			return FALSE;
		}
	}
}

/* End of file Autentikasi_Model.php */
/* Location: ./application/models/Autentikasi_Model.php */