<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editable_local_user extends CI_Controller {
    public function index(){


    }

    public function update()
    {
        if (filter_input_array(INPUT_POST)) {

            $this->load->model('local_user');
            $this->load->library('form_validation');
            $this->load->helper('security');
            $input_name = $this->input->post('name', true);
            $pk = $this->input->post('pk', true);
            $value = $this->input->post('value', true);

            if($input_name == 'phone_no'){
                $rules = array(
                    array('field' => 'value',
                        'label' => 'Phone No',
                        'rules' => 'required|max_length[32]|min_length[10]|xss_clean|encode_php_tags|trim|numeric'
                    )
                );

                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {

                    $success = $this->local_user->updateRecord('uid', ['cell_no' => $value], $pk);
                    if($success){
                        header("HTTP/1.1 200 OK");
                    }else{
                        header('HTTP/1.0 400 Bad Request', true, 400);
                        echo 'Unknown Erro';
                    }
                }else{
                    header('HTTP/1.0 400 Bad Request', true, 400);
                    echo validation_errors();
                }


            }elseif($input_name == 'address'){
                $rules = array(
                    array('field' => 'value',
                        'label' => 'Address',
                        'rules' => 'required|max_length[255]|min_length[5]|xss_clean|encode_php_tags|trim'
                    )
                );
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {
                    $success = $this->local_user->updateRecord('uid', ['address' => $value], $pk);
                    if($success){
                        header("HTTP/1.1 200 OK");
                    }else{
                        header('HTTP/1.0 400 Bad Request', true, 400);
                        echo 'Unknown Erro';
                    }
                }else{
                    header('HTTP/1.0 400 Bad Request', true, 400);
                    echo validation_errors();
                }
            }


        }
    }

}