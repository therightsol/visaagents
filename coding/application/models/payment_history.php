<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_history extends MY_Model {

    /**
     * Table Name and Primary key to perform CRUD operations.
     */
    const DB_TableName = 'payment_histories';
    const DB_TablePK = 'ph_id';

    public $worker_id = '';
    public $total_amount = '';
    public $amount_received = '';
    public $amount_remaining = '';
    public $remaining_till = '';
    public $receiving_date = '';
    public $currency_for_amount_received = '';
    public $currency_rate_amount_received = '';
    public $currency_for_receiving_amount = '';
    public $currency_rate_for_receiving_amount = '';
    public $transaction_cheque_code = '';
    public $record_inserted_by_id = '';
    public $record_updated_by_id = '';
    public $record_inserted_date = '';
    public $record_updated_date = '';
    public $extra_info = '';
} ?>
	