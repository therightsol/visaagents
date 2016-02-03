<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance_status extends MY_Model
{

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'insurance_statuses';
    const DB_TablePK = 'ins_id';

    public $isn_status= '';

} ?>
	