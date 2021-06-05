<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub_cases extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in(); //function helpper untuk membatasi akses user
    }

    public function index()
    {
        $data['title'] = "Sub Case";

        //mengambil data user dari db dengan menseleksi dengan data id yangs sama dengan id yg di set
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->db->select('sub_case.*'); //mengambil semua case dari database
        $this->db->from('sub_case');
        $data['sub_case'] = $this->db->get()->result_array();

        //var_dump($data['sub_case']);
        //die;

        $this->form_validation->set_rules('sub_case_name', 'Sub_case_name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin1/sub_cases/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data_to_db = [
                'name' => $this->input->post('sub_case_name'),
            ];
            $this->db->insert('sub_case', $data_to_db);
            $this->session->set_flashdata('add-success', 'Success');
            redirect('admin/sub_cases');
        }
    }

    public function delete($id)
    {
        $this->db->delete('sub_case', ['id' => $id]);
        $this->session->set_flashdata('delete', 'Deleted');
        redirect('admin/sub_cases');
    }
}
