<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Iqama_status extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'iqama_statuses';
    const DB_TablePK = 'is_id';

    public $is_status = '';
} ?>
	