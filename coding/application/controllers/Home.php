<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index(){
        $data['pagename'] = 'home';
        $data['activeMenu'] = 'home';
        //echo $this->session->userdata('loggedInUser');exit;

        $this->load->view('home' , $data);
    }
}

?>