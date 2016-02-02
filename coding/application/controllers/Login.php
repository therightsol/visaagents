<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index(){
        $data['pagename'] = 'Login';
        
      
        $data['userfound'] = '';
        
        $data['user_found'] = '';
        $data['email_found'] = '';
        $data['data_saved'] = '';
        $data['password_found'] = '';
        if ($_POST) {
            $this->load->helper('security');
            $rules = array(
                array(
                    'field' => 'email',
                    'label' => 'Email Address',
                    'rules' => 'required|max_length[32]|min_length[3]|xss_clean|encode_php_tags|trim'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required|max_length[18]|min_length[8]|trim'
                )
            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);

            if (!$this->form_validation->run() == FALSE) {
                // form is validate and we can now proceed further
                // 1) cheking username . 
                $un = strtolower($this->input->post('email', TRUE));

                $this->load->model('user');
                $db_email = $this->user->getRecord(FALSE, 'email');

                // checking is username found or not.
                $un_found = '';
                foreach ($db_email as $key => $columns) {
                    if ($columns['email'] == $un) {
                        $un_found = 'yes';
                    }
                }
                if ($un_found == '') {

                    $data['userfound'] = 'no';
                    $this->load->view('login', $data);
                } else {
                    // user found. show error. user already available.

                    $user_record = $this->user->getRecord($un, 'email');
                    // type casting, changing obj or std_class to array
                    $user_record = (array) $user_record;

                    //echo '<tt><pre>' . var_export($user_record, True) . '</tt></pre>';exit;

                    $dbPass = $user_record['password'];
                    $db_email = $user_record['email'];

                    $password = $this->input->post('password', True);




                    if ($un == $db_email && password_verify($password, $dbPass)) {


                        if ($user_record['is_admin'] == 1) {
                            $loggedInUser = 'admin';
                        } elseif ($user_record['is_local_user'] == 1) {
                            $loggedInUser = 'local user';
                        } elseif ($user_record['is_kafeel'] == 1) {
                            $loggedInUser = 'kafeel';
                        } 


                        $this->load->library('session');
                        /*
                         *  saving session. because session is secure and will save on server side.
                         * takes 2 parameters. Key and Value
                         */
                        $this->session->set_userdata('email', $un);
                        $this->session->set_userdata('username', $user_record['username']);
                        $this->session->set_userdata('loggedInUser', $loggedInUser);


                        redirect('Home');
                    } else {
                        // show error, password wrong
                        $data['password_found'] = 'no';
                        $this->load->view('Login', $data);
                        //echo 'password is wrong';
                    }
                }
            } else {

                //echo "show errors. form not validate";
                //echo validation_errors();
                $this->load->view('Login', $data);
            }
        } else {
            $this->load->view('Login', $data);
        }
    }
}

?>