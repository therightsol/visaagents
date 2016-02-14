<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editable_admin extends CI_Controller
{
    public function index()
    {
        $data['activeMenu'] = 'admin_panel';
        $this->load->view('admin_panel/user');
    }


    public function update($model, $table_id)
    {
        $this->load->library('form_validation');
        $this->load->helper('security');


        if (filter_input_array(INPUT_POST)) {

            $this->load->model($model);
            $pk = $this->input->post('pk', true);
            $where_value = $this->input->post('value', true);
            $where_column = $this->input->post('name', true);

            $rules = array(
                array('field' => 'value', 'label' => 'Value', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
            //validation run

            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if (!$this->form_validation->run($rules) == FALSE) {

                $success = $this->$model->updateRecord($table_id, [$where_column => $where_value], $pk);
                if ($success) {
                    header("HTTP/1.1 200 OK");
                    echo 'updated';
                }
            } else {
                header('HTTP/1.0 400 Bad Request', true, 400);
                echo validation_errors();
            }
        }
    }
}