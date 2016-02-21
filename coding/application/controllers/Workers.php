<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workers extends CI_Controller {
    public function index(){
        $data['pagename'] = 'view_worker';
        $data['activeMenu'] = 'view_worker';
        $data['all_worker'] = 'yes';

        $data['cnic_exist'] = '';
        $data['data_saved'] = '';

        $this->load->model('worker');
        $data['workers'] = $this->worker->getRecord();
        $this->load->view('view_worker', $data);
    }

    public function detail($worker_id){
        $data['activeMenu'] = 'view_worker';
        $data['view_worker'] = 'yes';

        $this->load->model('worker');
        $array = array(
            'cares_off' => 'cares_off.co_id = workers.co_id',
            'iqama_professions' => 'iqama_professions.ip_id = workers.ip_id',
            'visa_categories' => 'visa_categories.vc_id = workers.vc_id',
            'insurance_statuses' => 'insurance_statuses.ins_id = workers.ins_id',
            'visa_statuses' => 'visa_statuses.vs_id = workers.vs_id',
            'iqama_statuses' => 'iqama_statuses.is_id = workers.is_id',
            'payment_histories' => 'payment_histories.ph_id = workers.ph_id',
            'iqama_received_by' => 'iqama_received_by.irb_id = workers.iqama_received_by'
        );

        $data['worker_info'] = $this->worker->sql_join_multi(['workers.w_id' => $worker_id], $array);
//echo '<pre>'.var_export($data['worker_info'], true).'</pre>';exit;
        $this->load->view('view_worker', $data);

    }


    public function update($worker_id){
        $data['pagename'] = 'add_worker';
        $data['activeMenu'] = 'add_worker';
        $data['update_worker'] = 'yes';

        $data['cnic_exist'] = '';
        $data['data_saved'] = '';
        $active_user = $this->session->userdata('email');

        $this->load->model('worker');
        $array = array(
            'cares_off' => 'cares_off.co_id = workers.co_id',
            'iqama_professions' => 'iqama_professions.ip_id = workers.ip_id',
            'visa_categories' => 'visa_categories.vc_id = workers.vc_id',
            'insurance_statuses' => 'insurance_statuses.ins_id = workers.ins_id',
            'visa_statuses' => 'visa_statuses.vs_id = workers.vs_id',
            'iqama_statuses' => 'iqama_statuses.is_id = workers.is_id',
            'payment_histories' => 'payment_histories.ph_id = workers.ph_id',
            'iqama_received_by' => 'iqama_received_by.irb_id = workers.iqama_received_by'
        );

        $data['worker_info'] = $this->worker->sql_join_multi(['workers.w_id' => $worker_id], $array);
        $worker = $data['worker_info'];
        //echo '<pre>'.var_export($data['worker_info'], true).'</pre>';exit;
        if(filter_input_array(INPUT_POST)){

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
                )
            );
            //validation run


            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if (!$this->form_validation->run($rules) == FALSE) {


                $this->load->model('care_off');
                $care_off_array = array(
                    'co_full_name' => $this->input->post('co_name', true),
                    'co_city' => $this->input->post('co_city', true),
                    'co_phone' => $this->input->post('co_phone', true),
                    'co_address' => $this->input->post('co_address', true),
                    'co_email' => $this->input->post('co_email', true),
                );

                $this->care_off->updateRecord('co_id', $care_off_array, $worker[0]['co_id']);

                $this->load->model('insurance_status');
                $this->insurance_status->updateRecord(
                    'ins_id', ['isn_status' => $this->input->post('insurance', true)],
                    $worker[0]['ins_id']
                );

                $this->load->model('iqama_received');
                $irb_array = array(
                    'irb_received_by' => $this->input->post('iqama_received_by', true),
                    'irb_name' => $this->input->post('iqama_received_by_name', true),
                    'irb_city' => $this->input->post('iqama_received_by_city', true),
                    'irb_phone' => $this->input->post('iqama_received_by_phone', true)

                );

                $this->iqama_received->updateRecord('irb_id', $irb_array, $worker[0]['iqama_received_by']);

                $this->load->model('visa_status');
                $this->visa_status->updateRecord('vs_id', ['vs_status' => $this->input->post('pk_status', true)], $worker[0]['vs_id']);

                $this->load->model('iqama_status');
                $this->iqama_status->updateRecord('is_id', ['is_status' => $this->input->post('ksa_status', true)], $worker[0]['is_id']);

                $this->load->model('payment_history');
                /*$payment_history_array = array(

                    'worker_id' => $this->input->post('cnic', TRUE),
                    'total_amount' => $this->input->post('total_amount', true),
                    'amount_received' => $this->input->post('amount_received', true),
                    'amount_remaining' => $this->input->post('amount_remaining', true),
                    'remaining_till' => $this->input->post('remaining_till', true),
                    'receiving_date' => time(),
                    'currency_for_amount_received' => $this->input->post('currency_for_amount_received', true),
                    'currency_rate_amount_received' => $this->input->post('currency_rate_amount_received', true),
                    'currency_for_receiving_amount' => $this->input->post('currency_for_receiving_amount', true),
                    'currency_rate_for_receiving_amount' => $this->input->post('currency_rate_for_receiving_amount', true),
                    'transaction_cheque_code' => $this->input->post('transaction_cheque_code', true),
                    'record_inserted_by_id' => $active_user,
                    'record_inserted_date' => time(),
                    'extra_info' => $this->input->post('extra_info', true),
                );
                $payment_id = $this->payment_history->updateRecord();
*/
                $this->load->model('worker');
                $worker_array = array(
                    'w_fname' => $this->input->post('fname', TRUE),
                    'w_lname' => $this->input->post('lname', TRUE),
                    'w_dob' => $this->input->post('dob', TRUE),
                    'w_passport' => $this->input->post('passport', TRUE),
                    'w_phone' => $this->input->post('phone', TRUE),
                    'w_address' => $this->input->post('address', TRUE),
                    'w_city' => $this->input->post('city', TRUE),
                    'w_country' => $this->input->post('country', TRUE),
                    'visa_no' => $this->input->post('visa', TRUE),
                    'iqama_no' => $this->input->post('iqama', TRUE),
                    'ip_id' => $this->input->post('iqama_profession', TRUE),
                    'vc_id' => $this->input->post('visa_category', TRUE),
                    'kafeel_code' => $this->input->post('kafeel_code', TRUE),
                    'iqama_issue_date' => $this->input->post('iqama_issue', TRUE),
                    'iqama_expiry_date' => $this->input->post('iqama_expiry', TRUE),
                    'w_description' => $this->input->post('description', TRUE),

            );
                $success = $this->worker->updateRecord('w_id', $worker_array, $worker[0]['w_id']);


                if($success){

                    $data['data_saved'] = 'yes';
                    $this->load->view('view_worker', $data);
                }else{
                    $this->load->view('view_worker', $data);
                }


            } else {
                //echo 'form not validate';
                $this->load->view('view_worker', $data);
            }
        }else {
            $this->load->view('view_worker', $data);
        }
    }


}