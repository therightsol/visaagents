<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visa_category extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'visa_categories';
    const DB_TablePK = 'vc_id';

    public $vc_id = '';
    public $vc_title = '';
    public $category_description = '';
} ?>
	