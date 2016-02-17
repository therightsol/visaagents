<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
    public function index(){
        $data['pagename'] = 'jobs';
        $data['activeMenu'] = 'jobs';
        //echo $this->session->userdata('loggedInUser');exit;

        $this->load->view('jobs' , $data);
    }
}

?>
