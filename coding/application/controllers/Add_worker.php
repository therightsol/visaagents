<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_worker extends CI_Controller {
    public function index(){
        $data['pagename'] = 'add_worker';
        $data['activeMenu'] = 'add_worker';

        $data['cnic_exist'] = '';
        $data['data_saved'] = '';
        $active_user = $this->session->userdata('email');

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


                array('field' => 'total_amount',
                    'label' => 'total amount',
                    'rules' => 'required|max_length[50]|xss_clean|encode_php_tags|trim'
                ),

                array('field' => 'amount_received',
                    'label' => 'amount received',
                    'rules' => 'required|max_length[50]|xss_clean|encode_php_tags|trim'
                ),

                array('field' => 'currency_for_amount_received',
                    'label' => 'Currency for amount received',
                    'rules' => 'required|max_length[50]|xss_clean|encode_php_tags|trim'
                ),

                array('field' => 'currency_rate_amount_received',
                    'label' => 'Currency_rate_amount_received',
                    'rules' => 'required|max_length[50]|xss_clean|encode_php_tags|trim'
                ),

                array('field' => 'currency_for_receiving_amount',
                    'label' => 'Currency for receiving amount',
                    'rules' => 'required|max_length[50]|xss_clean|encode_php_tags|trim'
                ),

                array('field' => 'currency_rate_for_receiving_amount',
                    'label' => 'Currency rate for receiving amount',
                    'rules' => 'required|max_length[50]|xss_clean|encode_php_tags|trim'
                ),

                array('field' => 'transaction_cheque_code',
                    'label' => 'Transaction cheque code',
                    'rules' => 'required|max_length[50]|xss_clean|encode_php_tags|trim'
                )


            );
            //validation run
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if (!$this->form_validation->run($rules) == FALSE) {


                $this->load->model('care_off');
                $this->care_off->co_full_name = $this->input->post('co_name', true);
                $this->care_off->co_city = $this->input->post('co_city', true);
                $this->care_off->co_phone = $this->input->post('co_phone', true);
                $this->care_off->co_address = $this->input->post('co_address', true);
                $this->care_off->co_email = $this->input->post('co_email', true);
                $care_off_id = $this->care_off->insertRecord();

                $this->load->model('insurance_status');
                $this->insurance_status->isn_status = $this->input->post('insurance', true);
                $ins_id = $this->insurance_status->insertRecord();

                $this->load->model('iqama_received');
                $this->iqama_received->irb_received_by = $this->input->post('iqama_received_by', true);
                $this->iqama_received->irb_name = $this->input->post('iqama_received_by_name', true);
                $this->iqama_received->irb_city = $this->input->post('iqama_received_by_city', true);
                $this->iqama_received->irb_phone = $this->input->post('iqama_received_by_phone', true);
                $irb_id = $this->iqama_received->insertRecord();

                $this->load->model('visa_status');
                $this->visa_status->vs_status = $this->input->post('pk_status', true);
                $vs_id = $this->visa_status->insertRecord();

                $this->load->model('iqama_status');
                $this->iqama_status->is_status = $this->input->post('ksa_status', true);
                $iqama_status_id = $this->iqama_status->insertRecord();

                $this->load->model('payment_history');

                $this->payment_history->worker_id = $this->input->post('cnic', TRUE);
                $this->payment_history->total_amount = $this->input->post('total_amount', true);
                $this->payment_history->amount_received = $this->input->post('amount_received', true);
                $this->payment_history->amount_remaining = $this->input->post('amount_remaining', true);
                $this->payment_history->remaining_till = strtotime($this->input->post('remaining_till', true));
                $this->payment_history->receiving_date = time();
                $this->payment_history->currency_for_amount_received = $this->input->post('currency_for_amount_received', true);
                $this->payment_history->currency_rate_amount_received = $this->input->post('currency_rate_amount_received', true);
                $this->payment_history->currency_for_receiving_amount = $this->input->post('currency_for_receiving_amount', true);
                $this->payment_history->currency_rate_for_receiving_amount = $this->input->post('currency_rate_for_receiving_amount', true);
                $this->payment_history->transaction_cheque_code = $this->input->post('transaction_cheque_code', true);
                $this->payment_history->record_inserted_by_id = $active_user;
                $this->payment_history->record_inserted_date = time();
                $this->payment_history->extra_info = $this->input->post('extra_info', true);
                $payment_id = $this->payment_history->insertRecord();

                $this->load->model('worker');
                $this->worker->w_fname = $this->input->post('fname', TRUE);
                $this->worker->w_lname = $this->input->post('lname', TRUE);
                $this->worker->w_dob = $this->input->post('dob', TRUE);
                $this->worker->w_cnic = $this->input->post('cnic', TRUE);
                $this->worker->w_passport = $this->input->post('passport', TRUE);
                $this->worker->w_phone = $this->input->post('phone', TRUE);
                $this->worker->w_address = $this->input->post('address', TRUE);
                $this->worker->w_city = $this->input->post('city', TRUE);
                $this->worker->w_country = $this->input->post('country', TRUE);
                $this->worker->co_id = $care_off_id;
                $this->worker->visa_no = $this->input->post('visa', TRUE);
                $this->worker->iqama_no = $this->input->post('iqama', TRUE);
                $this->worker->ip_id = $this->input->post('iqama_profession', TRUE);
                $this->worker->vc_id = $this->input->post('visa_category', TRUE);
                $this->worker->ins_id = $ins_id;
                $this->worker->vs_id = $vs_id;
                $this->worker->is_id = $iqama_status_id;
                $this->worker->ph_id = $payment_id;
                $this->worker->kafeel_code = $this->input->post('kafeel_code', TRUE);
                $this->worker->iqama_issue_date = strtotime($this->input->post('iqama_issue', TRUE));
                $this->worker->iqama_expiry_date = strtotime($this->input->post('iqama_expiry', TRUE));
                $this->worker->description = $this->input->post('description', TRUE);
                $this->worker->iqama_received_by = $irb_id;

                $success = $this->worker->insertRecord();


                $this->load->model('track_application');
                $this->track_application->application_code = $this->input->post('cnic', TRUE);
                $this->track_applications->insertRecord();


                if($success){

                    $data['data_saved'] = 'yes';
                    $this->load->view('add_worker', $data);
                }


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
