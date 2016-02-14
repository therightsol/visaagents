<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function index(){
        $data['pagename'] = '';
        $data['activeMenu'] = 'profile';
        $this->load->model('user');
        $session_email = $this->session->userdata('email');
        $loggedInUser = $this->session->userdata('loggedInUser');

        if($loggedInUser == 'local_user'){
            $data['profile_record'] = $this->user->sql_join_two(['email' => $session_email],'local_users' ,'local_users.uid = users.uid');
        }elseif($loggedInUser == 'kafeel'){
            $data['profile_record'] = $this->user->sql_join_two(['users.email' => $session_email],'kafeels' ,'kafeels.uid = users.uid');
        }else{
            die('you are not allowed');
        }


        //echo '<pre>'.var_export($data['profile_record'], true).'</pre>';exit;
        $this->load->view('profile' , $data);
    }
}