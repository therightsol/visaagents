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
                <form  action="<?php echo $root; ?>admin_panel/add_kafeel" method="post">

                   <div class="form-body">
                       <?php
                       if($this->session->userdata('loggedInUser') == 'admin'){ ?>
                       <h1 class="form-section">Add new kafeel</h1>
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
                              <div class="col-md-6">
                               <div class="form-group <?php if($_POST){ if(form_error('fname') != '') { ?> has-error <?php } }?>" >
                                   <strong> <label class="control-label">First Name:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        <input type="text" class="form-control" name="fname" placeholder="jhone Doe"
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
                                          <input type="text" class="form-control" name="lname" placeholder="Julian Lacoste"
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
                                  <div class="form-group <?php if($_POST){ if(form_error('city') != '') { ?> has-error <?php } }?>" >
                                      <strong> <label class="control-label">City:</label> </strong>
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                          <input type="text" class="form-control" name="city" placeholder="Abu dabi"
                                              <?php if ($_POST) { ?> value="<?php echo $_POST['city']; ?>" <?php } ?>
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


                            <div class="col-md-6">
                                  <div class="form-group <?php if($_POST){ if(form_error('code') != '') { ?> has-error <?php } }?>" >
                                      <strong> <label class="control-label">Kafeel Code:</label> </strong>
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                          <input type="text" class="form-control" name="code" placeholder="100321"
                                              <?php if ($_POST) { ?> value="<?php echo $_POST['code']; ?>" <?php } ?>
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
                            <div class="col-md-6">
                                  <div class="form-group <?php if($_POST){ if(form_error('business') != '') { ?> has-error <?php } }?>" >
                                      <strong> <label class="control-label">Business Name:</label> </strong>
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                          <input type="text" class="form-control" name="business" placeholder="business"
                                              <?php if ($_POST) { ?> value="<?php echo $_POST['business']; ?>" <?php } ?>
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



                            <div class="col-md-6">
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
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['website']; ?>" <?php } ?>
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
                                <div class="form-group  <?php if($_POST){ if (form_error('address') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Address:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
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
                                <div class="form-group  <?php if($_POST){ if (form_error('cell_no') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Mobile No:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control" name="cell_no" placeholder="9232176543210"
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
                                <div class="form-group  <?php if($_POST){ if (form_error('office_no') != '') { ?> has-error <?php } } ?> " >
                                    <strong> <label class="control-label">Office No:</label> </strong>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="text" class="form-control" name="office_no" placeholder="9232176543210"
                                            <?php if ($_POST) { ?> value="<?php echo $_POST['office_no']; ?>" <?php } ?>
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
                            </div>

                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group <?php if($_POST){ if (form_error('comment') != '') { ?> has-error <?php } } ?>" >
                                    <label class="control-label">Comments:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-comment"></i>
                                        </span>
                                        <textarea class="form-control" rows="10" name="comment" style="resize:none"><?php if($_POST){ echo $_POST['comment']; } ?></textarea>


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
                </form>
                <?php }else{ ?>
                    <div class="alert alert-success col-sm-8 col-md-offset-2" style="margin-top: 8%; margin-bottom: 10%;">
                        Kafeel added successfuly ! <br>
                        <a href="<?php echo base_url(); ?>add_kafeel" style="color:#2A7FFF" >Click here to Go Back</a>
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
   <?php include '/../includes/footer.php'; ?>
