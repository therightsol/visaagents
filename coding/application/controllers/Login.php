<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $data['activeMenu'] = 'login';
        $data['pagename'] = 'Login';
        $data['is_admin_approved'] = '';
        $data['record_found'] = '';

        if(filter_input_array(INPUT_POST)){
            $this->load->helper('security');
            $rules = array(
                array(
                    'field' => 'email',
                    'label' => 'Email Address',
                    'rules' => 'required|valid_email|xss_clean|encode_php_tags|trim'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required|max_length[18]|min_length[8]|trim'
                )
            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');
            if (!$this->form_validation->run() == FALSE) {
                // form is validate and we can now proceed further
                // 1) cheking email address found .
                $input_email = strtolower($this->input->post('email', TRUE));

                $this->load->model('user');
                $db_record = $this->user->getSpecificColumnRec(false, ['email' => $input_email]);
                //echo '<pre>'.var_export($db_record, true).'</pre>';exit;
                // checking is email found or not and user is active.
                $email_found = '';
                if($db_record){

                    if($db_record[0]['is_admin_approved'] != 1){

                        $data['is_admin_approved'] = 'no';

                    }else{
                        $email_found = 'yes';
                    }
                }  else {
                    $data['record_found'] = 'email_not_found';
                }

                if ($email_found == '') {


                    $this->load->view('login', $data);
                } else {
                    // user found. show error. user already available.

                    $dbPass = $db_record[0]['password'];
                    $db_email = $db_record[0]['email'];

                    $input_password = $this->input->post('password', True);

                    if ($input_email == $db_email && password_verify($input_password, $dbPass)) {


                        if ($db_record[0]['is_admin'] == 1) {
                            $loggedInUser = 'admin';
                        } elseif ($db_record[0]['is_local_user'] == 1) {
                            $loggedInUser = 'local_user';
                        } elseif ($db_record[0]['is_kafeel'] == 1) {
                            $loggedInUser = 'kafeel';
                        }

                        $this->load->library('session');
                        /*
                         *  saving session. because session is secure and will save on server side.
                         * takes 2 parameters. Key and Value
                         */
                        $this->session->set_userdata('email', $input_email);
                        $this->session->set_userdata('loggedInUser', $loggedInUser);


                        redirect('Home');
                    } else {
                        $data['record_found'] = 'password_not_match';
                        $this->load->view('login', $data);
                        //echo 'password is wrong';
                    }
                }
            } else {

                //echo "show errors. form not validate";
                //echo validation_errors();
                $this->load->view('login', $data);
            }
        } else {
            $this->load->view('login', $data);
        }
    }

}
