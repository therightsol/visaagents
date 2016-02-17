<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_and_conditions extends CI_Controller {
    public function index(){
        $data['pagename'] = 'terms';
        $data['activeMenu'] = 'terms';
        //echo $this->session->userdata('loggedInUser');exit;

        $this->load->view('terms' , $data);
    }
}

?>
