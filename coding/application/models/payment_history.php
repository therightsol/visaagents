<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_history extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'payment_histories';
    const DB_TablePK = 'ph_id';

    public $worker_id = '';
} ?>
	