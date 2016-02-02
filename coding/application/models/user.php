<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'users';
    const DB_TablePK = 'uid';
    
    public $username = '';
    public $email = '';
    public $password = '';
    public $is_local_user = '';
    
    public $is_admin = '';
    public $is_kafeel = '';
    public $is_email_verified= '';
     public $is_admin_approved = '';
    public $is_active = '';
    
} ?>
	