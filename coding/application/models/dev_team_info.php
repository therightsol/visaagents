<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dev_team_info extends MY_Model
{

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'dev_team_infos';
    const DB_TablePK = 'dt_id';

    public $team_name = '';
    public $version = '';
    public $feedback_email = '';
    public $contact_skype = '';
} ?>
	