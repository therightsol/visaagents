<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Care_off extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'cares_off';
    const DB_TablePK = 'uid';
    
    public $co_full_name = '';
    public $co_city = '';
    public $co_phone = '';
    public $co_address = '';
    public $co_email = '';
    
} ?>
	