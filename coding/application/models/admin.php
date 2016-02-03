<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'admin_';
    const DB_TablePK = 'a_id';

    public $fname = '';
    public $lname = '';
    public $cell_no = '';
    public $address = '';
    public $profile_pic = '';

} ?>
	