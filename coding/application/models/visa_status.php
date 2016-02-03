<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visa_status extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'visa_statuses';
    const DB_TablePK = 'vs_id';

    public $vs_status = '';
} ?>
	