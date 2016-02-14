<?php include 'includes/header.php' ; ?>
<?php include 'includes/top_header.php' ; ?>
<style>
    .form-control{
        -webkit-border-radius:0;
        -moz-border-radius: 0;
        border-radius: 0;
    }
</style>
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
                <form  action="<?php echo $root; ?>add_worker" method="post">

                   <div class="form-body card-panel">
                       <?php
                       if($loggedInUser == 'admin' || $loggedInUser == 'local_user'){ ?>
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
                                               <?php if ($_POST) { ?> value="<?php echo $_POST['fname']; ?>" <?php } ?>
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
                                              <?php if ($_POST) { ?> value="<?php echo $_POST['lname']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['cnic']; ?>" <?php } ?>
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
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['passport']; ?>" <?php } ?>
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
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['phone']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['address']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['dob']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['city']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['country']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['co_name']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['co_city']; ?>" <?php } ?>
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
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['co_phone']; ?>" <?php } ?>
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
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['co_city']; ?>" <?php } ?>
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
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['co_email']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['visa']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['iqama']; ?>" <?php } ?>
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
                                            <select name="iqama_profession" id="iqama_profession" class="form-control input-sm" ></select>
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
                                            <input type="text" class="form-control input-sm date" name="iqama_issue" placeholder="jhone Doe"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['iqama_issue']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['iqama_expiry']; ?>" <?php } ?>
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
                                            <select name="visa_category" id="visa_category" class="form-control input-sm" ></select>
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
                                                <option value="done" <?php if ($_POST){ echo set_select('insurance', 'done'); }; ?>>Done</option>
                                                <option value="received" <?php if ($_POST){ echo set_select('insurance', 'received'); }; ?>>Received</option>
                                                <option value="expired" <?php if ($_POST){ echo set_select('insurance', 'expired'); }; ?>>Expired</option>
                                                <option value="N/A" <?php if ($_POST){ echo set_select('insurance', 'N/A'); }; ?>>N/A</option>
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
                                                <option value="medical" <?php if ($_POST){ echo set_select('pk_status', 'medical'); }; ?>>Medical</option>
                                                <option value="finger prints" <?php if ($_POST){ echo set_select('pk_status', 'finger prints'); }; ?>>Finger prints</option>
                                                <option value="character certificate" <?php if ($_POST){ echo set_select('pk_status', 'character certificate'); }; ?>>Character certificate</option>
                                                <option value="nicop" <?php if ($_POST){ echo set_select('pk_status', 'nicop'); }; ?>>Nicop</option>
                                                <option value="probeter" <?php if ($_POST){ echo set_select('pk_status', 'probeter'); }; ?> >Probeter</option>
                                                <option value="all done" <?php if ($_POST){ echo set_select('pk_status', 'all done'); }; ?> >All done</option>
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
                                                <option value="done" <?php if ($_POST){ echo set_select('ksa_status', 'done'); }; ?>>Done</option>
                                                <option value="received" <?php if ($_POST){ echo set_select('ksa_status', 'received'); }; ?>>Received</option>
                                                <option value="expired" <?php if ($_POST){ echo set_select('ksa_status', 'expired'); }; ?>>Expired</option>
                                                <option value="N/A" <?php if ($_POST){ echo set_select('ksa_status', 'N/A'); }; ?>>N/A</option>
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
                                            <option value="care off" <?php if ($_POST){ echo set_select('iqama_received_by', 'care off'); }; ?>>Care Off</option>
                                            <option value="self" <?php if ($_POST){ echo set_select('iqama_received_by', 'self'); }; ?>>Self</option>
                                            <option value="other" <?php if ($_POST){ echo set_select('iqama_received_by', 'other'); }; ?>>Other</option>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['iqama_received_by_name']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['iqama_received_by_city']; ?>" <?php } ?>
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
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['iqama_received_by_city']; ?>" <?php } ?>
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
                                            <select name="kafeel_code" id="kafeel_code" class="form-control input-sm" ></select>
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
                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('payment') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">Total Payment Agreed:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="payment" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['payment']; ?>" <?php } ?>
                                        />
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('payment') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('payment'); ?>
                                        </span>
                                        <?php } }?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('payment_expense') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">Total Visa Expense:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" class="form-control input-sm" name="payment_expense" placeholder="jhone Doe"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['payment_expense']; ?>" <?php } ?>
                                        />
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('payment_expense') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('payment_expense'); ?>
                                        </span>
                                        <?php } }?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group <?php if($_POST){ if(form_error('final_status') != '') { ?> has-error <?php } }?>" >
                                    <strong> <label class="control-label">Final Visa Status:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <select name="final_status"  required class="form-control input-sm" >
                                            <option value="">Select</option>
                                            <option value="transferred" <?php if ($_POST){ echo set_select('final_status', 'transferred'); }; ?>>Transferred</option>
                                            <option value="with kafeel" <?php if ($_POST){ echo set_select('final_status', 'with kafeel'); }; ?>>With kafeel</option>
                                            <option value="still with us" <?php if ($_POST){ echo set_select('final_status', 'still with us'); }; ?>>Still with us</option>
                                        </select>
                                    </div>

                                    <?php if($_POST){

                                        if (form_error('final_status') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('final_status'); ?>
                                        </span>
                                        <?php } }?>

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
                                            <textarea name="description" rows="4" class="form-control input-sm" ><?php if ($_POST){ echo set_value('description'); } ?></textarea>
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
                </form>
                <?php }else{ ?>
                    <div class="alert alert-success col-sm-8 col-md-offset-2" style="margin-top: 8%; margin-bottom: 10%;">
                        Local User added successfuly ! <br>
                        <a href="<?php echo base_url(); ?>add_local_user" style="color:#2A7FFF" >Click here to Go Back</a>
                    </div>
                <?php }
                 }else{ ?>
                    <div class="alert alert-danger col-sm-8 col-md-offset-2" style="margin-top: 8%; margin-bottom: 10%;">
                        You do not have sufficient permissions to access this page
                        <br />  <br /> <br />
                        <a href="<?php echo base_url(); ?>home" style="color:#2A7FFF" > Go Back to Home</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
       
    <br /><br /><br /><br />
</body>
<script>
    $(document).ready(function () {
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
   <?php include 'includes/footer.php'; ?>
