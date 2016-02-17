<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {
    public function index(){
        $data['pagename'] = 'Aboutus';
        $data['activeMenu'] = 'Aboutus';
        //echo $this->session->userdata('loggedInUser');exit;

        $this->load->view('about' , $data);
    }
}

?>
