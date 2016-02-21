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
                        foreach($workers as $key => $value){

                                ?>
                                <tr class="gradeU">
                                    <td class="text-center"><a href="<?php echo $root.'workers/update/'.$value['w_id']; ?>"><?php echo $i; ?></a> </td>
                                    <td><?php echo $value['w_fname']; ?></td>
                                    <td><?php echo $value['w_lname']; ?></td>
                                    <td>
                                        <a href="<?php echo $root.'workers/detail/'.$value['w_id']; ?>" data-toggle="tooltip" data-placement="top" title="View Information" >
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
                    <table class="table table-bordered worker-info table-hover">
                        <tr>
                            <td colspan="2" class="alert-success">Worker information</td>
                        </tr>
                        <tr>
                            <th style="width: 20%;">First Name</th>
                            <td><?php echo $worker_info[0]['w_fname']; ?></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td><?php echo $worker_info[0]['w_lname']; ?></td>
                        </tr>
                        <tr>
                            <th>Date Of Birth</th>
                            <td><?php echo $worker_info[0]['w_dob']; ?></td>
                        </tr>
                        <tr>
                            <th>CNIC</th>
                            <td><?php echo $worker_info[0]['w_cnic']; ?></td>
                        </tr>
                        <tr>
                            <th>Passport</th>
                            <td><?php echo $worker_info[0]['w_passport']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone No</th>
                            <td><?php echo $worker_info[0]['w_phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $worker_info[0]['w_address']; ?></td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td><?php echo $worker_info[0]['w_city']; ?></td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td><?php echo $worker_info[0]['w_country']; ?></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="alert-success">Care Of information</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $worker_info[0]['co_full_name']; ?></td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td><?php echo $worker_info[0]['co_city']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo $worker_info[0]['co_phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $worker_info[0]['co_address']; ?></td>
                        </tr>
                        <tr>
                            <th class="alert-success" colspan="2">Visa Information</th>
                        </tr>

                        <tr>
                            <th>Visa No</th>
                            <td><?php echo $worker_info[0]['visa_no']; ?></td>
                        </tr>
                        <tr>
                            <th>Visa Category</th>
                            <td><?php echo $worker_info[0]['vc_title']; ?></td>
                        </tr>
                        <tr>
                            <th>Visa Category Description</th>
                            <td><?php echo $worker_info[0]['category_description']; ?></td>
                        </tr>
                        <tr>
                            <th>Visa Status</th>
                            <td><?php echo $worker_info[0]['vs_status']; ?></td>
                        </tr>
                        <tr>
                            <th>Iqama No</th>
                            <td><?php echo $worker_info[0]['iqama_no']; ?></td>
                        </tr>
                        <tr>
                            <th>Iqama Profession</th>
                            <td><?php echo $worker_info[0]['ip_profession']; ?></td>
                        </tr>
                        <tr>
                            <th>Iqama Status</th>
                            <td><?php echo $worker_info[0]['is_status']; ?></td>
                        </tr>
                        <tr>
                            <th>Iqama Issue Date</th>
                            <td><?php echo $worker_info[0]['iqama_issue_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Iqama Expirty Date</th>
                            <td><?php echo $worker_info[0]['iqama_expiry_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Iqama Received By</th>
                            <td><?php echo $worker_info[0]['irb_received_by']; ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $worker_info[0]['irb_name']; ?></td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td><?php echo $worker_info[0]['irb_city']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo $worker_info[0]['irb_phone']; ?></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="alert-success">Payment Info</th>
                        </tr>
                        <tr>
                            <th>Total Payment</th>
                            <td><?php echo $worker_info[0]['total_amount']; ?></td>
                        </tr>
                        <tr>
                            <th>Amount Received</th>
                            <td><?php echo $worker_info[0]['amount_received']; ?></td>
                        </tr>
                        <tr>
                            <th>Amount Remaining</th>
                            <td><?php echo $worker_info[0]['amount_remaining']; ?></td>
                        </tr>
                        <tr>
                            <th>Remaining Till</th>
                            <td><?php echo $worker_info[0]['remaining_till']; ?></td>
                        </tr>
                        <tr>
                            <th>Receiving Date</th>
                            <td><?php echo $worker_info[0]['receiving_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Currency For Amount Received</th>
                            <td><?php echo $worker_info[0]['currency_for_amount_received']; ?></td>
                        </tr>
                        <tr>
                            <th>Currency Rate Amount Received</th>
                            <td><?php echo $worker_info[0]['currency_rate_amount_received']; ?></td>
                        </tr>
                        <tr>
                            <th>Currency For Receiving Amount</th>
                            <td><?php echo $worker_info[0]['currency_for_receiving_amount']; ?></td>
                        </tr>
                        <tr>
                            <th>Transaction Cheque Code</th>
                            <td><?php echo $worker_info[0]['transaction_cheque_code']; ?></td>
                        </tr>
                        <tr>
                            <th>Record Inserted By</th>
                            <td><?php echo $worker_info[0]['record_inserted_by_id']; ?></td>
                        </tr>

                        <tr>
                            <th>Extra Info</th>
                            <td><?php echo $worker_info[0]['extra_info']; ?></td>
                        </tr>
                    </table>
                </div>


            <?php }
                elseif(isset($update_worker) != ''){ ?>
                    <form  action="<?php echo $root; ?>workers/update/<?php echo $worker_info[0]['w_id']; ?>" method="post">

                <div class="form-body card-panel">
                    <h1 class="form-section">Add Local User</h1>
                    <br /> <br />
                    <?php

                    if ($data_saved == ''){ ?>
                    <div class="row">
                        <?php if($cnic_exist != ''){ ?>
                            <div class="alert alert-danger">
                                CNIC is already used by other user <br>
                                kindly use correct CNIC NO! <strong>or</strong>  contact with admin
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <p class="form_heading">Worker information</p>
                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('fname') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">First Name:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="fname" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['fname']; ?>"  <?php }else{ ?> value="<?php echo $worker_info[0]['w_fname']; ?>" <?php } ?>
                                        />
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('fname') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('fname'); ?>
                                        </span>
                                        <?php } }?>

                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('lname') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">Last Name:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="lname" placeholder="Julian Lacoste"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['lname']; ?>" <?php }else{ ?> value="<?php echo $worker_info[0]['w_lname']; ?>" <?php } ?>
                                        />
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('lname') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('lname'); ?>
                                        </span>
                                        <?php } }?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('cnic') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">CNIC No:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="number" class="form-control input-sm" name="cnic" placeholder="Must be 13 character"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['cnic']; ?>"  <?php }else{ ?> value="<?php echo $worker_info[0]['w_cnic']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('cnic') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('cnic'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-12">

                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('passport') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Passport No:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="number" class="form-control input-sm" name="passport" placeholder="enter passport number"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['passport']; ?>"  <?php }else{ ?> value="<?php echo $worker_info[0]['w_passport']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('passport') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('passport'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('phone') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Phone No:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="number" class="form-control input-sm" name="phone" placeholder="9232176543210"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['phone']; ?>"  <?php }else{ ?> value="<?php echo $worker_info[0]['w_phone']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('phone') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('phone'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('address') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Address:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="address" placeholder="address"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['address']; ?>"  <?php }else{ ?> value="<?php echo $worker_info[0]['w_address']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('address') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('address'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('dob') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Date of birth:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input id="date" type="text" class="form-control input-sm date" name="dob" placeholder="date of birth"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['dob']; ?>"  <?php }else{ ?> value="<?php echo $worker_info[0]['w_dob']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('dob') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('dob'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('city') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">City:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="city" placeholder="enter city"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['city']; ?>"  <?php }else{ ?> value="<?php echo $worker_info[0]['w_city']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('city') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('city'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>





                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('country') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Country:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="country" placeholder="Enter country"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['country']; ?>"  <?php }else{ ?> value="<?php echo $worker_info[0]['w_country']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('country') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('country'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>

                        <hr class="z-depth-4" />
                        <div class="col-md-12">

                            <p class="form_heading">Care of information</p>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('co_name') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Name:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" id="co_name" class="form-control input-sm" name="co_name" placeholder="address"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['co_name']; ?>"  <?php }else{ ?> value="<?php echo $worker_info[0]['co_full_name']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('co_name') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('co_name'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('co_city') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">City:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" id="co_city" class="form-control input-sm" name="co_city" placeholder="enter name"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['co_city']; ?>" <?php }else{ ?> value="<?php echo $worker_info[0]['co_city']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('co_city') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('co_city'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('co_phone') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Phone:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" id="co_phone" class="form-control input-sm" name="co_phone" placeholder="enter name"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['co_phone']; ?>" <?php }else{ ?> value="<?php echo $worker_info[0]['co_phone']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('co_phone') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('co_phone'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('co_address') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Address:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="co_address" placeholder="enter name"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['co_city']; ?>"<?php }else{ ?> value="<?php echo $worker_info[0]['co_address']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('co_address') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('co_address'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('co_email') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Email:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="co_email" placeholder="enter name"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['co_email']; ?>" <?php }else{ ?> value="<?php echo $worker_info[0]['co_email']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('co_email') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('co_email'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form_heading">Visa Information</p>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('visa') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Visa:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="visa" placeholder="visa"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['visa']; ?>"<?php }else{ ?> value="<?php echo $worker_info[0]['visa_no']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('visa') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('visa'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('iqama') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Iqama:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="iqama" placeholder="visa"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['iqama']; ?>"<?php }else{ ?> value="<?php echo $worker_info[0]['iqama_no']; ?>" <?php } ?>
                                        />
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('iqama') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('iqama'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('iqama_profession') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Profession of iqama:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <select name="iqama_profession" id="iqama_profession" class="form-control input-sm" >
                                            <option selected value="<?php echo $worker_info[0]['ip_id']; ?>"><?php echo $worker_info[0]['ip_profession']; ?></option>
                                        </select>
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('iqama_profession') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('iqama_profession'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" >
                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('iqama_issue') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">Iqama Issue date:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm date" read name="iqama_issue" placeholder="jhone Doe"
                                            value="<?php echo date('d M Y', $worker_info[0]['iqama_issue_date']); ?>"
                                        />
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('iqama_issue') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('iqama_issue'); ?>
                                        </span>
                                        <?php } }?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('iqama_expiry') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">Iqama Expiry:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm date" name="iqama_expiry" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['iqama_expiry']; ?>" <?php }else{ ?> value="<?php echo date('d M Y', $worker_info[0]['iqama_expiry_date']); ?>" <?php } ?>
                                        />
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('iqama_expiry') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('iqama_expiry'); ?>
                                        </span>
                                        <?php } }?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('visa_category') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Visa Category:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <select name="visa_category" id="visa_category" class="form-control input-sm" >
                                            <option selected value="<?php echo $worker_info[0]['vc_id']; ?>" ><?php echo $worker_info[0]['vc_title']; ?></option>
                                        </select>
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('visa_category') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('visa_category'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12" >
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('insurance') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Insurance:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <select name="insurance"  class="form-control input-sm" >
                                            <option value="done" <?php if ($_POST){ echo set_select('insurance', 'done'); }elseif($worker_info[0]['isn_status'] == 'done'){ echo 'selected'; } ?> >Done</option>
                                            <option value="received" <?php if ($_POST){ echo set_select('insurance', 'received'); }elseif($worker_info[0]['isn_status'] == 'received'){ echo 'selected'; } ?> >Received</option>
                                            <option value="expired" <?php if ($_POST){ echo set_select('insurance', 'expired'); }elseif($worker_info[0]['isn_status'] == 'expired'){ echo 'selected'; } ?> >Expired</option>
                                            <option value="N/A" <?php if ($_POST){ echo set_select('insurance', 'N/A'); }elseif($worker_info[0]['isn_status'] == 'N/A'){ echo 'selected'; } ?> >N/A</option>
                                        </select>
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('insurance') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('insurance'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('pk_status') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Visa Status in Pakistan:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <select name="pk_status"  class="form-control input-sm" >
                                            <option value="">Select</option>
                                            <option value="medical" <?php if ($_POST){ echo set_select('pk_status', 'medical'); }elseif($worker_info[0]['vs_status'] == 'medical'){ echo 'selected'; } ?> >Medical</option>
                                            <option value="finger prints" <?php if ($_POST){ echo set_select('pk_status', 'finger prints'); }elseif($worker_info[0]['vs_status'] == 'prints'){ echo 'selected'; } ?> >Finger prints</option>
                                            <option value="character certificate" <?php if ($_POST){ echo set_select('pk_status', 'character certificate'); }elseif($worker_info[0]['vs_status'] == 'character certificate'){ echo 'selected'; } ?> >Character certificate</option>
                                            <option value="nicop" <?php if ($_POST){ echo set_select('pk_status', 'nicop'); }elseif($worker_info[0]['vs_status'] == 'nicop'){ echo 'selected'; } ?> >Nicop</option>
                                            <option value="probeter" <?php if ($_POST){ echo set_select('pk_status', 'probeter'); }elseif($worker_info[0]['vs_status'] == 'probeter'){ echo 'selected'; } ?> >Probeter</option>
                                            <option value="all done" <?php if ($_POST){ echo set_select('pk_status', 'all done'); }elseif($worker_info[0]['vs_status'] == 'all done'){ echo 'selected'; } ?> >All done</option>
                                        </select>
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('insurance') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('insurance'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('ksa_status') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Iqama Status in KSA:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <select name="ksa_status"  class="form-control input-sm" >
                                            <option value="done" <?php if ($_POST){ echo set_select('ksa_status', 'done'); }elseif($worker_info[0]['is_status'] == 'done'){ echo 'selected'; } ?> >Done</option>
                                            <option value="received" <?php if ($_POST){ echo set_select('ksa_status', 'received'); }elseif($worker_info[0]['is_status'] == 'received'){ echo 'selected'; } ?> >Received</option>
                                            <option value="expired" <?php if ($_POST){ echo set_select('ksa_status', 'expired'); }elseif($worker_info[0]['is_status'] == 'expired'){ echo 'selected'; } ?> >Expired</option>
                                            <option value="N/A" <?php if ($_POST){ echo set_select('ksa_status', 'N/A'); }elseif($worker_info[0]['is_status'] == 'N/A'){ echo 'selected'; } ?> >N/A</option>
                                        </select>
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('ksa_status') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('ksa_status'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group  <?php if($_POST){ if (form_error('iqama_received_by') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Iqama Received by:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <select name="iqama_received_by" id="ir_by" class="form-control input-sm" >
                                            <option value="">Select</option>
                                            <option value="care off" <?php if ($_POST){ echo set_select('iqama_received_by', 'care off'); }elseif($worker_info[0]['irb_received_by'] == 'care off'){ echo 'selected'; } ?> >Care Off</option>
                                            <option value="self" <?php if ($_POST){ echo set_select('iqama_received_by', 'self'); }elseif($worker_info[0]['irb_received_by'] == 'self'){ echo 'selected'; } ?> >Self</option>
                                            <option value="other" <?php if ($_POST){ echo set_select('iqama_received_by', 'other'); }elseif($worker_info[0]['irb_received_by'] == 'other'){ echo 'selected'; } ?> >Other</option>
                                        </select>
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('iqama_received_by') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('iqama_received_by'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('iqama_received_by_name') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">Name:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" id="ir_name" class="form-control input-sm" name="iqama_received_by_name" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['iqama_received_by_name']; ?>" <?php }else{ ?> value="<?php echo $worker_info[0]['irb_name']; ?>" <?php } ?>
                                        />
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('iqama_received_by_name') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('iqama_received_by_name'); ?>
                                        </span>
                                        <?php } }?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('iqama_received_by_city') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">City:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" id="ir_city" class="form-control input-sm" name="iqama_received_by_city" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['iqama_received_by_city']; ?>" <?php }else{ ?> value="<?php echo $worker_info[0]['irb_city']; ?>" <?php } ?>
                                        />
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('iqama_received_by_city') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('iqama_received_by_city'); ?>
                                        </span>
                                        <?php } }?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('iqama_received_by_phone') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">Phone:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" id="ir_phone" class="form-control input-sm" name="iqama_received_by_phone" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['iqama_received_by_city']; ?>"<?php }else{ ?> value="<?php echo $worker_info[0]['irb_phone']; ?>" <?php } ?>
                                        />
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('iqama_received_by_city') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('iqama_received_by_city'); ?>
                                        </span>
                                        <?php } }?>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <p class="form_heading">Kafeel Information</p>
                            <div class="col-md-4">
                                <div class="form-group  <?php if($_POST){ if (form_error('kafeel_code') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Kafeel Code:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <select name="kafeel_code" id="kafeel_code" class="form-control input-sm" >
                                            <option value="<?php echo $worker_info[0]['kafeel_code']; ?>" selected ><?php echo $worker_info[0]['kafeel_code']; ?></option>
                                        </select>
                                    </div>
                                    <?php
                                    if($_POST){
                                        if (form_error('kafeel_code') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('kafeel_code'); ?>
                                        </span>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form_heading">Description</p>
                            <div class="col-md-12">
                                <div class="form-group <?php if($_POST){ if(form_error('description') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">Description:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <textarea name="description" rows="4" class="form-control input-sm" ><?php if ($_POST){ echo set_value('description'); }else{echo $worker_info[0]['w_description']; } ?></textarea>
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('description') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('description'); ?>
                                        </span>
                                        <?php } }?>

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
