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
                <form  action="<?php echo $root; ?>Register" method="post">

                   <div class="form-body">

                       <h1 class="form-section">Register Here</h1>
                       <br /> <br />
                       <?php
                       if($this->session->userdata('loggedInUser') == ''){
                       if ($data_saved == ''){ ?>
                                    <div class="row">
                                          <div class="col-md-5 col-md-offset-3">
                                            
                                           <div class="form-group <?php if($_POST){ if(form_error('username') != '' || $user_found == 'yes') { ?> has-error <?php } }?>" > 
                                               <strong> <label class="control-label">User Name:</label> </strong>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <input type="text" class="form-control" name="username" placeholder="jhone Doe"
                                                           <?php if ($_POST) { ?> value="<?php echo $_POST['username']; ?>" <?php } ?>
                                                           />
                                                          
                                                           
                                                </div> 
                                               <?php if($_POST){
                                                   
                                               if (form_error('username') != '') { ?>
                                                    <span class="help-block">
                                                        <?php echo form_error('username'); ?>
                                                    </span>
                                                <?php } ?>
                                                <?php if ($user_found == 'yes') { ?>
                                                    <span class="help-block">
                                                        Sorry! username already taken. <br />
                                                        Kindly choose another one.
                                                    </span>
                                                <?php } }?>
                                                
                                            </div>  
                                            
                                            
                                        </div>
                                        <div class="col-md-5 col-md-offset-3">
                                            
                                           <div class="form-group  <?php if($_POST){ if (form_error('email') != '' || $email_found == 'yes') { ?> has-error <?php } } ?> " > 
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
                                                <?php } ?>
                                                <?php if ($email_found == 'yes') { ?>
                                                    <span class="help-block">
                                                        Sorry! email already exists. <br />
                                                        Kindly choose another one.
                                                    </span>
                                               <?php } } ?>
                                                
                                            </div>  
                                            
                                            
                                        </div>
                                         <div class="col-md-5 col-md-offset-3">
                                            
                                           <div class="form-group <?php if ($_POST){ if(form_error('password') != '') { ?> has-error <?php } } ?>" > 
                                               <strong> <label class="control-label">Password:</label> </strong>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-key"></i>
                                                    </span> 
                                                    <input type="password" class="form-control" name="password"  placeholder="Enter Your Password Here"/>
                                                          
                                                           
                                                </div> 
                                                <?php if($_POST){
                                                if (form_error('password') != '') { ?>
                                                        <span class="help-block">
                                                            <?php echo form_error('password'); ?>
                                                        </span>
                                                <?php } }?>
                                                
                                            </div> 
                                             <div class="form-group <?php if ($_POST){ if(form_error('re-password') != '') { ?> has-error <?php } } ?>" > 
                                               <strong> <label class="control-label">Re-Password:</label> </strong>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-key"></i>
                                                    </span> 
                                                    <input type="password" class="form-control" name="re-password"  placeholder="Enter Your Password Again"/>
                                                          
                                                           
                                                </div> 
                                                <?php if($_POST){
                                                if (form_error('re-password') != '') { ?>
                                                        <span class="help-block">
                                                            <?php echo form_error('re-password'); ?>
                                                        </span>
                                                <?php } } ?>
                                                
                                            </div> 
                                             <div class="col-md-2 col-md-offset-9">
                                            
                                           <div class="form-group" > 
                                               
                                                <div class="input-group">
                                             <input type="submit" class="btn-system" value="Register">
                                                </div>
                                           </div>
                                        </div>
                                    </div>

                   </div>
                </form>
                <?php }else{ ?>
                    <div class="alert alert-success col-sm-8 col-md-offset-2" style="margin-top: 8%; margin-bottom: 10%;">
                        Register Successfully kindly wait for admin approval!
                    </div>
                <?php }
                 }else{ ?>
                    <div class="alert alert-danger col-sm-8 col-md-offset-2" style="margin-top: 8%; margin-bottom: 10%;">
                        You are already registered!<br>
                        Can not register again..
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
       
    <br /><br /><br /><br />
</body>
   <?php include 'includes/footer.php'; ?>
