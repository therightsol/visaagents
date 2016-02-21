<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Track_applications extends CI_Controller {
    public function index(){
        $data['pagename'] = '';
        $data['activeMenu'] = 'track_application';
        $data['record_found'] = '';

        if(filter_input_array(INPUT_POST)){

            $this->load->helper('security');
            $rules = array(
                array(
                    'field' => 'cnic',
                    'label' => 'CNIC Number',
                    'rules' => 'required|exact_length[13]|xss_clean|encode_php_tags|trim'
                )
            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if (!$this->form_validation->run() == FALSE) {
                $worker_cnic = $this->input->post('cnic', true);
                $this->load->model('track_application');

                $array = array(
                    'application_statuses' => 'application_statuses.as_id = track_applications.status_id'
                );

                $data['worker_info'] = $this->track_application->sql_join_multi(['track_applications.application_code' => $worker_cnic], $array);
//echo '<pre>'.var_export( $data['worker_info'], true).'</pre>';exit;
                if(!empty($data['worker_info'])){

                    $data['record_found'] = 'yes';
                    $this->load->view('track_application', $data);
                }else{
                    $data['record_found'] = 'no';
                    $this->load->view('track_application', $data);
                }
            }else{
                $this->load->view('track_application', $data);
            }

        }else{
            $this->load->view('track_application', $data);
        }

    }
}