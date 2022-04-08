<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	//Index Dashboard
	public function index()
	{
		$test = $this->session->userdata('id_group');
		//print_r($test); exit();
		$data = array(
			'sub_judul'  => 'Dashboard',
			'sub_judul1' => 'list',
			'isi'  	   => 'dashboard/list'
		);
		$this->load->view('layout/wrapper', $data);
	}
	public function getEvents()
	{
		$id_login = $this->session->userdata('id');
		$result = $this->Calendar_model->getEvents($id_login);
		echo json_encode($result);
	}
	/*Add new event */
	public function addEvent()
	{
		$result = $this->Calendar_model->addEvent();
		echo $result;
	}
	/*Update Event */
	public function updateEvent()
	{
		$result = $this->Calendar_model->updateEvent();
		echo $result;
	}
	/*Delete Event*/
	public function deleteEvent()
	{
		$result = $this->Calendar_model->deleteEvent();
		echo $result;
	}
	public function dragUpdateEvent()
	{

		$result = $this->Calendar_model->dragUpdateEvent();
		echo $result;
	}
	public function eror()
	{
		$data = array(
			'sub_judul'    => 'Dashboard',
			'sub_judul1'   => 'Error',
			'isi'			 => 'dashboard/error'
		);
		$this->load->view('layout/wrapper', $data);
	}
}
