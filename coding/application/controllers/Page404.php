<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page404 extends CI_Controller {
    public function index(){

        //echo $this->session->userdata('loggedInUser');exit;

        $this->load->view('page404');
    }
}

?>