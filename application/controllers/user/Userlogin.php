<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlogin extends CI_Controller
{

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/userlogin_model');
		$this->load->model('user/group_model');
		// $this->load->model('hrd/karyawan_model');
		$this->load->helper('tanggalindonesia');
		$this->id_group = $this->session->userdata('id_group');
	}
	//Cek Hak Akses Submodule
	public function check($submodule, $crud)
	{
		$this->load->model('user/role_model');
		$t = $this->role_model->get_row(array(
			'tbl_role.id_group'     => $this->id_group,
			'tbl_submodule.url_sub' => $submodule
		));
		if ($t->$crud == 1) {
			base_url('user/userlogin');
		} else {
			redirect(base_url('dashboard/eror'));
			exit();
		}
	}
	//List Userlogin
	public function index()
	{
		//cek Hak Akses Userlogin
		$this->check('userlogin', 'r');

		$id_akses = $this->session->userdata('id_akses');
		$id_group = $this->session->userdata('id_group');

		if ($id_akses == 1 && $id_group == 1) {
			$group     = $this->group_model->listing();
		} else {
			$group     = $this->group_model->listing_by_id($id_group);
		}

		$userlogin = $this->userlogin_model->listing();

		$data = array(
			'sub_judul'  	  => 'Userlogin',
			'sub_judul1' 	  => 'list',
			'title'		  => 'User Login',
			'group'     	  =>  $group,
			'userlogin'		=> $userlogin,
			'isi'  	  	  => 'user/user_login/list'
		);
		$this->load->view('layout/wrapper', $data);
	}
	//Tambah Userlogin
	public function tambah()
	{
		//cek Hak Akses Userlogin
		$this->check('userlogin', 'c');
		$userlogin = $this->userlogin_model->listing();
		$id_akses = $this->session->userdata('id_akses');
		$id_group = $this->session->userdata('id_group');

		if ($id_akses == 1 && $id_group == 1) {
			$group     = $this->group_model->listing();
		} else {
			$group     = $this->group_model->listing_by_id($id_group);
		}

		$valid = $this->form_validation;
		$valid->set_rules('username', 'Username', 'is_unique[tbl_login.username]');
		if ($valid->run() == FALSE) {
			$data = array(
				'sub_judul'  => 'Userlogin',
				'sub_judul1' => 'Tambah',
				'title'		  => 'Tambah User Login',
				'userlogin'  =>  $userlogin,
				'group'	   =>  $group,

				'isi'  	   => 'user/user_login/tambah'
			);
			$this->load->view('layout/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(
				'username'     		 => $i->post('username'),
				'password'			 => password_hash($i->post('password'), PASSWORD_DEFAULT),
				'id_group'      		 => $i->post('id_group'),
				'id_akses'      		 => $i->post('id_akses'),
				'create_by'     		 => $this->session->userdata('username'),
				'create_date'   		 => date('Y-m-d H:i:s')
			);
			$this->userlogin_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Berhasil Di Tambah');
			redirect(base_url('user/userlogin'));
		}
	}
	//Edit Userlogin
	public function edit($id_login)
	{
		//cek Hak Akses Userlogin
		$this->check('userlogin', 'r');

		$id_akses = $this->session->userdata('id_akses');
		$id_group = $this->session->userdata('id_group');

		if ($id_akses == 1 && $id_group == 1) {
			$group     = $this->group_model->listing();
		} else {
			$group     = $this->group_model->listing_by_id($id_group);
		}
		$userlogin = $this->userlogin_model->detail($id_login);

		$valid     = $this->form_validation;
		$valid->set_rules(
			'username',
			'Username',
			'required',
			array('required' => 'ID harus diisi !')
		);
		if ($valid->run() == FALSE) {
			$data = array(
				'sub_judul'    => 'Userlogin',
				'sub_judul1'   => 'Edit',
				'title'		  => 'Edit User Login',
				'group'		 =>  $group,

				'userlogin'	 =>	 $userlogin,
				'isi'          => 'user/user_login/edit'
			);
			$this->load->view('layout/wrapper', $data);
		} else {
			$i = $this->input;
			if ($i->post('password') != '') {
				$data = array(
					'password'         => password_hash($i->post('password'), PASSWORD_DEFAULT),
					'username'		  => $i->post('username'),
					'id_group'   	  => $i->post('id_group'),
					'id_akses'   	  => $i->post('id_akses'),
					'change_by'        => $this->session->userdata('username'),
					'change_date'	  => date('Y-m-d H:i:s')
				);
				$this->userlogin_model->edit($data, $id_login);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
				redirect(base_url('user/userlogin'));
			} else {
				$data = array(
					'id_group'   	  => $i->post('id_group'),
					'username'		  => $i->post('username'),
					'id_akses'   	  => $i->post('id_akses'),
					'change_by'        => $this->session->userdata('username'),
					'change_date'	  => date('Y-m-d H:i:s')
				);
				$this->userlogin_model->edit($data, $id_login);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
				redirect(base_url('user/userlogin'));
			}
		}
	}
	//Hapus Userlogin
	public function hapus($id_login)
	{
		//cek Hak Akses Userlogin
		$this->check('userlogin', 'r');
		$data = array('id_login' => $id_login);
		$this->userlogin_model->hapus($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		redirect(base_url('user/userlogin'));
	}
}
