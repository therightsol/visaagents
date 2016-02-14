<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }
    
    public function index() {
        
        $data['page_link'] = 'reset_password';
        
        $data['email_not_verified'] = '';
        $data['not_found'] = '';
        $data['email_sent'] = ''; 
        
        
        // if post
        if(filter_input_array(INPUT_POST)){
            
            $rules = array(
                array(
                    'field' =>  'email',
                    'label' =>  'Email',
                    'rules' =>  'required|valid_email'
                )
            );
            
            $this->load->library("form_validation");
            $this->form_validation->set_rules($rules);
            
            if(! $this->form_validation->run() == FALSE){
             
                $email_address = $this->input->post('email', True);
                
                $this->load->model('user');
                
                $column = ['username', 'email', 'is_admin_approved'];
                
                $record = $this->user->getSpecificColumnRec($column, ['email' => $email_address]);
                
                if(!empty($record)){
                    // email_address is registered and record founds now continue.
                    
                    foreach ($record as $index => $column) {
                        $db_username = $column['username'];
                        $dbemail = $column['email'];
                        $already_verified = $column['is_admin_approved'];
                    }
                    
                    if ($email_address == $dbemail && $already_verified == '1'){
                        
                        
                        // heavily use for this model / library. So, loading here to access below.
                        $this->load->model('basic_functions');

                        // get current date/time 
                        $dateTime = $this->basic_functions->getDateTime('Y-m-d H:i:s');


                        // send email_address and load page.
                        $this->sendEmail_and_loadPage($db_username, $dbemail);
                    } else{
                        // if email_address is not db email_address then it is an error / logical mistake on time of registeration. Check / Debug Register controller.
                        
                        // So, i will just provide error for accounts who are not already verified.
                        $data['email_not_verified'] = 'yes';
                        $this->load->view('reset_password', $data);
                    }
                }else{
                    // email_address is not registered and so no record found.
                                        
                    $data['not_found'] = 'yes';
                    $this->load->view('reset_password', $data);
                }
            }else{
                // validation errors / form errors
                $this->load->view('reset_password', $data);
            }
        }else{
            $this->load->view('reset_password', $data);
        }
    }

    
    
    public function email_address() { 
        $data['page_link'] = 'show_password_form';

        if(isset($_GET['uid']))
            $base_enc_username_token = $_GET['uid'];
        else
            $base_enc_username_token = '';
        
        $data['uid_empty'] = '';
        $data['password_update'] = '';
        $data['showform'] = '';
        $data['user_notfound'] = '';
        $data['base_enc_username'] = '';
        $data['token_expired'] = '';
        $data['user_token_error'] = '';
                
        if ($base_enc_username_token != '') {
            $enc_username_token = base64_decode($base_enc_username_token); 
            
            $this->load->library('encrypt');
            $this->load->model('basic_functions');
            $key = $this->basic_functions->getEncryptionKey();

            $plain_username_token = $this->encrypt->decode($enc_username_token, $key);
            
            $is_find = strpos($plain_username_token, '|');
            //exit(var_export($find));
            
            if($is_find){
                // URL is still correct and validate
                $plain_username_token = explode('|', $plain_username_token);
                $plain_username = $plain_username_token[0];
                $timeToken = $plain_username_token[1];

                $this->load->model('user');
                
                // if at least 10 minutes remaining to expire time token.
                if($timeToken > (time()+600)){
                    
                    if ($plain_username != "") {
                        $db_all_usernames = $this->user->getRecord(FALSE, 'username', TRUE);
                        
                        //echo var_export($db_all_usernames);

                        $un_found = '';
                        foreach ($db_all_usernames as $user_name) {
                            //exit($user_name['user_name']);
                            if ($user_name['username'] == $plain_username)
                                $un_found = 'yes';
                        }

                        if ($un_found == 'yes') {
                             
                            $data['showform'] = 'yes';
                            
                            $this->session->set_userdata('username_for_reset', $plain_username); 
                            $this->load->view('reset_password', $data); 
                        } else {
                            // user not found
                            //echo "user not found";
                            //echo $user_name;
                            $data['user_notfound'] = 'yes';
                            $this->load->view('reset_password', $data);
                        }
                    } else {
                        // user not found because this is blank user_name
                        // echo " user is blank"; 
                        $data['uid_empty'] = 'yes';
                        $this->load->view('reset_password', $data);
                    }
                }else{
                    // time token has been expired.
                    //exit('time expired');
                    
                    $data['token_expired'] = 'yes';
                    $this->load->view('reset_password', $data);
                }
            }else{
                // URL has been changed / modified
                $data['user_token_error'] = 'yes';
                $this->load->view('reset_password', $data); 
            }
        } else {
            // uid is empty. uid is changed
            $data['base_enc_username'] = 'yes';
            $this->load->view('reset_password', $data);
            // echo "email_address not verified because of some internal error. ERROR #1001";
        }
    
    }
    
    
    public function update(){
        $data['page_link'] = 'show_password_form';
        
        // for compatibility to public function email_address(){...}
        $data['uid_empty'] = '';
        $data['password_update'] = '';
        $data['showform'] = '';
        $data['user_notfound'] = '';
        $data['base_enc_username'] = '';
        $data['token_expired'] = '';
        $data['user_token_error'] = '';
        
        if(filter_input_array(INPUT_POST)){
            /* @var $rules type array */
            $rules = [ 
                array(
                   'field'  =>  "password",
                   'label'  =>  'Password',
                   'rules'  =>  'required|max_length[45]|trim|min_length[8]|matches[conf_password]'
                ),
                array(
                   'field'  =>  "conf_password",
                   'label'  =>  'Confirm Password',
                   'rules'  =>  'required|trim|matches[password]'
                )              
            ];
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            
            if(!$this->form_validation->run($rules) == FALSE){
                // if both password matched and as per rule(s).
                $this->load->model('user'); 
                
                $user_name = $this->session->userdata('username_for_reset');
                    
                $record = $this->user->getSpecificColumnRec('email', ['username' => $user_name]);
                $email_address = '';
                foreach($record as $column){
                    $email_address = $column['email'];
                }
                
                //exit($email_address);
                
                $password = $this->input->post("password", True);

                // HASHING for passwords.
                $options = [
                    'cost' => 10
                ];
                //echo $options['salt'];
                $hashedPass = password_hash($password, PASSWORD_BCRYPT, $options);
                
                $reset_counter = $this->session->userdata('reset_counter');
                if(empty($reset_counter)){
                     $this->session->set_userdata('reset_counter', '1');
                     $counter = $this->session->userdata('reset_counter');
                     $this->session->set_userdata('reset_counter', '2');
                 }else {
                     redirect('login');
                 }
                
                if($counter == '1'){     
                    // now user can update.
                    
                    // sending email_address to user. for verification
                    $success = $this->send_resetConfirm_email($user_name, $email_address);

                    if($success){
                        //echo var_dump($success);
                        $data['password_update'] = 'yes'; 

                        // update record in to database

                        $columns = [
                           'password' => $hashedPass
                        ];

                        $this->user->updateRecord('username', $columns, $user_name);

                        $this->load->view('reset_password', $data);
                    }else{
                        echo 'Sorry! webserver is down OR problem to connect with internet. <br />Kindly refresh your page and continue.';
                    } 
                } 
            }else{
                // Show errors 
               //echo var_export(validation_errors());
               $data['showform'] = 'yes';
               $this->load->view('reset_password', $data);
            } 
        }else{
            echo 'Missing Code. <br /> No direct script access allowed';
        }
    }
    
    
    private function sendEmail_and_loadPage($db_username, $dbemail) {
        $data['page_link'] = 'reset_password';
        
        // Sending email_address
        $success = $this->emailTosend_reset_password_link($db_username, $dbemail);

        // Loading view Page and showing message.
        if ($success) {
            // email_address sent

            $data['email_sent'] = 'yes';
            $this->load->view('reset_password', $data);
        } else {
            echo 'error';
            // email_address not sent.
            // implement in future. create log and some other procedure why email_address is not sent.
        }
    }
    
    private function emailTosend_reset_password_link($user_name, $userEmail){
        /*
         * Send email_address is Pending
         *  i)  Confirmation of email_address account.
         *  ii) if email_address is confirmed by user by clicking on confirmation link then,
         *          -->     send email_address to Admin that a new user has been created. And set privilages for this user.
         */

        // Loading encryption library to encrypt user_name
        $this->load->library('encrypt');

        $this->load->model('basic_functions');
        $encryptionKey = $this->basic_functions->getEncryptionKey();
        
         
        $un_plus_timeToken = $user_name . '|' . (time() + 7200);
        
        //echo $un_plus_timeToken;
        
        
        $encrypteUserName = $this->encrypt->encode($un_plus_timeToken, $encryptionKey);

        $base64userName = base64_encode($encrypteUserName);   // changing user_name to base64 algo.
        //echo $encrypteUserName; exit();

        $message = '<b> Hi! ' . $user_name . ' </b><br /><br />'
                . 'Kindly click on below link to reset your account. <br />'
                . '<a href="' . base_url() . 'reset_password/email_address?uid=' . $base64userName . '" > Click here to reset password </a>'
                . '<br /><br /><br /><br /><br /><br /><br /><hr />'
                . '<strong> ADMIN - HVC </strong><br /><br />'
                . '<hr /> '
                . '<br /><strong class="text-info">Note: </strong>'
                . '<ul>'
                . '<li>If you did not request for reset password. Then your account might be at risk.</li>'
                . '<li>Kindly update your password to secure one asap.</li>'
                . '</ul>'
                . '<br /> <br />'
                . '<hr /><br />';
        
        //$this->load->helper('custom_functions');
        //$this->custom_functions->custom_sendemail();
        $this->load->library('email');
        $this->load->model('send_email');
        $success = $this->send_email->send($user_name, $userEmail, $message);
        return $success;

    } 
    
    private function send_resetConfirm_email($user_name, $userEmail){
        /*
         * Send email_address is Pending
         *  i)  Confirmation of email_address account.
         *  ii) if email_address is confirmed by user by clicking on confirmation link then,
         *          -->     send email_address to Admin that a new user has been created. And set privilages for this user.
         */

        
        $message = '<b> Welcome! ' . $user_name . ' </b><br /><br />'
                . 'Congratulation! Your password has been successfully updated.<br />'
                . '<br /><br /><br /><br /><br /><br /><br /><hr />'
                . '<strong> ADMIN - Online Documents Verification | TR Solutions </strong><br /><br />'
                . '<hr /> Thankyou for your time <br /> <br />';

        $this->load->library('email');
        $this->load->model('send_email');
        $success = $this->send_email->send($user_name, $userEmail, $message);
        return $success;

    }
     
}
