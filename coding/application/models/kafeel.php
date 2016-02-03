<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kafeel extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'kafeels';
    const DB_TablePK = 'k_id';

public $fname = '';
public $lname = '';
public $city = '';
public $total_payment = '';
public $total_visa_expense = '';
public $kafeel_code = '';
public $business_name = '';
public $date = '';
public $visa_profession = '';
public $member_of_visa = '';
public $visa_price = '';
public $care_off = '';
public $visa_category = '';
public $email = '';
public $website = '';
public $address = '';
public $cell_number = '';
public $office_number = '';
public $comment = '';
public $uid = '';
} ?>
	