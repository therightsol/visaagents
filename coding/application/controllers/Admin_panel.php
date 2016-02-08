<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_panel extends CI_Controller
{
    public function index()
    {
        $data['activeMenu'] = 'admin_panel';
        $this->load->view('admin_panel/user');
    }

    public function user()
    {
        $data['activeMenu'] = 'admin_panel';
        $data['success_del'] = '';
        $data['notdel'] = '';

        $data['success_approved'] = '';
        $data['not_approved'] = '';

        $this->load->model('user');

        $data['allusers'] = $this->user->getRecord();

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
                    $data['allusers'] = $this->user->getSpecificColumnRec(false, ['is_admin_approved' => 0]);
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
                    $data['allusers'] = $this->user->getSpecificColumnRec(false, ['is_admin_approved' => 0]);
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

    public function add_kafeel(){
        $data['activeMenu'] = 'admin_panel';
        $data['pagename'] = 'add_kafeel';

        $data['code_exist'] = '';
        $data['data_saved'] = '';

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

            );
            //validation run
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if (!$this->form_validation->run($rules) == FALSE) {

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
                    $this->kafeel->email = $this->input->post('email', TRUE);
                    $this->kafeel->website = $this->input->post('website', TRUE);
                    $this->kafeel->address = $this->input->post('address', TRUE);
                    $this->kafeel->cell_number = $this->input->post('cell_no', TRUE);
                    $this->kafeel->office_number = $this->input->post('office_no', TRUE);
                    $this->kafeel->comment = $this->input->post('comment', TRUE);



                    $success = $this->kafeel->insertRecord();

                    if ($success) {
                        $data['data_saved'] = 'yes';
                        $this->load->view('admin_panel/add_kafeel', $data);
                    }
                } else {
                    $data['code_exist'] = 'yes';
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

        if(filter_input_array(INPUT_POST)){
            $rules = array(
                array('field' => 'date',
                    'label' => 'Date',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'kafeel_name',
                    'label' => 'Kafeel Name',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'visa_profession',
                    'label' => 'visa profession',
                    'rules' => 'max_length[32]|min_length[3]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'no_of_visas',
                    'label' => 'Number of Visa',
                    'rules' => 'required|max_length[32]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'visa_price',
                    'label' => 'visa price',
                    'rules' => 'max_length[50]|xss_clean|encode_php_tags|trim'
                ),
                array(
                    'field' => 'visa_category',
                    'label' => 'visa category',
                    'rules' => 'valid_email|required|max_length[50]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'comment',
                    'label' => 'Comment',
                    'rules' => 'xss_clean|max_length[50]|encode_php_tags|trim|callback_url_check'
                )

            );

        }else{
            $this->load->view('admin_panel/add_newvisa' , $data);
        }
    }


    public function visa_profession(){
        $data['success_add'] = '';
        $data['success_del'] = '';
        $data['notdel'] = '';
        $this->load->model('visa_profession');
        $data['visa_professions'] = $this->visa_profession->getRecord();
        if (filter_input_array(INPUT_POST)) {

            $input_profession = $this->input->post('visa_profession', true);

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


            }

            $pk = $this->input->post('pk', true);

            if(isset($pk)){
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
            }
            $profession_delete = $this->input->post('vp_id', true);
            if(isset($profession_delete)){

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
            }

        }else{
            $this->load->view('admin_panel/visa_profession', $data);
        }

    }


    public function visa_category(){
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
}

?>