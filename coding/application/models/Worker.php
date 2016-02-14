<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Worker extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'workers';
    const DB_TablePK = 'w_id';
    
    public $fname = '';
    public $lname = '';
    public $dob = '';
    public $cnic = '';
    public $passport = '';
    public $phone = '';
    public $address = '';
    public $city = '';
    public $country = '';
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
	