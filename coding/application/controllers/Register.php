<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function index(){
        $data['pagename'] = 'Register';
        $data['activeMenu'] = 'register';
        
        
        $data['user_found'] = '';
        $data['email_found'] = '';
        $data['data_saved'] = '';

        if(filter_input_array(INPUT_POST)){

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
                    $this->email($userName, $email);
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


    private function email($user_name, $userEmail) {
        $this->load->model('basic_functions');
        $this->load->library('encrypt');
        $encryptionKey = $this->basic_functions->getEncryptionKey();

        $encrypteUserName = $this->encrypt->encode($user_name, $encryptionKey);

        $encrypteUserName = base64_encode($encrypteUserName);   // changing username to base64 algo.
        //echo $encrypteUserName; exit();

        $message = '<b> Welcome! ' . $user_name . ' </b><br /><br />'
            . 'You are successfully registered. Kindly click on below link to activate your account. <br />'
            . '<a href="' . base_url() . 'verify/ve?uid=' . $encrypteUserName . '" > Click here to activate </a>'
            . '<br /><br /><br /><br /><br /><br /><br /><hr />'
            . '<strong> </strong><br /><br />'
            . '<hr /> Thank you to choose our company <br /> <br />';


        $this->load->model('send_email');
        $this->load->library('email');
        $success = $this->send_email->send($user_name, $userEmail, $message, 'Verify Email');
        return $success;

    }

}
