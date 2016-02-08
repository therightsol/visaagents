<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_local_user extends CI_Controller {
    public function index(){
        $data['pagename'] = 'add_kafeel';
        $data['activeMenu'] = 'admin_panel';

        $data['cnic_exist'] = '';
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
                    'rules' => 'xss_clean|encode_php_tags|trim|exact_length[13]'
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


                    $success = $this->local_user->insertRecord();

                    if ($success) {
                        $data['data_saved'] = 'yes';
                        $this->load->view('add_local_user', $data);
                    }
                } else {
                    $data['cnic_exist'] = 'yes';
                    $this->load->view('add_local_user', $data);
                }
            } else {
                //echo 'form not validate';
                $this->load->view('add_local_user', $data);
            }
        } else {
            $this->load->view('add_local_user', $data);
        }
    }

}

?>
