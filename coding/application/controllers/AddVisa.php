<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addvisa extends CI_Controller {
    public function index(){
        $data['pagename'] = 'addvisa';
        $this->load->view('add_newvisa' , $data);
    }
}

?>
