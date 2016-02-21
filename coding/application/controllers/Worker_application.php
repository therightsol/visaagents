<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Worker_application extends CI_Controller {
    public function index(){

        $data['success_add'] = '';
        $data['success_del'] = '';
        $data['notdel'] = '';
        $data['activeMenu'] = 'worker_application';
        $this->load->model('track_application');
        $this->load->model('application_status');

        $data['application'] = $this->track_application->sql_join_left(false, 'application_statuses' ,'application_statuses.as_id = track_applications.status_id');

        //echo '<pre>'.var_export($data['application'], true).'</pre>';exit;

        if (filter_input_array(INPUT_POST)) {
            $application_delete = $this->input->post('as_id', true);
            $pk = $this->input->post('pk', true);
            $input_application = $this->input->post('application', true);
            $application_code = $this->input->post('application_code', true);

            if(isset($input_application) || isset($application_code)){
                $rules = array(
                    array('field' => 'application','label' => 'application status', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'),
                    array('field' => 'application_code','label' => 'CNIC', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
                //validation run
                $this->load->library('form_validation');
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {

                    $this->application_status->as_status = $input_application;
                    $status_id = $this->application_status->insertRecord();


                    if($status_id){
                        $success_update = $this->track_application->updateRecord('application_code', ['status_id' => $status_id], $application_code);
                        if($success_update){
                            $data['success_add'] = 'yes';
                            $data['application'] = $this->track_application->sql_join_left(false, 'application_statuses' ,'application_statuses.as_id = track_applications.status_id');
                            $this->load->view('worker_application', $data);
                        }
                    }

                }else{
                    $this->load->view('worker_application', $data);
                }


            }elseif(isset($pk)){
                $rules = array(
                    array('field' => 'value','label' => 'Value', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
                //validation run
                $this->load->library('form_validation');
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {
                    $value = $this->input->post('value', true);
                    $success = $this->application_status->updateRecord('as_id', ['as_status' => $value], $pk);
                    if($success){
                        header("HTTP/1.1 200 OK");
                        echo 'updated';
                    }
                }else{
                    header('HTTP/1.0 400 Bad Request', true, 400);
                    echo validation_errors();
                }
            }

            elseif(isset($application_delete)){

                for ($i = 0; $i < sizeof($application_delete); $i++) {
                    $id = $application_delete[$i];
                    $successdell = $this->track_application->deleteRecord('ta_id', $id);
                    $this->application_status->deleteRecord('as_id', $id);
                    if (empty($successdell)) {
                        $data['application'] = $this->track_application->sql_join_left(false, 'application_statuses' ,'application_statuses.as_id = track_applications.status_id');
                        $data['notdel'] = 'yes';
                        $this->load->view('worker_application', $data);
                        break;
                    }
                }
                if ($successdell) {
                    $data['application'] = $this->track_application->sql_join_left(false, 'application_statuses' ,'application_statuses.as_id = track_applications.status_id');
                    $data['success_del'] = 'yes';
                    $this->load->view('worker_application', $data);
                }
            }else{
                $this->load->view('worker_application', $data);
            }

        }else{
            $this->load->view('worker_application', $data);
        }

    }

}

?>
