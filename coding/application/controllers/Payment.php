<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
    public function index(){
        $data['pagename'] = 'view_worker';
        $data['activeMenu'] = 'view_worker';
        $data['all_worker'] = 'yes';

        $data['cnic_exist'] = '';
        $data['data_saved'] = '';

        $this->load->model('worker');
        $data['payment'] = $this->worker->getRecord();
        $this->load->view('payment', $data);
    }

    public function detail($worker_id, $worker_name){
        $data['activeMenu'] = 'view_worker';
        $data['view_worker'] = 'yes';
        $this->load->model('payment_history');
        $date['name'] = $worker_name;


        $data['payment'] = $this->payment_history->getRecord($worker_id, 'worker_id', true);
//echo '<pre>'.var_export($data['payment'], true).'</pre>';exit;
        $this->load->view('payment', $data);

    }


    public function update($worker_id, $worker_name){
        $data['pagename'] = 'add_worker';
        $data['activeMenu'] = 'add_worker';
        $data['update_worker'] = 'yes';
        $data['name'] = $worker_name;

        $data['cnic_exist'] = '';
        $data['data_saved'] = '';
        $active_user = $this->session->userdata('email');

        $this->load->model('payment_history');
        $data['payment'] = $this->payment_history->getRecord($worker_id, 'worker_id', true);
       // echo '<pre>'.var_export($data['payment'], true).'</pre>';exit;
        if(filter_input_array(INPUT_POST)){

            $this->load->helper('security');
            $rules = array(
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

                $this->load->model('payment_history');
                $this->load->model('payment_history');

                $this->payment_history->worker_id = $worker_id;
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
                $success =  $this->payment_history->insertRecord();


                if($success){

                    $data['data_saved'] = 'yes';
                    $this->load->view('payment', $data);
                }else{
                    $this->load->view('payment', $data);
                }


            } else {

                //echo 'form not validate';
                $this->load->view('payment', $data);
            }
        }else {
            $this->load->view('payment', $data);
        }
    }


}