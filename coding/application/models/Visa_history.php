<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visa_history extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'visa_histories';
    const DB_TablePK = 'vh_id';

public $kafeel_code = '';
public $visa_profession = '';
public $number_of_visa = '';
public $visa_price = '';
public $visa_category = '';
public $date = '';
public $comment = '';
}