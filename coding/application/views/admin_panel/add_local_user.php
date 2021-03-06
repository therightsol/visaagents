<?php include '/../includes/header.php'; ?>
<?php include '/../includes/top_header.php'; ?>

<?php
$loggedInUser = $this->session->userdata('loggedInUser');

// change menu according to privillages

if($loggedInUser == 'admin'){
    include '/../includes/admin_menu.php';
}else if($loggedInUser == 'local_user'){
    include '/../includes/local_user_menu.php';
}else if($loggedInUser == 'kafeel'){
    include '/../includes/kafeel_menu.php';
} else {
    include '/../includes/anonymous_menu.php';
} ?>
<body>
    <div class="container" >
        <div class="row" >  
            <div class="col-md-12">
                <?php
                if($loggedInUser == 'admin' || $loggedInUser == 'local_user'){ ?>
                <form  action="<?php echo $root; ?>admin_panel/add_local_user" method="post">

                   <div class="form-body">

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
                            <?php if($email_exist != ''){ ?>
                                <div class="alert alert-danger">
                                    User Email is already used for other <br>
                                    kindly use another email!
                                </div>
                            <?php } ?>
                            <?php if($user_exist != ''){ ?>
                                <div class="alert alert-danger">
                                    Username is already used for other <br>
                                    kindly use another username!
                                </div>
                            <?php } ?>
                            <div class="col-md-12">
                                <p class="form_heading">User Login Information</p>
                                <div class="col-md-4">
                                    <div class="form-group  <?php if($_POST){ if (form_error('username') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Username:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                            <input type="text" class="form-control" name="username" placeholder="Enter username"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['username']; ?>" <?php } ?>
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('username') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('username'); ?>
                                        </span>
                                            <?php } } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group  <?php if($_POST){ if (form_error('email') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Email:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                            <input type="email" class="form-control" name="email" placeholder="someone@example.com"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['email']; ?>" <?php } ?>
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('email') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('email'); ?>
                                        </span>
                                            <?php } } ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group  <?php if($_POST){ if (form_error('password') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Password:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                            <input type="text" class="form-control" name="password" placeholder="Enter password"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['password']; ?>" <?php } ?>
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('password') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('password'); ?>
                                        </span>
                                            <?php } } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="form_heading">User Basic Information</p>
                              <div class="col-md-6">
                               <div class="form-group <?php if($_POST){ if(form_error('fname') != '') { ?> has-error <?php } }?>" >
                                   <strong> <label class="control-label">First Name:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" class="form-control" name="fname" placeholder="Enter Name"
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


                            <div class="col-md-6">
                                  <div class="form-group <?php if($_POST){ if(form_error('lname') != '') { ?> has-error <?php } }?>" >
                                      <strong> <label class="control-label">Last Name:</label> </strong>
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                          <input type="text" class="form-control" name="lname" placeholder="Enter Last Name"
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
                                </div>


                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group  <?php if($_POST){ if (form_error('cell_no') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Mobile No:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-mobile"></i>
                                        </span>
                                            <input type="number" class="form-control" name="cell_no" placeholder="9232176543210"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['cell_no']; ?>" <?php } ?>
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('cell_no') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('cell_no'); ?>
                                        </span>
                                            <?php } } ?>
                                    </div>
                                </div>

                            <div class="col-md-6">
                                <div class="form-group  <?php if($_POST){ if (form_error('address') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Address:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-globe"></i>
                                        </span>
                                        <input type="text" class="form-control" name="address" placeholder="address"
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
                                <div class="col-md-6">
                                    <div class="form-group  <?php if($_POST){ if (form_error('cnic') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">CNIC No:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-list"></i>
                                        </span>
                                            <input type="number" class="form-control" name="cnic" placeholder="350122222222 must be 13 chractor"
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

                                <div class="col-md-6">
                                    <div class="form-group  <?php if($_POST){ if (form_error('experience') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Experience:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-chevron-right"></i>
                                        </span>
                                            <input type="text" class="form-control" name="experience" placeholder="enter experience"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['experience']; ?>" <?php } ?>
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('experience') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('experience'); ?>
                                        </span>
                                            <?php } } ?>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group  <?php if($_POST){ if (form_error('salary') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Salary:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </span>
                                            <input type="number" class="form-control" name="salary" placeholder="enter salary in numbers"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['salary']; ?>" <?php } ?>
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('salary') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('salary'); ?>
                                        </span>
                                            <?php } } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  <?php if($_POST){ if (form_error('education') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Education:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-book"></i>
                                        </span>
                                            <input type="text" class="form-control" name="education" placeholder="Education"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['education']; ?>" <?php } ?>
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('education') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('education'); ?>
                                        </span>
                                            <?php } } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group  <?php if($_POST){ if (form_error('reference') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Reference By:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-chevron-right"></i>
                                        </span>
                                            <input type="text" class="form-control" name="reference" placeholder="enter  name"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['reference']; ?>" <?php } ?>
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('reference') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('reference'); ?>
                                        </span>
                                            <?php } } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  <?php if($_POST){ if (form_error('date_join') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Join Date:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                            <input type="text" class="form-control date" name="date_join" placeholder="Join Date"
                                                <?php if ($_POST) { ?> value="<?php echo $_POST['date_join']; ?>" <?php } ?>
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('date_join') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('date_join'); ?>
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
                               Local User added successfuly ! <br>
                               <a href="<?php echo base_url(); ?>add_local_user" style="color:#2A7FFF" >Click here to Go Back</a>
                           </div>
                       <?php } ?>
                       </div>
                </form>
                <?php
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
       
    <br /><br /><br /><br />
</body>
   <?php include '/../includes/footer.php'; ?>
