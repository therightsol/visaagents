<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function index(){
        $data['pagename'] = 'Register';
        
        
        
        $data['user_found'] = '';
        $data['email_found'] = '';
        $data['data_saved'] = '';

        if ($_POST) {

            $this->load->helper('security');
            $rules = array(
                array(
                    'field' => 'username',
                    'label' => 'User Name',
                    'rules' => 'required|max_length[32]|min_length[5]|xss_clean|encode_php_tags|trim|alpha_numeric'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email Address',
                    'rules' => 'valid_email|required|max_length[32]|min_length[3]|xss_clean|encode_php_tags|trim'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required|max_length[18]|min_length[8]|matches[re-password]|xss_clean|encode_php_tags|trim'
                ),
                array(
                    'field' => 're-password',
                    'label' => 'Retype Password',
                    'rules' => 'required|xss_clean|encode_php_tags|trim'
                )
               
            );
            //validation run
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');
          // echo var_dump($rules);
              //   exit();
            if (!$this->form_validation->run($rules) == FALSE) {

                $userName = $this->input->post('username', TRUE);
                $email = $this->input->post('email', TRUE);
                $plain_pass = $this->input->post('password', TRUE);
               
                         

                //2) Hashing user password
                // HASHING for passwords.
                $options = [
                    'cost' => 10
                ];
                $hashedPassword = password_hash($plain_pass, PASSWORD_BCRYPT, $options);
                 // echo var_dump($hashedPassword);
                // exit();
                $this->load->model('user');

                $column = array('username', 'email');
                $recordname = $this->user->getRecord(FALSE, $column, True);
                //checking is user allready exist
                $un_found = '';
                $email_found = '';
                foreach ($recordname as $key => $value) {
                    if ($value['username'] == $userName) {
                        $un_found = 'yes';
                    }
                    if ($value['email'] == $email) {
                        $email_found = 'yes';
                    }
                }

                if ($un_found == '' and $email_found == '') {



                    $this->user->username = $userName;
                    $this->user->email = $email;
                    $this->user->password = $hashedPassword;
                    


                    $success = $this->user->insertRecord();

                    //sending email for validation;
                            redirect('Login');
                    if ($success) {
                        // echo var_dump($success);
                        $data['data_saved'] = 'yes';
                        $this->load->view('reg_form', $data);
                    }
                } else {
                    if ($un_found == 'yes') {
                        $data['user_found'] = 'yes';
                    }
                    if ($email_found == 'yes') {
                        $data['email_found'] = 'yes';
                    }
                    $this->load->view('reg_form', $data);
                }
            } else {
                //echo 'form not validate';
                $this->load->view('reg_form', $data);
            }
        } else {
            $this->load->view('reg_form', $data);
        }
    }
     private function email() {
        
        $this->config->load('email');
        $this->load->model('general');
        $record = $this->general->getRecord('email_config', 'title', true);
        
        
        foreach($record as $key => $value){
            $this->config->set_item($value['config'], $value['value']);
        }
        
        $send_email = $this->general->getRecord('send_email', 'title', true);
        //echo '<tt><pre>'.var_export($send_email, true).'</tt></pre>';exit;
        $type = '';
        foreach ($send_email as $k => $v){
            if($v['config'] == 'from'){
                $from = $v['value'];
            }
            if($v['config'] == 'reply_to'){
                $reply_to = $v['value'];
            }
            if($v['config'] == 'subject'){
                $subject = $v['value'];
            }
            if($v['config'] == 'type'){
                $type = $v['value'];
            }
        }
        //echo '<tt><pre>'.var_export($send_email, true).'</tt></pre>';exit;
        
        $this->load->library('email');
        
        $success = $this->email->from($from)
                ->reply_to($reply_to)
                ->to('its.skp8@gmail.com')
                ->subject($subject)
                ->message('test message')
                ->set_mailtype($type)
                ->send();
        echo $success;
    }
}
