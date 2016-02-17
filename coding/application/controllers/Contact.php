<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function index(){
        $data['pagename'] = 'contact';
        $data['activeMenu'] = 'contact';
        //echo $this->session->userdata('loggedInUser');exit;

        $this->load->view('contact' , $data);
    }
}

?>
