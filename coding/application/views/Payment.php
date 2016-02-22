<?php include 'includes/header.php' ; ?>
<?php include 'includes/top_header.php' ; ?>

<?php
$loggedInUser = $this->session->userdata('loggedInUser');

// change menu according to privillages

if($loggedInUser == 'admin'){
    include 'includes/admin_menu.php';
}else if($loggedInUser == 'local_user'){
    include 'includes/local_user_menu.php';
}else if($loggedInUser == 'kafeel'){
    include 'includes/kafeel_menu.php';
} else {
    include 'includes/anonymous_menu.php';
} ?>
<body>
<div class="container" >
    <div class="row" >
        <div class="col-md-12">
            <?php
            if($loggedInUser == 'admin' || $loggedInUser == 'local_user'){ ?>

                <h1>Worker Information!</h1>

                <?php
                if(isset($all_worker) != ''){  ?>


                    <table class="table table-striped table-bordered table-hover" id="localtable">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>CNIC</th>
                            <th>Visa</th>
                            <th>Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach($payment as $key => $value){

                                ?>
                                <tr class="gradeU">
                                    <td class="text-center"><a href="<?php echo $root.'payment/update/'.$value['w_cnic'].'/'.$value['w_fname']; ?>"><?php echo $i; ?></a> </td>
                                    <td><?php echo $value['w_fname']; ?></td>
                                    <td><?php echo $value['w_lname']; ?></td>
                                    <td>
                                        <a href="<?php echo $root.'payment/detail/'.$value['w_cnic'].'/'.$value['w_fname']; ?>" data-toggle="tooltip" data-placement="top" title="View Information" >
                                            <?php echo $value['w_cnic']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $value['w_passport']; ?></td>
                                    <td><?php echo $value['w_address']; ?></td>

                                </tr>
                                <?php $i++;  } ?>
                        </tbody>
                    </table>



                <?php }elseif(isset($view_worker) != ''){ ?>


                <div class="card-panel">
                    <?php
                    $i = 1;
                    foreach($payment as $key => $value){ ?>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne">
                                            Inserted Date :-<?php date('d M Y', $payment[0]['record_inserted_date']); ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <table class="table table-bordered worker-info table-hover">

                                            <tr>
                                                <th>Total Payment</th>
                                                <td><?php echo $payment[0]['total_amount']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Amount Received</th>
                                                <td><?php echo $payment[0]['amount_received']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Amount Remaining</th>
                                                <td><?php echo $payment[0]['amount_remaining']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Remaining Till</th>
                                                <td><?php echo $payment[0]['remaining_till']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Receiving Date</th>
                                                <td><?php echo $payment[0]['receiving_date']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Currency For Amount Received</th>
                                                <td><?php echo $payment[0]['currency_for_amount_received']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Currency Rate Amount Received</th>
                                                <td><?php echo $payment[0]['currency_rate_amount_received']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Currency For Receiving Amount</th>
                                                <td><?php echo $payment[0]['currency_for_receiving_amount']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Transaction Cheque Code</th>
                                                <td><?php echo $payment[0]['transaction_cheque_code']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Record Inserted By</th>
                                                <td><?php echo $payment[0]['record_inserted_by_id']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Extra Info</th>
                                                <td><?php echo $payment[0]['extra_info']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php } ?>
                </div>


            <?php }
                elseif(isset($update_worker) != ''){ ?>
                    <form  action="<?php echo $root; ?>payment/update/<?php echo $payment[0]['worker_id'].'/'.$name; ?>" method="post">

                <div class="form-body card-panel">
                    <h1 class="form-section">Add Payment</h1>
                    <br /> <br />
                    <?php

                    if ($data_saved == ''){ ?>
                    <div class="row">

                        <div class="col-md-12">
                            <p class="form_heading">Payment Information</p>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('total_amount') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Total Amount:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text"  class="form-control input-sm total_amount" name="total_amount" readonly placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['total_amount']; ?>" <?php }else{ ?> value="<?php echo $payment[0]['total_amount']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('total_amount') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('total_amount'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('amount_received') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Amount Received:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text"  class="form-control input-sm amount_received" name="amount_received" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['amount_received']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('amount_received') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('amount_received'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('amount_remaining') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Remaining Amount:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text"  class="form-control input-sm amount_remaining" name="amount_remaining" placeholder="jhone Doe" readonly
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['amount_remaining']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('amount_remaining') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('amount_remaining'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('remaining_till') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Remaining Till:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm date remaining_till" name="remaining_till" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['remaining_till']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('remaining_till') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('remaining_till'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('currency_for_amount_received') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Currency For Amount Received:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="currency_for_amount_received" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['currency_for_amount_received']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('currency_for_amount_received') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('currency_for_amount_received'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('currency_rate_amount_received') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Currency Rate For Amount Received:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" id="ir_phone" class="form-control input-sm" name="currency_rate_amount_received" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['currency_rate_amount_received']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('currency_rate_amount_received') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('currency_rate_amount_received'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('currency_for_receiving_amount') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Currency For Receiving Amount:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" id="ir_phone" class="form-control input-sm" name="currency_for_receiving_amount" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['currency_for_receiving_amount']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('currency_for_receiving_amount') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('currency_for_receiving_amount'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('currency_rate_for_receiving_amount') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Currency Rate For Receiving Amount:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" id="ir_phone" class="form-control input-sm" name="currency_rate_for_receiving_amount" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['currency_rate_for_receiving_amount']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('currency_rate_for_receiving_amount') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('currency_rate_for_receiving_amount'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('transaction_cheque_code') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Transaction Cheque Code:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" id="ir_phone" class="form-control input-sm" name="transaction_cheque_code" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['transaction_cheque_code']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('transaction_cheque_code') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('transaction_cheque_code'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group  <?php if($_POST){ if (form_error('extra_info') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Extra Info:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" id="ir_phone" class="form-control input-sm" name="extra_info" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['extra_info']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('extra_info') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('extra_info'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset-5">
                            <div class="form-actions left">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Submit</button>
                            </div>
                        </div>

                    </div>

            <?php }else{ ?>
                <div class="alert alert-success col-sm-8 col-md-offset-2" style="margin-top: 8%; margin-bottom: 10%;">
                    Worker added successfully ! <br>
                    <a href="<?php echo base_url(); ?>add_worker" style="color:#2A7FFF" >Click here to Go Back</a><br>
                    If you want to add worker application status <a href="<?php echo $root; ?>add_application_status/cnic">click here</a>
                </div>
            <?php } ?>

                <script>
                    $(document).ready(function () {

                        $('.total_amount, .amount_received').change(function(){
                            var total_amount = $('.total_amount').val();
                            var amount_rec = $('.amount_received').val();
                            $('.amount_remaining').val(total_amount - amount_rec);
                            if(total_amount == amount_rec){
                                $('.remaining_till').prop('readonly', true).val('');
                            }else{
                                $('.remaining_till').prop('readonly', false);
                            }
                        }).trigger('change');


                        $("#iqama_profession").select2({
                            ajax: {
                                url: "<?php echo $root; ?>search/iqama_profession",
                                type: "POST",
                                dataType: 'json',
                                delay: 250,
                                data: function (params) {
                                    return {
                                        profession: params.term
                                    };
                                },
                                processResults: function (data) {
                                    return {
                                        results: data
                                    };
                                },
                                cache: true
                            },
                            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                            minimumInputLength: 1, // omitted for brevity, see the source of this page
                            placeholder: "Select a profession"
                        });

                        $("#visa_category").select2({
                            ajax: {
                                url: "<?php echo $root; ?>search/visa_category",
                                type: "POST",
                                dataType: 'json',
                                delay: 250,
                                data: function (params) {
                                    return {
                                        category: params.term
                                    };
                                },
                                processResults: function (data) {
                                    return {
                                        results: data
                                    };
                                },
                                cache: true

                            },
                            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                            minimumInputLength: 1, // omitted for brevity, see the source of this page
                            placeholder: "Select a profession"
                        });

                        $("#kafeel_code").select2({
                            ajax: {
                                url: "<?php echo $root; ?>search/kafeel_code",
                                type: "POST",
                                dataType: 'json',
                                delay: 250,
                                data: function (params) {
                                    return {
                                        kafeel_code: params.term
                                    };
                                },
                                processResults: function (data) {
                                    return {
                                        results: data
                                    };
                                },
                                cache: true

                            },
                            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                            minimumInputLength: 1, // omitted for brevity, see the source of this page
                            placeholder: "Select a profession"
                        });
                        $('#co_name, #co_city, #co_phone, #ir_by').change(function(){
                            var selectval = $('#ir_by').val();
                            if(selectval == 'care off'){
                                $('#ir_name').val($('#co_name').val());
                                $('#ir_city').val($('#co_city').val());
                                $('#ir_phone').val($('#co_phone').val());
                            }
                        });
                    });
                </script>
                    <?php }
            }else{ ?>
                <div class="alert alert-danger col-sm-8 col-md-offset-2" style="margin-top: 8%; margin-bottom: 10%;">
                    You do not have sufficient permissions to access this page
                    <br />  <br /> <br />
                    <a href="<?php echo base_url(); ?>home" style="color:#2A7FFF" > Go Back to Home</a>
                </div>
            <?php } ?>
        </div>
                    </form>
    </div>
</div>
    </div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<br /><br /><br /><br />

<?php include 'includes/footer.php'; ?>
