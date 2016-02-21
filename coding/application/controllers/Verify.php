<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {

    public function index() {

    }

    
    
    public function ve() {
        
        $data['activeMenu'] = 'verify';

        $base_enc_username = $_GET['uid'];
        $data['uid_empty'] = '';
        $data['user_notfound'] = '';
        $data['email_verify'] = '';
        $data['base_enc_username'] = '';
        $data['email_alredy_verified'] = '';
        
        
        
        if ($base_enc_username != '') {
            $enc_username = base64_decode($base_enc_username);


            $this->load->library('encrypt');
            $this->load->model('basic_functions');
            $key = $this->basic_functions->getEncryptionKey();

            $plain_username = $this->encrypt->decode($enc_username, $key);

            //echo $plain_username;
            // updateRecord($columnName = 'customerID', $data='' , $update_where='', $nameOfUpdatingColumn=False)
            $this->load->model('user');

            if ($plain_username != "") {
                $db_all_usernames = $this->user->getRecord(FALSE, 'username', TRUE);

                //echo var_export($db_all_usernames);

                $un_found = '';
                foreach ($db_all_usernames as $username) {
                    //exit($username['userName']);
                    if ($username['username'] == $plain_username)
                        $un_found = 'yes';
                }

                if ($un_found == 'yes') {
                    // update
                    $updateData = array(
                        'is_email_verified' => 1
                    );

                    $isSuccess = $this->user->updateRecord('username', $updateData, $plain_username);

                    if ($isSuccess) {
                        // send email to Admin
                        $this->email($plain_username);
                        $data['email_verify'] = 'yes';
                        $this->load->view('verify', $data);
                        //   }
                        }else{
                       $db_userRecord = $this->user->getRecord($plain_username, 'username');
                        //echo '<tt><pre>' . var_export($db_userRecord,TRUE) . '</tt></pre>';
                        if ($db_userRecord != ''){
                         foreach($db_userRecord as $column => $value){
                        if($column == 'is_email_verified')
                            $emailverify = $value;
                         }
                        if ($emailverify == 1){
                            $data['email_alredy_verified'] = 'yes';
                            $this->load->view('verify', $data);
                        }
                        }
                        // some DB related issue. Every thing is fine but DB related error.   
                    }
                        
                } else {
                    // user not found
                    //echo "user not found";
                    //echo $username;
                    $data['user_notfound'] = 'yes';
                    $this->load->view('verify', $data);
                }
            } else {
                // user not found because this is blank username
                // echo " user is blank";
                $data['uid_empty'] = 'yes';
                $this->load->view('verify', $data);
            }
        } else {
            // uid is empty. uid is changed
            $data['base_enc_username'] = 'yes';
            $this->load->view('verify', $data);
            // echo "Email not verified because of some internal error. ERROR #1001";
        }
    
    }


    private function email($user_name) {
        $this->load->model('basic_functions');
        $this->load->library('encrypt');
        $encryptionKey = $this->basic_functions->getEncryptionKey();

        $encrypteUserName = $this->encrypt->encode($user_name, $encryptionKey);

        $encrypteUserName = base64_encode($encrypteUserName);   // changing username to base64 algo.
        //echo $encrypteUserName; exit();

        $message = '<b> New account has been registered on  ' . base_url() . ' </b><br /><br />'
            . 'Kindly activate (set privillages) for new user. <br /> <br />'
            . '<a href="' . base_url() . 'activate/via_link?uid=' . $encrypteUserName . '" > Click here to activate </a>'
            . '<br /><br /><br /><br /><br /><br /><br /><hr />'
            . '<strong>ADMIN - OLS </strong><br /><br />'
            . '<hr /> Thanks to choose our company <br /> <br />';


        $this->load->model('send_email');
        $this->load->library('email');
        $success = $this->send_email->send($user_name, false, $message, '[Activation Pending] New account has been registered.');
        return $success;

    }

}
