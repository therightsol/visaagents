<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visa_Procedure extends CI_Controller {
    public function index(){
        $data['pagename'] = 'Visa_Procedure';
        $data['activeMenu'] = 'Visa_Procedure';
        //echo $this->session->userdata('loggedInUser');exit;

        $this->load->view('vs_procedure' , $data);
    }
}

?>
