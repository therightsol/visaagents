<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller{
    public function index (){
        $data['pagename'] = 'logout';
        
        /*
         * logging out ... means deleting session
         */
        $this->session->unset_userdata('email');     // deleting data in same request
        $this->session->sess_destroy();                 // deleting data on next request.
        
        
        /*
         * loading login page -- redirecting.
         */ 
        redirect('Login');
    }
}

