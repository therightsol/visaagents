<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function index(){
        $data['pagename'] = '';
        $data['activeMenu'] = 'profile';
        $this->load->model('user');
        $session_email = $this->session->userdata('email');
        $session_id = $this->session->userdata('userid');
        $loggedInUser = $this->session->userdata('loggedInUser');

        if($loggedInUser == 'local_user'){
            $data['profile_record'] = $this->user->sql_join_two(['email' => $session_email],'local_users' ,'local_users.uid = users.uid');
        }elseif($loggedInUser == 'kafeel'){
            $this->load->model('visa_history');
            $this->load->model('worker');


            $data['profile_record'] = $this->user->sql_join_two(['users.email' => $session_email],'kafeels' ,'kafeels.uid = users.uid');
            $kafeel_code = $data['profile_record'][0]['kafeel_code'];
            $array = array(
                'visa_categories' => 'visa_categories.vc_id = visa_histories.visa_category',
                'visa_professions' => 'visa_professions.vp_id = visa_histories.visa_profession',
            );

            $data['visa_history'] = $this->visa_history->sql_join_multi(['visa_histories.kafeel_code' => $kafeel_code], $array);

            $data['iqama_expiry'] = $this->worker->getSpecificColumnRec(['visa_no', 'iqama_no', 'iqama_issue_date', 'iqama_expiry_date'], ['kafeel_code' => $kafeel_code]);
            //echo '<pre>'.var_export($data['iqama_expiry'], true).'</pre>';exit;
        }else{
            die('you are not allowed');
        }

        //echo '<pre>'.var_export($data['profile_record'], true).'</pre>';exit;
        $this->load->view('profile' , $data);
    }
}