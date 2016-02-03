<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Local_user extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'local_users';
    const DB_TablePK = 'lu_id';
    
    public $fname = '';
    public $lname = '';
    public $cell_no = '';
    public $address = '';
    public $cnic = '';
    public $experience = '';
    public $salary = '';
    public $education = '';
    public $reference_by = '';
    public $date_join = '';
    public $profile_pic = '';
    
} ?>
	