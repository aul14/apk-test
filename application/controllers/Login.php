<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	// // Halaman index
	public function index()
	{
		$recaptcha = $this->input->post('g-recaptcha-response');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		// cek klo sudah login tidak bisa kembali lagi
		if ($this->session->userdata('username')) {
			redirect('dashboard', 'refresh');
		}
		// Validasi
		$valid 		= $this->form_validation;
		$username	= htmlspecialchars($this->input->post('username'));
		$password	= htmlspecialchars($this->input->post('password'));
		$valid->set_rules('username', 'Username', 'required');
		$valid->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
			$data = array(
				'title'	=> 'Login',
				'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
				'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
			);
			$this->load->view('login_view', $data);
		} else {
			// Query untuk pencocokan data
			$query = $this->db->get_where('tbl_login', array(
				'username' => $username,
			))->row_array();
			// Jika ada hasilnya

			if (password_verify($password, $query['password'])) {
				$row 			= $this->db->query("SELECT a.*
									FROM tbl_login a
									WHERE username = '$username'");
				$admin 			= $row->row();
				$id 			= $admin->id_login;
				$cek_pass		= $admin->password;
				// $foto 	        = $admin->foto;
				$id_group		= $admin->id_group;
				$NIK			= $admin->NIK;
				$id_akses		= $admin->id_akses;
				$username		= $admin->username;
				$last_access	= date('Y-m-d H:i:s');
				// $_SESSION['username'] = $username;
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('password', $cek_pass);
				$this->session->set_userdata('id_group', $id_group);
				$this->session->set_userdata('NIK', $NIK);
				// $this->session->set_userdata('foto', $foto); 
				$this->session->set_userdata('id_akses', $id_akses);
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('last_access', $last_access);
				$this->session->set_userdata('id_login', uniqid(rand()));
				$this->session->set_userdata('id', $id);
				// Kalau benar di redirect
				$this->db->query("UPDATE tbl_login SET last_access = '$last_access' WHERE id_login = '$id'");
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('error', 'Oopss.. Username / Password salah');
				// redirect($this->config->item("my_sso_url") . "/admin");

				redirect('login', 'refresh');
			}
		}
		// End validasi

	}

	// Logout
	public function logout()
	{

		session_destroy();
		redirect('login', 'refresh');
	}
}
