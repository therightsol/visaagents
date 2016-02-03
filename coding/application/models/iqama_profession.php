<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Iqama_profession extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'iqama_professions';
    const DB_TablePK = 'ip_id';

    public $ip_profession = '';

} ?>
	