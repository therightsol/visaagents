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
                <form  action="<?php echo $root; ?>Login" method="post">
                                                        
                   <div class="form-body">
                       <h1 class="form-section">Login Here</h1>
                       <br /> <br />
                       <?php if($this->session->userdata('loggedInUser') == ''){ ?>
                                    <div class="row">
                                        <div class="col-md-5 col-md-offset-3">
                                             <?php if ($record_found != '') { ?>
                                    <strong> <span class=" text-danger">
                                                Sorry! User name or password is Incorrect. Please try again 
                                        </span></strong>
                                        <?php }
                                        if ($is_admin_approved != '') { ?>
                                            <div class="alert alert-info">
                                                Sorry! Your account is not active <br>
                                                Kindly wait for admin approval <strong>or</strong> send us email
                                                <a href="<?php echo $root; ?>contact">here</a>
                                            </div>
                                            <?php }
                                            if ($is_email_approved != '') { ?>
                                            <div class="alert alert-info">
                                                Sorry! Your Email Address is not verified <br>
                                                Kindly Verify you email address!
                                            </div>
                                            <?php } ?>
                                           <div class="form-group <?php if($_POST){ if (form_error('email') != '' || $record_found != '') { ?> has-error <?php } } ?> " >
                                              
                                               
                                               <strong> <label class="control-label">Email:</label> </strong>
                                               
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <input type="email" class="form-control" name="email" placeholder="mail@example.com" 
                                                           <?php if ($_POST) { ?> value="<?php echo $_POST['email']; ?>" <?php } ?>
                                                           />
                                                          
                                                           
                                                </div> 
                                               <?php
                                               if($_POST){
                                               if (form_error('email') != '') { ?>
                                                    <span class="help-block">
                                                        <?php echo form_error('email'); ?>
                                                    </span>
                                                <?php } }?>
                                                
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
                                             <div class="col-md-2 col-md-offset-9">
                                            
                                           <div class="form-group" > 
                                               
                                                <div class="input-group">
                                             <input type="submit" class="btn-system" value="Login">
                                                </div>
                                           </div>
                                        </div>
                                             <div>
                                                 <a href="<?php echo $root; ?>reset_password" >Forgotten password?</a>
                                             </div>
                                    </div>

                   </div>
                       <?php }else{ ?>
                           <div class="alert alert-danger col-sm-8 col-md-offset-2" style="margin-top: 8%; margin-bottom: 10%;">
                               You are already logged in!<br>
                           </div>
                       <?php } ?>
                </form>
            </div>
        </div>
    </div>
    </div>
       
    <br /><br /><br /><br />
</body>
   <?php include 'includes/footer.php'; ?>
