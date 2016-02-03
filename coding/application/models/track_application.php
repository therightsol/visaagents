<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Track_application extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'track_applications';
    const DB_TablePK = 'ta_id';

    public $status_id = '';
    public $application_code = '';
} ?>
	