<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Iqama_received extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'iqama_received_by';
    const DB_TablePK = 'irb_id';

    public $irb_received_by = '';
    public $irb_name = '';
    public $irb_city = '';
    public $irb_phone = '';
}