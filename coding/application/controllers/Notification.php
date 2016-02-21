<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
    public function index(){
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }else{
            $this->load->model('worker');



            $last_15_days_time = time()-1296000;

            $email = $this->worker->getSpecificColumnRec(false, ['iqama_expiry_date <' => $last_15_days_time]);
        echo '<pre>'.var_export($email).'</pre>';
        }
    }
}

?>
