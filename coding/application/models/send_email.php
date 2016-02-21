<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Send_email extends MY_Model {

    public function send($user_name, $userEmail = false, $message, $subject, $type = false) {
        /*
         * Before loading this function
         *          load
         * $this->load->library('email');
         */
        $this->load->model('basic_functions');
        $this->load->library('encrypt');
        $encryptionKey = $this->basic_functions->getEncryptionKey();

        $encrypteUserName = $this->encrypt->encode($user_name, $encryptionKey);

        $encrypteUserName = base64_encode($encrypteUserName);   // changing username to base64 algo.
        //echo $encrypteUserName; exit();


        $this->load->model('general');

        $send_email = $this->general->getRecord('send_email', 'title', true);
        $record = $this->general->getRecord('email_config', 'title', true);

        foreach ($send_email as $k => $v) {
            if ($v['config'] == 'from') {
                $from = $v['value'];
            }
            if ($v['config'] == 'reply_to') {
                $reply_to = $v['value'];
            }
            if ($v['config'] == 'type') {
                $db_type = $v['value'];
            }
        }

        if($userEmail == false){
            $userEmail = $from;
        }
        if($type == false){
            $type = $db_type;
        }

        //config email from database

        foreach ($record as $key => $value) {
            $config[$value['config']] = $value['value'];
        }
        //config initialize
        $this->email->initialize($config);

        $success = $this->email->from($from)
            ->reply_to($reply_to)
            ->to($userEmail)
            ->subject($subject)
            ->message($message)
            ->set_mailtype($type)
            ->send();
        return $success;
    }

} ?>
