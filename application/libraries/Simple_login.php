<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct()
	{
		$this->CI = &get_instance();
	}

	// Login


	// Cek login
	public function cek_login()
	{
		if ($this->CI->session->userdata('username') == '' && $this->CI->session->userdata('id_group') == '') {
			$this->CI->session->set_flashdata('error', 'Oops...silakan login dulu');
			// redirect($this->CI->config->item("my_sso_url") . "/admin");

			redirect('login', 'refresh');
		}
	}

	// Logout
	public function logout()
	{
		session_destroy();
		$this->CI->session->set_flashdata('sukses', 'Terimakasih, Anda berhasil logout');
		redirect(base_url() . 'login');
	}
}
