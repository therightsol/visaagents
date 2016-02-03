<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company_meta_info extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'company_meta_infos';
    const DB_TablePK = 'cm_id';
    
    public $title = '';
    public $admin_c_email = '';
    public $admin_c_email_pass = '';
    public $is_gmail = '';
} ?>
	