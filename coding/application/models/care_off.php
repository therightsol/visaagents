<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Care_of extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'cares_off';
    const DB_TablePK = 'uid';
    
    public $full_name = '';
    public $city = '';
    public $phone = '';
    public $address = '';
    public $email = '';
    
} ?>
	