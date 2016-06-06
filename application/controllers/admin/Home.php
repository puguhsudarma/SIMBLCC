<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {
	public function index()
	{
		$this->data['content_view_location'] = 'home/Home_view';
		$this->load->view($this->_layout, $this->data);
	}
}
