<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Group extends CI_Controller
{
	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/group_model');
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
			base_url('user/group');
		} else {
			redirect(base_url('dashboard/eror'));
			exit();
		}
	}
	//List Group & Tambah Group
	public function index()
	{
		//Cek Hak Akses Submodule
		$this->check('group', 'r');
		$group = $this->group_model->listing();

		$valid = $this->form_validation;
		$valid->set_rules('nama_group', 'Nama Group', 'is_unique[tbl_group.nama_group]');
		if ($valid->run() == FALSE) {

			$data = array(
				'sub_judul'  => 'Group',
				'sub_judul1' => 'list',
				'title'		=> 'User Group',

				'group'	   =>  $group,
				'isi'  	   => 'user/group/list'
			);

			$this->load->view('layout/wrapper', $data);
		} else {

			$i = $this->input;
			$data = array(
				'keterangan'   => $i->post('keterangan'),
				'nama_group'   => $i->post('nama_group'),
				'create_by'    => $this->session->userdata('username'),
				'create_date'  => date('Y-m-d H:i:s')
			);
			$this->group_model->tambah($data);

			$this->session->set_flashdata('sukses', 'Data Berhasil Di Tambah');
			redirect(base_url('user/group'));
		}
	}
	//Edit Group
	public function edit($id_group)
	{
		$this->check('group', 'u');
		$group = $this->group_model->detail($id_group);

		$valid = $this->form_validation;
		$valid->set_rules('create_date', 'Nama Group', 'is_unique[tbl_group.create_date]');
		if ($valid->run() == FALSE) {
			$data = array(
				'sub_judul'    => 'Group',
				'sub_judul1'   => 'Edit',
				'title'		=> 'Edit Group',
				'group'	 	 =>	 $group,
				'isi'          => 'user/group/edit'
			);
			$this->load->view('layout/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(
				'keterangan'   => $i->post('keterangan'),
				'nama_group'   => $i->post('nama_group'),
				'change_date'  => date('Y-m-d H:i:s'),
				'change_by'    => $this->session->userdata('username')
			);
			$this->group_model->edit($data, $id_group);
			$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
			redirect(base_url('user/group'));
		}
	}
	//Hapus Group
	public function hapus($id_group)
	{
		$this->check('group', 'd');
		$id_group = $this->uri->segment(4);
		$cek      = $this->userlogin_model->cek_group($id_group);
		if (count($cek) == "") {
			$data2 = array('id_group' => $id_group);
			$this->group_model->delete_role($data2);
			$this->role_model->delete_role($data2);
			$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
			redirect(base_url('user/group'));
		} else {
			$this->session->set_flashdata('error', 'Tidak Dapat Dihapus, Data Sudah ada di transaksi Di User Login');
			redirect(base_url('user/group'));
		}
	}
}
