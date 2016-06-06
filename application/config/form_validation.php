<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* *
 * Konfigurasi semua validasi form
 */

$config = array(
	'Autentikasi/login' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'xss_clean|trim|required|alpha_numeric'
		),
		
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required'
		)
	)
);