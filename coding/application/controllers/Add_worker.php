<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_worker extends CI_Controller {
    public function index(){
        $data['pagename'] = 'add_worker';
        $data['activeMenu'] = 'add_worker';

        $data['cnic_exist'] = '';
        $data['data_saved'] = '';

        if(filter_input_array(INPUT_POST)){

            //echo '<pre>'.var_export($_POST, true).'</pre>';exit;

            $this->load->helper('security');
            $rules = array(
                array('field' => 'fname',
                    'label' => 'First Name',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'lname',
                    'label' => 'Last Name',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'dob',
                    'label' => 'Date of birth',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'cnic',
                    'label' => 'CNIC No',
                    'rules' => 'required|xss_clean|encode_php_tags|trim|exact_length[13]|numeric'
                ),
                array('field' => 'passport',
                    'label' => 'Passport',
                    'rules' => 'required|max_length[255]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'phone',
                    'label' => 'Phone No',
                    'rules' => 'required|max_length[32]|min_length[10]|xss_clean|encode_php_tags|trim|numeric'
                ),
                array('field' => 'address',
                    'label' => 'First Name',
                    'rules' => 'required|max_length[255]|min_length[5]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'city',
                    'label' => 'City',
                    'rules' => 'required|max_length[255]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'country',
                    'label' => 'Country',
                    'rules' => 'required|max_length[50]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'co_name',
                    'label' => 'Care off name',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'co_city',
                    'label' => 'Care off city',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'co_phone',
                    'label' => 'Care off Phone',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim|numeric'
                ),
                array('field' => 'co_address',
                    'label' => 'Care off address',
                    'rules' => 'required|max_length[255]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'co_email',
                    'label' => 'Care off email',
                    'rules' => 'valid_email|required|max_length[32]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'visa',
                    'label' => 'visa',
                    'rules' => 'required|max_length[50]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'iqama',
                    'label' => 'Iqama',
                    'rules' => 'required|max_length[50]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'iqama_profession',
                    'label' => 'iqama profession',
                    'rules' => 'required|max_length[9]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'iqama_issue',
                    'label' => 'Iqama issue date',
                    'rules' => 'required|max_length[32]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'iqama_expiry',
                    'label' => 'iqama_expiry',
                    'rules' => 'required|max_length[50]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'visa_category',
                    'label' => 'visa category',
                    'rules' => 'required|max_length[9]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'insurance',
                    'label' => 'Insurance',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'pk_status',
                    'label' => 'Visa status in Pakistan',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'ksa_status',
                    'label' => 'Iqama status in KSA',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'iqama_received_by',
                    'label' => 'Iqama received by',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'iqama_received_by_name',
                    'label' => 'Iqama received by name',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'iqama_received_by_city',
                    'label' => 'Iqama received city',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'iqama_received_by_phone',
                    'label' => 'Iqama received phone',
                    'rules' => 'required|max_length[32]|min_length[2]|xss_clean|encode_php_tags|trim'
                ),
                array('field' => 'kafeel_code',
                    'label' => 'Kafeel code',
                    'rules' => 'required|max_length[9]|xss_clean|encode_php_tags|trim'
                ),


            );
            //validation run
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if (!$this->form_validation->run($rules) == FALSE) {

                $cnic_no = $this->input->post('cnic', TRUE);

                $this->load->model('care_off');
                $this->care_off->full_name = $this->input->post('co_name', true);
                $this->care_off->city = $this->input->post('co_city', true);
                $this->care_off->phone = $this->input->post('co_phone', true);
                $this->care_off->address = $this->input->post('co_address', true);
                $this->care_off->email = $this->input->post('co_email', true);
                $care_off_id = $this->care_off->insertRecord();

                $this->load->model('insurance_status');
                $this->insurance_status->isn_status = $this->input->post('insurance', true);
                $ins_id = $this->insurance_status->insertRecord();

                $this->load->model('iqama_received');
                $this->iqama_received->received_by = $this->input->post('iqama_received_by', true);
                $this->iqama_received->name = $this->input->post('iqama_received_by_name', true);
                $this->iqama_received->city = $this->input->post('iqama_received_by_city', true);
                $this->iqama_received->phone = $this->input->post('iqama_received_by_phone', true);
                $irb_id = $this->iqama_received->insertRecord();

                $this->load->model('visa_status');
                $this->visa_status->vs_status = $this->input->post('pk_status', true);
                $vs_id = $this->visa_status->insertRecord();

                $this->load->model('iqama_status');
                $this->iqama_status->vs_status = $this->input->post('ksa_status', true);
                $iqama_status_id = $this->iqama_status->insertRecord();

                $this->load->model('worker');
                $this->worker->fname = $this->input->post('fname', TRUE);
                $this->worker->lname = $this->input->post('lname', TRUE);
                $this->worker->dob = $this->input->post('dob', TRUE);
                $this->worker->cnic = $this->input->post('cnic', TRUE);
                $this->worker->passport = $this->input->post('passport', TRUE);
                $this->worker->phone = $this->input->post('phone', TRUE);
                $this->worker->address = $this->input->post('address', TRUE);
                $this->worker->city = $this->input->post('city', TRUE);
                $this->worker->country = $this->input->post('country', TRUE);
                $this->worker->co_id = $care_off_id;
                $this->worker->visa_no = $this->input->post('visa', TRUE);
                $this->worker->iqama_no = $this->input->post('iqama', TRUE);
                $this->worker->ip_id = $this->input->post('iqama_profession', TRUE);
                $this->worker->vc_id = $this->input->post('visa_category', TRUE);
                $this->worker->ins_id = $ins_id;
                $this->worker->vs_id = $vs_id;
                $this->worker->is_id = $iqama_status_id;
                $this->worker->kafeel_code = $this->input->post('kafeel_code', TRUE);
                $this->worker->iqama_issue_date = $this->input->post('iqama_issue', TRUE);
                $this->worker->iqama_expiry_date = $this->input->post('iqama_expiry', TRUE);
                $this->worker->description = $this->input->post('description', TRUE);
                $this->worker->iqama_received_by = $irb_id;


            } else {
                //echo 'form not validate';
                $this->load->view('add_worker', $data);
            }
        }else {
            $this->load->view('add_worker', $data);
        }
    }

}

?>
