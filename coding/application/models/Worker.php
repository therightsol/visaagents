<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Worker extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'workers';
    const DB_TablePK = 'w_id';
    
    public $w_fname = '';
    public $w_lname = '';
    public $w_dob = '';
    public $w_cnic = '';
    public $w_passport = '';
    public $w_phone = '';
    public $w_address = '';
    public $w_city = '';
    public $w_country = '';
    public $co_id = '';
    public $visa_no = '';
    public $iqama_no = '';
    public $ip_id = '';
    public $vc_id = '';
    public $ins_id = '';
    public $vs_id = '';
    public $is_id = '';
    public $kafeel_code = '';
    public $iqama_issue_date = '';
    public $iqama_expiry_date = '';
    public $iqama_received_by = '';
    public $description = '';

} ?>
	