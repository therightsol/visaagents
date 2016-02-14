<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    public function index(){

    }

    public function visa_profession (){

        $this->load->model('visa_profession');
        $user_input = $this->input->post('profession', true);
        if(isset($user_input)){

            $record = $this->visa_profession->getRecord_like(false, 10, 'vp_profession', $user_input);

            if(count($record) > 0){
                foreach ($record as $key => $value) {
                    $data[] = array('id' => $value['vp_id'], 'text' => $value['vp_profession']);
                }
            } else {
                $data[] = array('id' => '0', 'text' => 'No Products Found');
            }
            echo json_encode($data);
        }
    }

    public function iqama_profession (){

        $this->load->model('iqama_profession');
        $user_input = $this->input->post('profession', true);
        if(isset($user_input)){

            $record = $this->iqama_profession->getRecord_like(false, 10, 'ip_profession', $user_input);

            if(count($record) > 0){
                foreach ($record as $key => $value) {
                    $data[] = array('id' => $value['ip_id'], 'text' => $value['ip_profession']);
                }
            } else {
                $data[] = array('id' => '0', 'text' => 'No Profession Found');
            }
            echo json_encode($data);
        }
    }

    public function visa_category (){

        $this->load->model('visa_category');
        $user_input = $this->input->post('category', true);
        if(isset($user_input)){

            $record = $this->visa_category->getRecord_like(false, 10, 'vc_title', $user_input);

            if(count($record) > 0){
                foreach ($record as $key => $value) {
                    $data[] = array('id' => $value['vc_id'], 'text' => $value['vc_title']);
                }
            } else {
                $data[] = array('id' => '0', 'text' => 'No Category Found');
            }
            echo json_encode($data);
        }
    }

    public function kafeel_code (){

        $this->load->model('kafeel');
        $user_input = $this->input->post('kafeel_code', true);
        if(isset($user_input)){

            $record = $this->kafeel->getRecord_like(false, 10, 'kafeel_code', $user_input);
            if(count($record) > 0){
                foreach ($record as $key => $value) {
                    $data[] = array('id' => $value['kafeel_code'], 'text' => $value['kafeel_code']);
                }
            } else {
                $data[] = array('id' => '0', 'text' => 'No Kafeel code Found');
            }
            echo json_encode($data);
        }
    }
}

?>