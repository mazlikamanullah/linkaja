<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Task extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); //function helpper untuk membatasi akses user
    }

    public function index()
    {
        $data['title'] = "Task";

        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->db->select('task.*'); //mengambil semua task dari database
        $this->db->from('task');
        $data['task'] = $this->db->get()->result_array();

        $this->form_validation->set_rules('task_name', 'Task_name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin1/task/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data_to_db = [
                'task_name' => $this->input->post('task_name'),
            ];
            $this->db->insert('task', $data_to_db);
            $this->session->set_flashdata('add-success', 'Success');
            redirect('admin/task');
        }
    }
}
