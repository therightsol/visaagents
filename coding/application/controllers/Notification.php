<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
    public function index(){

            $this->load->model('worker');


        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }else{
            $last_15_days_time = time()-1296000;

            $record = $this->worker->getDateRange('iqama_expiry_date',$last_15_days_time, time());
            if($record){
                $array = array(
                    'users' => 'users.uid = kafeels.uid'
                );
                $this->load->model('kafeel');
                foreach($record as $key => $value){
                    $kafeel_code = $value->kafeel_code;echo '<br>';
                    $kafeel_info = $this->kafeel->sql_join_multi(['kafeels.kafeel_code' => $kafeel_code], $array);
                    $success = $this->email($kafeel_info[0]['fname'], $value->iqama_no, $value->iqama_issue_date, $value->iqama_expiry_date, $kafeel_info[0]['email']);
                    if($success){
                        $this->worker->updateRecord('kafeel_code', ['is_notification_send' => 1],$value->kafeel_code);
                    }
                }

            }
        }

    }

    private function email($kafeel_name, $iqama_no, $iqma_issue, $iqma_expiry ,$email) {

        $message = '<b> Dear '.$kafeel_name.' </b> your iqama is expiry is '. date('d M Y', $iqma_expiry).' and issue date is '.date('d M Y', $iqma_issue).' agains visa no '.$iqama_no;


        $this->load->model('send_email');
        $this->load->library('email');
        $success = $this->send_email->send($kafeel_name, $email, $message, 'Iqama Expiry.');
        return $success;

    }
}

?>
