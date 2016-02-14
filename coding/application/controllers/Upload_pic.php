<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_pic extends CI_Controller
{
    public function index()
    {


    }


    public function do_upload()
    {
        $loggedInUser = $this->session->userdata('loggedInUser');
        $user_id = $this->session->userdata('userid');
        if ($_FILES) {


            $config = array(
                'upload_path' => "./upload_imgs/profile/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );

            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $db_img_path = '';

            if ($loggedInUser == 'local_user') {
                $this->load->model('local_user');
                $db_img_name = $this->local_user->getSpecificColumnRec(['profile_pic'], ['uid' => $user_id]);

                $db_img_path = $db_img_name[0]['profile_pic'];

                if ($this->upload->do_upload()) {

                    $input_img_name = $this->upload->data('file_name');
                    $upload_data_path = 'upload_imgs/profile/' . $input_img_name;

                    $success = $this->local_user->updateRecord('uid', ['profile_pic' => $upload_data_path], $user_id);

                } else {
                    echo $this->upload->display_errors();
                }
            }elseif($loggedInUser == 'kafeel'){
                $this->load->model('kafeel');
                $db_img_name = $this->kafeel->getSpecificColumnRec(['profile_pic'], ['uid' => $user_id]);

                $db_img_path = $db_img_name[0]['profile_pic'];

                if ($this->upload->do_upload()) {

                    $input_img_name = $this->upload->data('file_name');
                    $upload_data_path = 'upload_imgs/profile/' . $input_img_name;

                    $success = $this->kafeel->updateRecord('uid', ['profile_pic' => $upload_data_path], $user_id);

                } else {
                    echo $this->upload->display_errors();
                }

            }else{
                die('you are not allowed');
            }


            if($success){
                if (file_exists($db_img_path)) {
                    if (!unlink($db_img_path)) {
                        echo("Error deleting $db_img_path");
                    } else {
                        echo("Deleted $db_img_path");
                    }
                } else {
                    echo 'file not eist';
                }
            }



        }
    }

    public function get_img_name()
    {
        $loggedInUser = $this->session->userdata('loggedInUser');
        $user_id = $this->session->userdata('userid');

        if($loggedInUser == 'local_user'){
            $this->load->model('local_user');

            $db_img_name = $this->local_user->getSpecificColumnRec(['profile_pic'], ['uid' => $user_id]);

            echo $db_img_name[0]['profile_pic'];
        }elseif($loggedInUser == 'kafeel'){
            $this->load->model('kafeel');

            $db_img_name = $this->kafeel->getSpecificColumnRec(['profile_pic'], ['uid' => $user_id]);

            echo $db_img_name[0]['profile_pic'];
        }else{
            die('you are not allowed');
        }


    }

}