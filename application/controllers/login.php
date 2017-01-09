<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	function index ()
	{
		 $data['main_content'] ='login_form';
		 $this->load->view('include/templete', $data);
	}


}