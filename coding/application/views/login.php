<?php include 'includes/header.php' ; ?>
<?php include 'includes/top_header.php' ; ?>
<?php include 'includes/logo_and_menu.php' ; ?>
<body>
    <div class="container" >
        <div class="row" >  
            <div class="col-md-12"> 
                <form  action="<?php echo $root; ?>Login" method="post">
                                                        
                   <div class="form-body">
                       <h1 class="form-section">Login Here</h1>
                       <br /> <br />
                                    <div class="row">
                                        <div class="col-md-5 col-md-offset-3">
                                             <?php if ($userfound == 'no' || $password_found == 'no') { ?>
                                    <strong> <span class=" text-danger">
                                                Sorry! User name or password is Incorrect. Please try again 
                                        </span></strong>
                                        <?php } ?>
                                           <div class="form-group <?php if($_POST){ if (form_error('username') != '' || $userfound == 'no') { ?> has-error <?php } } ?> " > 
                                              
                                               
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
                                    </div>

                   </div>
                </form>
            </div>
        </div>
    </div>
    </div>
       
    <br /><br /><br /><br />
</body>
   <?php include 'includes/footer.php'; ?>
