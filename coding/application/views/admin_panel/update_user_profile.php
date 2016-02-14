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
                if($this->session->userdata('loggedInUser') == 'admin'){ ?>
                <form  action="<?php echo $root; ?>admin_panel/update_user_profile/<?php echo $single_rec[0]['uid']; ?>" method="post">

                   <div class="form-body card-panel">
                       <?php if($update_success == 'yes'){ ?>
                           <div class="alert alert-success">
                               User updated! <br>
                               <a href="<?php echo $root; ?>admin_panel/user" >Click here to go back</a>
                           </div>
                       <?php } ?>


                       <?php if ($user_privilege == 'kafeel'){ ?>
                       <h1 class="form-section">Update kafeel</h1>
                       <br /> <br />
                       <?php

                       if ($data_saved == ''){ ?>
                        <div class="row">

                            <?php if($code_exist != ''){ ?>
                                <div class="alert alert-danger">
                                    Kafeel code is already used for other <br>
                                    kindly use another Code!
                                </div>
                            <?php } ?>

                            <div class="col-md-12">
                                <p class="form_heading">User Login Information</p>
                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <strong> <label class="control-label">Email:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                            <input type="email" class="form-control" name="email" placeholder="someone@example.com"
                                                value="<?php echo $single_rec[0]['email']; ?>" readonly
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <strong> <label class="control-label">Username:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                            <input type="text" class="form-control" name="username" placeholder=""
                                                   value="<?php echo $single_rec[0]['username']; ?>" readonly
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <strong> <label class="control-label">Password:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                            <input type="text" class="form-control" name="text" placeholder="Enter password"
                                                   value="" readonly
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="form_heading">User Basic Information</p>
                              <div class="col-md-4">
                               <div class="form-group <?php if($_POST){ if(form_error('fname') != '') { ?> has-error <?php } }?>" >
                                   <strong> <label class="control-label">First Name:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" class="form-control" name="fname" placeholder="jhone Doe"
                                               value="<?php if ($_POST){ echo $_POST['fname']; }elseif(!empty($join_rec)){ echo $join_rec[0]['fname']; }; ?>"
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
                                          <input type="text" class="form-control" name="lname" placeholder="Julian Lacoste"
                                                 value="<?php if ($_POST){ echo $_POST['lname']; }elseif(!empty($join_rec)){ echo $join_rec[0]['lname']; }; ?>"
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
                                    <div class="form-group <?php if($_POST){ if(form_error('code') != '') { ?> has-error <?php } }?>" >
                                        <strong> <label class="control-label">Kafeel Code:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                            <input type="text" class="form-control" name="code" placeholder="100321"
                                                   value="<?php if ($_POST){ echo $_POST['code']; }elseif(!empty($join_rec)){ echo $join_rec[0]['kafeel_code']; }; ?>"

                                            />
                                        </div>

                                        <?php if($_POST){

                                            if (form_error('code') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('code'); ?>
                                        </span>
                                            <?php } }?>

                                    </div>
                                </div>
                                </div>

                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group  <?php if($_POST){ if (form_error('cell_no') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Mobile No:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                            <input type="text" class="form-control" name="cell_no" placeholder="9232176543210"
                                                   value="<?php if ($_POST){ echo $_POST['cell_no']; }elseif(!empty($join_rec)){ echo $join_rec[0]['cell_number']; }; ?>"
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

                                <div class="col-md-4">
                                    <div class="form-group  <?php if($_POST){ if (form_error('office_no') != '') { ?> has-error <?php } } ?> " >
                                        <strong> <label class="control-label">Office No:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                            <input type="text" class="form-control" name="office_no" placeholder="9232176543210"
                                                   value="<?php if ($_POST){ echo $_POST['office_no']; }elseif(!empty($join_rec)){ echo $join_rec[0]['office_number']; }; ?>"
                                            />
                                        </div>
                                        <?php
                                        if($_POST){
                                            if (form_error('office_no') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('office_no'); ?>
                                        </span>
                                            <?php } } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group <?php if($_POST){ if(form_error('business') != '') { ?> has-error <?php } }?>" >
                                        <strong> <label class="control-label">Business Name:</label> </strong>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                            <input type="text" class="form-control" name="business" placeholder="business"
                                                   value="<?php if ($_POST){ echo $_POST['business']; }elseif(!empty($join_rec)){ echo $join_rec[0]['business_name']; }; ?>"
                                            />
                                        </div>

                                        <?php if($_POST){

                                            if (form_error('business') != '') { ?>
                                                <span class="help-block">
                                            <?php echo form_error('business'); ?>
                                        </span>
                                            <?php } }?>

                                    </div>
                                </div>
                            </div>

                           <div class="col-md-12">
                               <div class="col-md-6">
                                   <div class="form-group  <?php if($_POST){ if (form_error('website') != '') { ?> has-error <?php } } ?> " >
                                       <strong> <label class="control-label">Website:</label> </strong>
                                       <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                           <input type="text" class="form-control" name="website" placeholder="http://www.example.com"
                                                  value="<?php if ($_POST){ echo $_POST['website']; }elseif(!empty($join_rec)){ echo $join_rec[0]['website']; }; ?>"
                                           />
                                       </div>
                                       <?php
                                       if($_POST){
                                           if (form_error('website') != '') { ?>
                                               <span class="help-block">
                                            <?php echo form_error('website'); ?>
                                        </span>
                                           <?php } } ?>
                                   </div>
                               </div>
                            <div class="col-md-6">
                                  <div class="form-group <?php if($_POST){ if(form_error('city') != '') { ?> has-error <?php } }?>" >
                                      <strong> <label class="control-label">City:</label> </strong>
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                          <input type="text" class="form-control" name="city" placeholder="Abu dabi"
                                                 value="<?php if ($_POST){ echo $_POST['city']; }elseif(!empty($join_rec)){ echo $join_rec[0]['city']; }; ?>"
                                          />
                                      </div>

                                      <?php if($_POST){

                                          if (form_error('city') != '') { ?>
                                              <span class="help-block">
                                            <?php echo form_error('city'); ?>
                                        </span>
                                          <?php } }?>

                                  </div>
                                </div>



                            </div>

                            <div class="col-md-12">



                            <div class="col-md-12">
                                <div class="form-group  <?php if($_POST){ if (form_error('address') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Address:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control" name="address" placeholder="address"
                                               value="<?php if ($_POST){ echo $_POST['address']; }elseif(!empty($join_rec)){ echo $join_rec[0]['address']; }; ?>"
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

                                <div class="col-md-12">
                                <div class="form-group <?php if($_POST){ if (form_error('comment') != '') { ?> has-error <?php } } ?>" >
                                    <label class="control-label">Comments:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-comment"></i>
                                        </span>
                                        <textarea class="form-control" rows="4" name="comment" style="resize:none"><?php if ($_POST){ echo $_POST['comment']; }elseif(!empty($join_rec)){ echo $join_rec[0]['comment']; }; ?></textarea>


                                    </div>
                                    <?php
                                    if($_POST){
                                    if (form_error('comment') != '') { ?>
                                            <span class="help-block">
                                            <?php echo form_error('comment'); ?>
                                        </span>
                                    <?php } } ?>

                                </div>
                            </div>
                            </div>



                            <div class="col-md-2 col-md-offset-4">
                                <div class="form-actions right">
                                    <button type="reset" class="btn blue"><i class="fa fa-refresh"></i> Reset</button>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-1">
                                <div class="form-actions left">
                                    <button type="submit" class="btn blue"><i class="fa fa-check"></i>Submit</button>
                                </div>
                            </div>
                            </div>

                       <?php }else{ ?>
                           <div class="alert alert-success col-sm-8 col-md-offset-2" style="margin-top: 8%; margin-bottom: 10%;">
                               Kafeel updated successfuly ! <br>
                               <a href="<?php echo base_url(); ?>admin_panel/user" style="color:#2A7FFF" >Click here to Go Back</a>
                           </div>
                       <?php } }elseif($user_privilege == 'local_user'){ ?>

                           <h1 class="form-section">Add Local User</h1>
                           <br /> <br />
                           <?php

                           if ($data_saved == ''){ ?>
                               <div class="row">
                                   <?php if($code_exist != ''){ ?>
                                       <div class="alert alert-danger">
                                           CNIC is already used by other user <br>
                                           kindly use correct CNIC Number!
                                       </div>
                                   <?php } ?>

                                   <div class="col-md-12">
                                       <p class="form_heading">User Login Information</p>
                                       <div class="col-md-4">
                                           <div class="form-group" >
                                               <strong> <label class="control-label">Email:</label> </strong>
                                               <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="email" class="form-control" name="email" placeholder="someone@example.com"
                                                          value="<?php echo $single_rec[0]['email']; ?>" readonly
                                                   />
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-4">
                                           <div class="form-group" >
                                               <strong> <label class="control-label">Username:</label> </strong>
                                               <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="text" class="form-control" name="username" placeholder=""
                                                          value="<?php echo $single_rec[0]['username']; ?>" readonly
                                                   />
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-4">
                                           <div class="form-group" >
                                               <strong> <label class="control-label">Password:</label> </strong>
                                               <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="text" class="form-control" name="text" placeholder="Enter password"
                                                          value="" readonly
                                                   />
                                               </div>
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
                                                   <input type="text" class="form-control" name="fname" placeholder="jhone Doe"
                                                          value="<?php if ($_POST){ echo $_POST['fname']; }elseif(!empty($join_rec)){ echo $join_rec[0]['fname']; }; ?>"
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
                                                   <input type="text" class="form-control" name="lname" placeholder="Julian Lacoste"
                                                          value="<?php if ($_POST){ echo $_POST['lname']; }elseif(!empty($join_rec)){ echo $join_rec[0]['lname']; }; ?>"
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
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="number" class="form-control" name="cell_no" placeholder="9232176543210"
                                                          value="<?php if ($_POST){ echo $_POST['cell_no']; }elseif(!empty($join_rec)){ echo $join_rec[0]['cell_no']; }; ?>"
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
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="text" class="form-control" name="address" placeholder="address"
                                                          value="<?php if ($_POST){ echo $_POST['address']; }elseif(!empty($join_rec)){ echo $join_rec[0]['address']; }; ?>"
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
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="number" class="form-control" name="cnic" placeholder="350122222222 must be 13 chractor"
                                                          value="<?php if ($_POST){ echo $_POST['cnic']; }elseif(!empty($join_rec)){ echo $join_rec[0]['cnic']; }; ?>"
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
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="text" class="form-control" name="experience" placeholder="enter experience"
                                                          value="<?php if ($_POST){ echo $_POST['experience']; }elseif(!empty($join_rec)){ echo $join_rec[0]['experience']; }; ?>"
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
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="number" class="form-control" name="salary" placeholder="enter salary in numbers"
                                                          value="<?php if ($_POST){ echo $_POST['salary']; }elseif(!empty($join_rec)){ echo $join_rec[0]['salary']; }; ?>"                                                   />
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
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="text" class="form-control" name="education" placeholder="address"
                                                          value="<?php if ($_POST){ echo $_POST['education']; }elseif(!empty($join_rec)){ echo $join_rec[0]['education']; }; ?>"                                                   />
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
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="text" class="form-control" name="reference" placeholder="enter name"
                                                          value="<?php if ($_POST){ echo $_POST['reference']; }elseif(!empty($join_rec)){ echo $join_rec[0]['reference_by']; }; ?>"                                                   />
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
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                                   <input type="text" class="form-control date" name="date_join" placeholder="address"
                                                          value="<?php if ($_POST){ echo $_POST['date_join']; }elseif(!empty($join_rec)){ echo date('d M Y', $join_rec[0]['date_join']); }; ?>"                                                   />
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
