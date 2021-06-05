<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in(); //function helpper untuk membatasi akses user
	}

	public function index()
	{
		$this->db->select('user_log.*, task.task_name, user.name');
		$this->db->from('user_log');
		$this->db->join('task', 'user_log.task_id = task.id_task');
		$this->db->join('user', 'user_log.id_user = user.id');
		$this->db->where('user_log.log_id', $this->session->userdata('log_id'));
		$data['user'] = $this->db->get()->row_array();

		$data['title'] = "Dashboard User";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user1/index', $data);
		$this->load->view('templates/footer');
	}

	public function monitoring()
	{
		$data['title'] = "Monitoring";

		$this->db->select('user_log.*, task.task_name, user.name');
		$this->db->from('user_log');
		$this->db->join('task', 'user_log.task_id = task.id_task');
		$this->db->join('user', 'user_log.id_user = user.id');
		$this->db->where('user_log.log_id', $this->session->userdata('log_id'));
		$data['user'] = $this->db->get()->row_array();


		$this->db->select('case.name, job.sub_case_id');
		$this->db->from('job');
		$this->db->join('case', 'case.id = job.case_id');
		$this->db->join('sub_case', 'sub_case.id = job.sub_case_id');
		$this->db->where('job.task_id', $this->session->userdata('task'));
		$data['job'] = $this->db->get()->result_array();

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user1/monitoring/index', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id_dashboard_task' => $this->input->post('task'),
				'dashboard_name' => $this->input->post('dashboard_name')
			];
			$this->db->insert('dashboard', $data);
			$this->session->set_flashdata('add-success', 'Success');
			redirect('admin/user/monitoring');
		}
	}
}
