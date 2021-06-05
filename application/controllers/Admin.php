<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in(); //function helpper untuk membatasi akses user
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin1/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function user()
	{
		$data['title'] = "User";
		$data['users'] = $this->db->get('user')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/user/index', $data);
		$this->load->view('templates/footer');
	}

	public function userAdd()
	{
		$data['title'] = "Add New User";
		$data['users'] = $this->db->get('user')->result_array();
		$data['operation'] = $this->db->get('operation')->result_array();

		$this->form_validation->set_rules('level', 'Level', 'required|trim');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'this email has already registered!'
		]);
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/user/add', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'level'				=> $this->input->post('level'),
				'name'				=> $this->input->post('name'),
				'gender'			=> $this->input->post('gender'),
				'email'				=> $this->input->post('email', true),
				'password'			=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'is_active'			=> 1
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('add-success', 'Success');
			redirect('admin/user');
		}
	}
}
