<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visa_profession extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'visa_professions';
    const DB_TablePK = 'vp_id';

    public $vp_profession = '';
} ?>
	