<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Application_status extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'application_statuses';
    const DB_TablePK = 'as_id';
    
    public $as_status = '';
    
} ?>
	