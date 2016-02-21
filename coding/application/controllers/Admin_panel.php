<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_panel extends CI_Controller
{
    public function index()
    {

    }

    public function user()
    {
        $data['activeMenu'] = 'admin_panel';
        $data['success_del'] = '';
        $data['notdel'] = '';

        $data['success_approved'] = '';
        $data['not_approved'] = '';

        $this->load->model('user');

        $data['allusers'] = $this->user->getSpecificColumnRec(false, ['is_admin' => 0]);

        if (filter_input_array(INPUT_POST)) {
            if(!isset($_POST['del']) && !isset($_POST['app'])){
                $this->load->view('admin_panel/user', $data);
            }
            if (isset($_POST['del'])) {
                $uid = $this->input->post('del');

                for ($i = 0; $i < sizeof($uid); $i++) {
                    $id = $uid[$i];
                    $successdell = $this->user->deleteRecord('uid', $id);
                    if (empty($successdell)) {
                        $data['notdel'] = 'yes';
                        $this->load->view('admin_panel/user', $data);
                        break;
                    }
                }
                if ($successdell) {
                    $data['allusers'] = $this->user->getSpecificColumnRec(false, ['is_admin' => 0]);
                    $data['success_del'] = 'yes';
                    $this->load->view('admin_panel/user', $data);
                }
            }
            if (isset($_POST['app'])) {
                $id = $this->input->post('app');
                $updating_data = array();
                $i = 0;
                foreach ($id as $k => $v){

                    $updating_data[$i]['uid'] = $id[$i];
                    $updating_data[$i]['is_admin_approved'] = 1;
                    $i++;
                }
                //echo '<tt><pre>'.var_export($updating_data,TRUE). '</tt></pre>'; exit;
                $insert_batch = $this->user->updateBatch($updating_data, 'uid');
                if ($insert_batch) {
                    $data['allusers'] = $this->user->getSpecificColumnRec(false, ['is_admin' => 0]);
                    $data['success_approved'] = 'yes';
                    $this->load->view('admin_panel/user', $data);
                }else{
                    $data['not_approved'] = 'yes';
                    $this->load->view('admin_panel/user', $data);
                }
            }

        } else {
            $this->load->view('admin_panel/user', $data);
        }

    }

    public function update_user_profile($user_id)
    {
        $data['pagename'] = '';
        $data['activeMenu'] = 'admin_panel';
        $data['join_rec'] = '';
        $data['single_rec'] = '';
        $data['user_privilege'] = '';
        $data['data_saved'] = '';
        $data['code_exist'] = '';
        $data['update_success'] = '';
        $data['cnic_exist'] = '';


        $this->load->model('user');
        $this->load->model('local_user');
        $this->load->model('kafeel');


        $user_record = $this->user->getRecord($user_id, 'uid', true);
        $data['single_rec'] = $user_record;

        if ($user_record[0]['is_local_user'] == 1) {
            $data['user_privilege'] = 'local_user';
            $local_table_rec = $this->local_user->getRecord($user_id, 'uid');
            if ($local_table_rec) {
                $data['join_rec'] = $this->user->sql_join_two(['users.uid' => $user_id], 'local_users', 'local_users.uid = users.uid');
            }
        } elseif ($user_record[0]['is_kafeel'] == 1) {
            $data['user_privilege'] = 'kafeel';
            $local_table_rec = $this->kafeel->getRecord($user_id, 'uid');
            if ($local_table_rec) {
                $data['join_rec'] = $this->user->sql_join_two(['users.uid' => $user_id], 'kafeels', 'kafeels.uid = users.uid');
            }
        } else {
            die('you are not allowed');
        }


        if (filter_input_array(INPUT_POST)) {

            $this->load->helper('security');
            if ($data['user_privilege'] == 'kafeel') {
                $rules = array(
                    array('field' => 'fname',
                        'label' => 'First Name',
                        'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'lname',
                        'label' => 'Last Name',
                        'rules' => 'max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'city',
                        'label' => 'City',
                        'rules' => 'max_length[32]|min_length[3]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'code',
                        'label' => 'Kafeel code',
                        'rules' => 'required|max_length[32]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'business',
                        'label' => 'Business Name',
                        'rules' => 'max_length[50]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'website',
                        'label' => 'Website',
                        'rules' => 'xss_clean|max_length[50]|encode_php_tags|trim|callback_url_check'
                    ),
                    array('field' => 'address',
                        'label' => 'First Name',
                        'rules' => 'max_length[255]|min_length[5]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'cell_no',
                        'label' => 'Mobile No',
                        'rules' => 'max_length[32]|min_length[10]|xss_clean|encode_php_tags|trim|numeric'
                    ),
                    array('field' => 'office_no',
                        'label' => 'Office No',
                        'rules' => 'max_length[32]|min_length[10]|xss_clean|encode_php_tags|trim|numeric'
                    ),
                    array('field' => 'comment',
                        'label' => 'Comment',
                        'rules' => 'max_length[255]|xss_clean|encode_php_tags|trim'
                    ),

                );
                //validation run
                $this->load->library('form_validation');
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {

                    $name = $this->input->post('fname', TRUE);
                    $lname = $this->input->post('lname', TRUE);
                    $city = $this->input->post('city', TRUE);
                    $business = $this->input->post('business', TRUE);
                    $website = $this->input->post('website', TRUE);
                    $address = $this->input->post('address', TRUE);
                    $cell_no = $this->input->post('cell_no', TRUE);
                    $office_no = $this->input->post('office_no', TRUE);
                    $comment = $this->input->post('comment', TRUE);
                    $kafeel_code = $this->input->post('code', TRUE);


                    $kafeel_code_check = $this->kafeel->getSpecificColumnRec(false, ['kafeel_code' => $kafeel_code]);

                    $this->load->model('kafeel');

                    if (empty($data['join_rec'])) {

                        //checking is kafeel code exist
                        if (empty($kafeel_code_check)) {
                            $this->kafeel->fname = $name;
                            $this->kafeel->lname = $lname;
                            $this->kafeel->city = $city;
                            $this->kafeel->kafeel_code = $kafeel_code;
                            $this->kafeel->business_name = $business;
                            $this->kafeel->date = time();
                            $this->kafeel->website = $website;
                            $this->kafeel->address = $address;
                            $this->kafeel->cell_number = $cell_no;
                            $this->kafeel->office_number = $office_no;
                            $this->kafeel->comment = $comment;
                            $this->kafeel->uid = $user_id;

                            $success = $this->kafeel->insertRecord();

                            if ($success) {
                                $data['data_saved'] = 'yes';
                                $this->load->view('admin_panel/update_user_profile', $data);
                            }

                        } else {
                            $data['code_exist'] = 'yes';
                            $this->load->view('admin_panel/update_user_profile', $data);
                        }


                    } else {

                        //echo '<pre>'.var_export($kafeel_code_check, true).'</pre>';
                        $updating_data = array(
                            'fname' => $name,
                            'lname' => $lname,
                            'city' => $city,
                            'business_name' => $business,
                            'website' => $website,
                            'address' => $address,
                            'cell_number' => $cell_no,
                            'office_number' => $office_no,
                            'comment' => $comment,
                            'kafeel_code' => $kafeel_code
                        );
                        if (empty($kafeel_code_check)) {

                            $success = $this->kafeel->updateRecord('uid', $updating_data, $user_id);
                            if ($success) {
                                $data['update_success'] = 'yes';
                                $this->load->view('admin_panel/update_user_profile', $data);
                            } else {
                                $this->load->view('admin_panel/update_user_profile', $data);
                            }
                        } elseif ($data['join_rec'][0]['kafeel_code'] == $kafeel_code) {

                            $success = $this->kafeel->updateRecord('uid', $updating_data, $user_id);
                            if ($success) {
                                $data['update_success'] = 'yes';
                                $this->load->view('admin_panel/update_user_profile', $data);
                            } else {
                                $this->load->view('admin_panel/update_user_profile', $data);
                            }
                        } else {
                            $data['code_exist'] = 'yes';
                            $this->load->view('admin_panel/update_user_profile', $data);
                        }

                    }


                } else {
                    //echo 'form not validate';
                    $this->load->view('admin_panel/update_user_profile', $data);
                }
            } elseif ($data['user_privilege'] == 'local_user') {

                $this->load->model('local_user');

                $rules = array(
                    array('field' => 'fname',
                        'label' => 'First Name',
                        'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'lname',
                        'label' => 'Last Name',
                        'rules' => 'max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'cell_no',
                        'label' => 'Mobile No',
                        'rules' => 'max_length[32]|min_length[10]|xss_clean|encode_php_tags|trim|numeric'
                    ),
                    array('field' => 'address',
                        'label' => 'First Name',
                        'rules' => 'max_length[255]|min_length[5]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'cnic',
                        'label' => 'CNIC No',
                        'rules' => 'required|xss_clean|encode_php_tags|trim|exact_length[13]|numeric'
                    ),
                    array('field' => 'experience',
                        'label' => 'Experience',
                        'rules' => 'max_length[255]|min_length[2]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'salary',
                        'label' => 'Salary',
                        'rules' => 'max_length[9]|min_length[2]|xss_clean|encode_php_tags|trim|numeric'
                    ),
                    array('field' => 'education',
                        'label' => 'Education',
                        'rules' => 'max_length[50]|min_length[2]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'reference',
                        'label' => 'Reference by',
                        'rules' => 'max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                    ),
                    array('field' => 'date_join',
                        'label' => 'Last Name',
                        'rules' => 'max_length[32]|xss_clean|encode_php_tags|trim'
                    )

                );

                //validation run
                $this->load->library('form_validation');
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {

                $fname = $this->input->post('fname', TRUE);
                $lname = $this->input->post('lname', TRUE);
                $address = $this->input->post('address', TRUE);
                $cell_no = $this->input->post('cell_no', TRUE);
                $cnic = $this->input->post('cnic', TRUE);
                $experience = $this->input->post('experience', TRUE);
                $salary = $this->input->post('salary', TRUE);
                $education = $this->input->post('education', TRUE);
                $reference_by = $this->input->post('reference', TRUE);
                $date_join = $this->input->post('date_join', TRUE);


                $cnic_check = $this->local_user->getSpecificColumnRec(false, ['cnic' => $cnic]);

                if (empty($data['join_rec'])) {

                    //checking is kafeel code exist
                    if (empty($cnic_check)) {

                        $this->local_user->fname = $fname;
                        $this->local_user->lname = $lname;
                        $this->local_user->address = $address;
                        $this->local_user->cell_no = $cell_no;
                        $this->local_user->cnic = $cnic;
                        $this->local_user->experience = $experience;
                        $this->local_user->salary = $salary;
                        $this->local_user->education = $education;
                        $this->local_user->reference_by = $reference_by;
                        $this->local_user->date_join = strtotime($date_join);
                        $this->local_user->uid = $user_id;

                        $success = $this->local_user->insertRecord();

                        if ($success) {
                            $data['data_saved'] = 'yes';
                            $this->load->view('admin_panel/update_user_profile', $data);
                        }

                    } else {
                        $data['code_exist'] = 'yes';
                        $this->load->view('admin_panel/update_user_profile', $data);
                    }


                } else {

                    //echo '<pre>'.var_export($cnic_check, true).'</pre>';exit;
                    $updating_data = array(
                        'fname' => $fname,
                        'lname' => $lname,
                        'address' => $address,
                        'cell_no' => $cell_no,
                        'cnic' => $cnic,
                        'experience' => $experience,
                        'salary' => $salary,
                        'education' => $education,
                        'reference_by' => $reference_by,
                        'date_join' => strtotime($date_join)
                    );
                    if (empty($cnic_check)) {

                        $success = $this->local_user->updateRecord('uid', $updating_data, $user_id);
                        if ($success) {
                            $data['update_success'] = 'yes';
                            $this->load->view('admin_panel/update_user_profile', $data);
                        } else {
                            $this->load->view('admin_panel/update_user_profile', $data);
                        }
                    } elseif ($data['join_rec'][0]['cnic'] == $cnic) {

                        $success = $this->local_user->updateRecord('uid', $updating_data, $user_id);
                        if ($success) {
                            $data['update_success'] = 'yes';
                            $this->load->view('admin_panel/update_user_profile', $data);
                        } else {
                            $this->load->view('admin_panel/update_user_profile', $data);
                        }
                    } else {
                        $data['code_exist'] = 'yes';
                        $this->load->view('admin_panel/update_user_profile', $data);
                    }

                }


            } else {
                //echo 'form not validate';
                $this->load->view('admin_panel/update_user_profile', $data);
            }


            }


        } else {
            $this->load->view('admin_panel/update_user_profile', $data);
        }


    }


    public function privileges(){
        $this->load->model('user');
        if (filter_input_array(INPUT_POST)) {

            $input_name = $this->input->post('name', true);
            $pk = $this->input->post('pk', true);

            if($input_name == 'privilege'){
                $index = $this->input->post('value', true);
                if($index == 'is_local_user'){
                    $updating_data = [$index => 1, 'is_kafeel' => 0];
                }elseif($index == 'is_kafeel'){
                    $updating_data = [$index => 1, 'is_local_user' => 0];
                }

                $success = $this->user->updateRecord('uid', $updating_data, $pk);
                if($success){
                    header("HTTP/1.1 200 OK");
                    echo 'updated';
                }else{
                    header('HTTP/1.0 400 Bad Request', true, 400);
                    echo 'Error! try again';
                }



                header("HTTP/1.1 200 OK");
                echo 'updated successfully';
            }elseif($input_name == 'delete_user'){

                $successdell = $this->user->deleteRecord('uid', $pk);
                if($successdell){
                    header("HTTP/1.1 200 OK");
                    echo 'delete';
                }else{
                    header('HTTP/1.0 400 Bad Request', true, 400);
                    echo 'Error! try again';
                }


            }

        }

    }

    public function add_local_user(){
        $data['pagename'] = 'add_kafeel';
        $data['activeMenu'] = 'admin_panel';

        $data['cnic_exist'] = '';
        $data['data_saved'] = '';
        $data['email_exist'] = '';
        $data['user_exist'] = '';

        if(filter_input_array(INPUT_POST)){


            $this->load->helper('security');
            $rules = array(
                array('field' => 'fname',
                    'label' => 'First Name',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'lname',
                    'label' => 'Last Name',
                    'rules' => 'max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'cell_no',
                    'label' => 'Mobile No',
                    'rules' => 'max_length[32]|min_length[10]|xss_clean|encode_php_tags|trim|numeric'
                ),
                array('field' => 'address',
                    'label' => 'First Name',
                    'rules' => 'max_length[255]|min_length[5]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'cnic',
                    'label' => 'CNIC No',
                    'rules' => 'required|xss_clean|encode_php_tags|trim|exact_length[13]|numeric'
                ),
                array('field' => 'experience',
                    'label' => 'Experience',
                    'rules' => 'max_length[255]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'salary',
                    'label' => 'Salary',
                    'rules' => 'max_length[9]|min_length[2]|xss_clean|encode_php_tags|trim|numeric'
                ),
                array('field' => 'education',
                    'label' => 'Education',
                    'rules' => 'max_length[50]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'reference',
                    'label' => 'Reference by',
                    'rules' => 'max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'date_join',
                    'label' => 'Last Name',
                    'rules' => 'max_length[32]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required|max_length[255]|min_length[6]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|max_length[255]|min_length[6]|xss_clean|encode_php_tags|trim'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email Address',
                    'rules' => 'valid_email|required|max_length[50]|xss_clean|encode_php_tags|trim'
                ),

            );
            //validation run
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if (!$this->form_validation->run($rules) == FALSE) {

                $email = $this->input->post('email', TRUE);
                $user_name = $this->input->post('username', TRUE);
                $this->load->model('user');
                $db_email = $this->user->getRecord($email, 'email');
                $db_username = $this->user->getRecord($user_name, 'username');
                if(empty($db_username) && empty($db_email)) {

                    $plain_pass = $this->input->post('password', true);
                    $options = [
                        'cost' => 10
                    ];
                    $hashedPassword = password_hash($plain_pass, PASSWORD_BCRYPT, $options);

                    $this->user->username = $user_name;
                    $this->user->email = $email;
                    $this->user->password = $hashedPassword;
                    $this->user->is_admin_approved = 1;
                    $this->user->is_local_user = 1;

                    $login_rec = $this->user->insertRecord();

                    if ($login_rec) {
                        $cnic_no = $this->input->post('cnic', TRUE);

                        $this->load->model('local_user');
                        $cnic_check = $this->local_user->getSpecificColumnRec(false, ['cnic' => $cnic_no]);

                        //checking is kafeel code exist
                        if (empty($cnic_check)) {
                            $date_join = $this->input->post('date_join', true);

                            $this->local_user->fname = $this->input->post('fname', TRUE);
                            $this->local_user->lname = $this->input->post('lname', TRUE);
                            $this->local_user->address = $this->input->post('address', TRUE);
                            $this->local_user->cell_no = $this->input->post('cell_no', TRUE);
                            $this->local_user->cnic = $this->input->post('cnic', TRUE);
                            $this->local_user->experience = $this->input->post('experience', TRUE);
                            $this->local_user->salary = $this->input->post('salary', TRUE);
                            $this->local_user->education = $this->input->post('education', TRUE);
                            $this->local_user->reference_by = $this->input->post('reference', TRUE);
                            $this->local_user->date_join = strtotime($date_join);
                            $this->local_user->uid = $login_rec;


                            $success = $this->local_user->insertRecord();

                            if ($success) {
                                $data['data_saved'] = 'yes';
                                $this->load->view('admin_panel/add_local_user', $data);
                            }
                        } else {
                            $data['cnic_exist'] = 'yes';
                            $this->load->view('admin_panel/add_local_user', $data);
                        }
                    }
                } else {
                    if($db_email){
                        $data['email_exist'] = 'yes';
                    }
                    if($db_username){
                        $data['user_exist'] = 'yes';
                    }
                    $this->load->view('admin_panel/add_local_user', $data);
                }

            } else {
                //echo 'form not validate';
                $this->load->view('admin_panel/add_local_user', $data);
            }
        } else {
            $this->load->view('admin_panel/add_local_user', $data);
        }
    }

    public function add_kafeel()
    {
        $data['activeMenu'] = 'admin_panel';
        $data['pagename'] = 'add_kafeel';

        $data['code_exist'] = '';
        $data['data_saved'] = '';
        $data['email_exist'] = '';
        $data['user_exist'] = '';

        if (filter_input_array(INPUT_POST)) {

            $this->load->helper('security');
            $rules = array(
                array('field' => 'fname',
                    'label' => 'First Name',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'lname',
                    'label' => 'Last Name',
                    'rules' => 'max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'city',
                    'label' => 'City',
                    'rules' => 'max_length[32]|min_length[3]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'code',
                    'label' => 'Kafeel code',
                    'rules' => 'required|max_length[32]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'business',
                    'label' => 'Business Name',
                    'rules' => 'max_length[50]|xss_clean|encode_php_tags|trim'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email Address',
                    'rules' => 'valid_email|required|max_length[50]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'website',
                    'label' => 'Website',
                    'rules' => 'xss_clean|max_length[50]|encode_php_tags|trim|callback_url_check'
                ),
                array('field' => 'address',
                    'label' => 'First Name',
                    'rules' => 'max_length[255]|min_length[5]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'cell_no',
                    'label' => 'Mobile No',
                    'rules' => 'max_length[32]|min_length[10]|xss_clean|encode_php_tags|trim|numeric'
                ),
                array('field' => 'office_no',
                    'label' => 'Office No',
                    'rules' => 'max_length[32]|min_length[10]|xss_clean|encode_php_tags|trim|numeric'
                ),
                array('field' => 'comment',
                    'label' => 'Comment',
                    'rules' => 'max_length[255]|xss_clean|encode_php_tags|trim'
                ),

                array('field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required|max_length[255]|min_length[6]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|max_length[255]|min_length[6]|xss_clean|encode_php_tags|trim'
                ),

            );
            //validation run
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if (!$this->form_validation->run($rules) == FALSE) {

                $email = $this->input->post('email', TRUE);
                $user_name = $this->input->post('username', TRUE);
                $this->load->model('user');
                $db_email = $this->user->getRecord($email, 'email');
                $db_username = $this->user->getRecord($user_name, 'username');
                if (empty($db_username) && empty($db_email)) {

                    $plain_pass = $this->input->post('password', true);
                    $options = [
                        'cost' => 10
                    ];
                    $hashedPassword = password_hash($plain_pass, PASSWORD_BCRYPT, $options);

                    $this->user->username = $user_name;
                    $this->user->email = $email;
                    $this->user->is_admin_approved = 1;
                    $this->user->is_kafeel = 1;
                    $this->user->password = $hashedPassword;

                    $login_rec = $this->user->insertRecord();

                    if ($login_rec) {

                        $kafeel_code = $this->input->post('code', TRUE);

                        $this->load->model('kafeel');
                        $kafeel_code_check = $this->kafeel->getSpecificColumnRec(false, ['kafeel_code' => $kafeel_code]);

                        //checking is kafeel code exist
                        if (empty($kafeel_code_check)) {
                            $this->kafeel->fname = $this->input->post('fname', TRUE);
                            $this->kafeel->lname = $this->input->post('lname', TRUE);
                            $this->kafeel->city = $this->input->post('city', TRUE);
                            $this->kafeel->kafeel_code = $kafeel_code;
                            $this->kafeel->business_name = $this->input->post('business', TRUE);
                            $this->kafeel->date = time();
                            $this->kafeel->website = $this->input->post('website', TRUE);
                            $this->kafeel->address = $this->input->post('address', TRUE);
                            $this->kafeel->cell_number = $this->input->post('cell_no', TRUE);
                            $this->kafeel->office_number = $this->input->post('office_no', TRUE);
                            $this->kafeel->comment = $this->input->post('comment', TRUE);
                            $this->kafeel->uid = $login_rec;


                            $success = $this->kafeel->insertRecord();

                            if ($success) {
                                $data['data_saved'] = 'yes';
                                $this->load->view('admin_panel/add_kafeel', $data);
                            }

                        } else {
                            $data['code_exist'] = 'yes';
                            $this->load->view('admin_panel/add_kafeel', $data);
                        }

                    }
                } else {
                    if ($db_email) {
                        $data['email_exist'] = 'yes';
                    }
                    if ($db_username) {
                        $data['user_exist'] = 'yes';
                    }
                    $this->load->view('admin_panel/add_kafeel', $data);
                }

            } else {
                //echo 'form not validate';
                $this->load->view('admin_panel/add_kafeel', $data);
            }
        } else {
            $this->load->view('admin_panel/add_kafeel', $data);
        }
    }


    public function url_check($url) {
        if ($url != '') {
            if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
                return TRUE;
            } else {
                $this->form_validation->set_message('url_check', 'The %s is not valid');
                return False;
            }
        } else {
            return true;
        }
    }

    public function add_visa(){
        $data['pagename'] = 'addvisa';
        $data['activeMenu'] = 'admin_panel';
        $data['success'] = '';
        $data['success_del'] = '';
        $data['notdel'] = '';

        $this->load->model('visa_history');
        $array = array(
            'visa_professions' => 'visa_professions.vp_id = visa_histories.visa_profession',
            'visa_categories' => 'visa_categories.vc_id = visa_histories.visa_category'
        );

        $data['visa_info'] = $this->visa_history->sql_join_multi(false, $array);
//echo '<pre>'.var_export($data['visa_info'], true).'</pre>';exit;

        if(filter_input_array(INPUT_POST)) {
            $this->load->model('visa_history');
            $this->load->helper('security');

            $kafeel_code = $this->input->post('add', true);
            $visa_dell = $this->input->post('vh_id', true);


            if(isset($kafeel_code)){



            $rules = array(array('field' => 'date', 'label' => 'Date', 'rules' => 'required|max_length[32]|min_length[6]|xss_clean|encode_php_tags|trim'), array('field' => 'kafeel_code', 'label' => 'Kafeel Name', 'rules' => 'required|max_length[9]|xss_clean|encode_php_tags|trim'), array('field' => 'visa_profession', 'label' => 'visa profession', 'rules' => 'max_length[9]|xss_clean|encode_php_tags|trim'), array('field' => 'no_of_visas', 'label' => 'Number of Visa', 'rules' => 'required|max_length[32]|xss_clean|encode_php_tags|trim'), array('field' => 'visa_price', 'label' => 'visa price', 'rules' => 'max_length[50]|xss_clean|encode_php_tags|trim'), array('field' => 'visa_category', 'label' => 'visa category', 'rules' => 'required|max_length[9]|xss_clean|encode_php_tags|trim'), array('field' => 'comment', 'label' => 'Comment', 'rules' => 'xss_clean|max_length[50]|encode_php_tags|trim')

            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if (!$this->form_validation->run($rules) == FALSE) {


                $this->visa_history->kafeel_code = $this->input->post('kafeel_code', true);
                $this->visa_history->visa_profession = $this->input->post('visa_profession', true);
                $this->visa_history->number_of_visa = $this->input->post('no_of_visas', true);
                $this->visa_history->visa_price = $this->input->post('visa_price', true);
                $this->visa_history->visa_category = $this->input->post('visa_category', true);
                $this->visa_history->vh_date = $this->input->post('date', true);
                $this->visa_history->vh_comment = $this->input->post('comment', true);

                $success = $this->visa_history->insertRecord();

                if ($success) {
                    $data['success'] = 'yes';
                    $this->load->view('admin_panel/add_newvisa', $data);
                }

            } else {
                $this->load->view('admin_panel/add_newvisa', $data);
            }

        }elseif(isset($visa_dell)){

                for ($i = 0; $i < sizeof($visa_dell); $i++) {
                    $id = $visa_dell[$i];
                    $successdell = $this->visa_history->deleteRecord('vh_id', $id);
                    if (empty($successdell)) {
                        $data['notdel'] = 'yes';
                        $this->load->view('admin_panel/add_newvisa', $data);
                        break;
                    }
                }
                if ($successdell) {
                    $data['visa_info'] = $this->visa_history->sql_join_multi(false, $array);
                    $data['success_del'] = 'yes';
                    $this->load->view('admin_panel/add_newvisa', $data);
                }
            }else{
                $this->load->view('admin_panel/add_newvisa' , $data);
            }
        }else{
            $this->load->view('admin_panel/add_newvisa' , $data);
        }
    }


    public function visa_profession(){
        $data['success_add'] = '';
        $data['success_del'] = '';
        $data['notdel'] = '';
        $data['activeMenu'] = 'admin_panel';
        $this->load->model('visa_profession');
        $data['visa_professions'] = $this->visa_profession->getRecord();
        if (filter_input_array(INPUT_POST)) {
            $profession_delete = $this->input->post('vp_id', true);
            $input_profession = $this->input->post('visa_profession', true);
            $pk = $this->input->post('pk', true);
            if(isset($input_profession)){
                $rules = array(
                    array('field' => 'visa_profession','label' => 'visa profession', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
                //validation run
                $this->load->library('form_validation');
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {
                    $this->visa_profession->vp_profession = $input_profession;
                    $success_insert = $this->visa_profession->insertRecord();
                    if($success_insert){
                        $data['success_add'] = 'yes';
                        $data['visa_professions'] = $this->visa_profession->getRecord();
                        $this->load->view('admin_panel/visa_profession', $data);
                    }
                }else{
                    $this->load->view('admin_panel/visa_profession', $data);
                }


            }elseif(isset($pk)){
                $rules = array(
                    array('field' => 'value','label' => 'Value', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
                //validation run
                $this->load->library('form_validation');
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {
                    $value = $this->input->post('value', true);
                    $success = $this->visa_profession->updateRecord('vp_id', ['vp_profession' => $value], $pk);
                    if($success){
                        header("HTTP/1.1 200 OK");
                        echo 'updated';
                    }
                }else{
                    header('HTTP/1.0 400 Bad Request', true, 400);
                    echo validation_errors();
                }
            }elseif(isset($profession_delete)){

                for ($i = 0; $i < sizeof($profession_delete); $i++) {
                    $id = $profession_delete[$i];
                    $successdell = $this->visa_profession->deleteRecord('vp_id', $id);
                    if (empty($successdell)) {
                        $data['notdel'] = 'yes';
                        $this->load->view('admin_panel/visa_profession', $data);
                        break;
                    }
                }
                if ($successdell) {
                    $data['visa_professions'] = $this->visa_profession->getRecord();
                    $data['success_del'] = 'yes';
                    $this->load->view('admin_panel/visa_profession', $data);
                }
            }else{
                $this->load->view('admin_panel/visa_profession', $data);
            }

        }else{
            $this->load->view('admin_panel/visa_profession', $data);
        }

    }


    public function visa_category(){
        $data['activeMenu'] = 'admin_panel';
        $data['success_add'] = '';
        $data['success_del'] = '';
        $data['notdel'] = '';
        $this->load->model('visa_category');
        $data['visa_categories'] = $this->visa_category->getRecord();
        if (filter_input_array(INPUT_POST)) {

            $add_category = $this->input->post('visa_category', true);
            $update_name = $this->input->post('name', true);
            $category_delete = $this->input->post('del_id', true);

            if(isset($add_category)){
                $rules = array(
                array('field' => 'visa_category','label' => 'visa category', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'),
                array('field' => 'description','label' => 'visa description', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
                //validation run
                $this->load->library('form_validation');
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {
                    $this->visa_category->vc_title = $add_category;
                    $this->visa_category->category_description = $this->input->post('description', true);

                    $success_insert = $this->visa_category->insertRecord();
                    if($success_insert){
                        $data['success_add'] = 'yes';
                        $data['visa_categories'] = $this->visa_category->getRecord();
                        $this->load->view('admin_panel/visa_category', $data);
                    }
                }else{
                    $this->load->view('admin_panel/visa_category', $data);
                }


            }elseif(isset($update_name)){

                if($update_name == 'update_title'){
                    $rules = array(
                        array('field' => 'value','label' => 'Value', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
                    //validation run
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules($rules);
                    $this->form_validation->set_error_delimiters('', '');

                    if (!$this->form_validation->run($rules) == FALSE) {
                        $value = $this->input->post('value', true);
                        $pk = $this->input->post('pk', true);
                        $success = $this->visa_category->updateRecord('vc_id', ['vc_title' => $value], $pk);
                        if($success){
                            header("HTTP/1.1 200 OK");
                            echo 'updated';
                        }
                    }else{
                        header('HTTP/1.0 400 Bad Request', true, 400);
                        echo validation_errors();
                    }
                }elseif($update_name == 'update_description'){
                    $rules = array(
                        array('field' => 'value','label' => 'Value', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
                    //validation run
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules($rules);
                    $this->form_validation->set_error_delimiters('', '');

                    if (!$this->form_validation->run($rules) == FALSE) {
                        $value = $this->input->post('value', true);
                        $pk = $this->input->post('pk', true);
                        $success = $this->visa_category->updateRecord('vc_id', ['category_description' => $value], $pk);
                        if($success){
                            header("HTTP/1.1 200 OK");
                            echo 'updated';
                        }
                    }else{
                        header('HTTP/1.0 400 Bad Request', true, 400);
                        echo validation_errors();
                    }
                }



            }elseif(isset($category_delete)){

                for ($i = 0; $i < sizeof($category_delete); $i++) {
                    $id = $category_delete[$i];
                    $successdell = $this->visa_category->deleteRecord('vc_id', $id);
                    if (empty($successdell)) {
                        $data['notdel'] = 'yes';
                        $this->load->view('admin_panel/visa_category', $data);
                        break;
                    }
                }
                if ($successdell) {
                    $data['visa_categories'] = $this->visa_category->getRecord();
                    $data['success_del'] = 'yes';
                    $this->load->view('admin_panel/visa_category', $data);
                }
            }else{
                $this->load->view('admin_panel/visa_category', $data);
            }

        }else{
            $this->load->view('admin_panel/visa_category', $data);
        }

    }

    public function iqama_profession(){
        $data['activeMenu'] = 'admin_panel';
        $data['success_add'] = '';
        $data['success_del'] = '';
        $data['notdel'] = '';
        $this->load->model('iqama_profession');
        $data['iqama_professions'] = $this->iqama_profession->getRecord();
        if (filter_input_array(INPUT_POST)) {
            $pk = $this->input->post('pk', true);
            $input_profession = $this->input->post('iqama_profession', true);
            $profession_delete = $this->input->post('ip_id', true);
            if(isset($input_profession)){
                $rules = array(
                    array('field' => 'iqama_profession','label' => 'Iqama profession', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
                //validation run
                $this->load->library('form_validation');
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {
                    $this->iqama_profession->ip_profession = $input_profession;
                    $success_insert = $this->iqama_profession->insertRecord();
                    if($success_insert){
                        $data['success_add'] = 'yes';
                        $data['iqama_professions'] = $this->iqama_profession->getRecord();
                        $this->load->view('admin_panel/iqama_profession', $data);
                    }
                }else{
                    $this->load->view('admin_panel/iqama_profession', $data);
                }


            }elseif(isset($pk)){
                $rules = array(
                    array('field' => 'value','label' => 'Value', 'rules' => 'required|max_length[255]|min_length[2]|encode_php_tags|trim'));
                //validation run
                $this->load->library('form_validation');
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('', '');

                if (!$this->form_validation->run($rules) == FALSE) {
                    $value = $this->input->post('value', true);
                    $success = $this->iqama_profession->updateRecord('ip_id', ['ip_profession' => $value], $pk);
                    if($success){
                        header("HTTP/1.1 200 OK");
                        echo 'updated';
                    }
                }else{
                    header('HTTP/1.0 400 Bad Request', true, 400);
                    echo validation_errors();
                }
            }elseif(isset($profession_delete)){

                for ($i = 0; $i < sizeof($profession_delete); $i++) {
                    $id = $profession_delete[$i];
                    $successdell = $this->iqama_profession->deleteRecord('ip_id', $id);
                    if (empty($successdell)) {
                        $data['notdel'] = 'yes';
                        $this->load->view('admin_panel/iqama_profession', $data);
                        break;
                    }
                }
                if ($successdell) {
                    $data['iqama_professions'] = $this->iqama_profession->getRecord();
                    $data['success_del'] = 'yes';
                    $this->load->view('admin_panel/iqama_profession', $data);
                }
            }else{
                $this->load->view('admin_panel/iqama_profession', $data);
            }

        }else{
            $this->load->view('admin_panel/iqama_profession', $data);
        }

    }

}

?>