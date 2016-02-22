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
            <div class="col-md-12" style="padding-top: 5%">
                <form  action="<?php echo $root; ?>track_applications" method="post">
                                                        
                   <div class="form-body">
                       <h1 class="form-section">Track Application Status</h1>
                       <br /> <br />
                       <?php if ($record_found != 'yes') { ?>
                                    <div class="row">
                                        <div class="col-md-5 col-md-offset-3">

                                        <?php
                                        if ($record_found == 'no') { ?>
                                            <div class="alert alert-info">
                                                Sorry! No Record Found <br>
                                                If you think this is a mistake Kindly contact us
                                                <a href="<?php echo $root; ?>contact">contact us</a>
                                            </div>
                                            <?php } ?>
                                           <div class="form-group <?php if($_POST){ if (form_error('cnic') != '' || $record_found != '') { ?> has-error <?php } } ?> " >
                                              
                                               
                                               <strong> <label class="control-label">Enter Your CNIC #:</label> </strong>
                                               
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-asterisk"></i>
                                                    </span> 
                                                    <input type="text" class="form-control" name="cnic" placeholder=" CNIC Number"
                                                           <?php if ($_POST) { ?> value="<?php echo $_POST['cnic']; ?>" <?php } ?>
                                                           />
                                                          
                                                           
                                                </div> 
                                               <?php
                                               if($_POST){
                                               if (form_error('cnic') != '') { ?>
                                                    <span class="help-block">
                                                        <?php echo form_error('cnic'); ?>
                                                    </span>
                                                <?php } }?>
                                                
                                            </div>
                                            <div class="form-group" >

                                                <div class="col-xs-6 col-xs-offset-5">
                                                    <div class="input-group">
                                                        <input type="submit" class="btn-system" value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        </div>

                       <?php }else{ ?>
                           <div class="z-depth-1 col-md-8 col-md-offset-2" style="font-size: 20px; color: #469042; margin-bottom: 4%; padding: 3%; font-weight: 600;">
                               <?php
                                    echo $worker_info[0]['as_status'];
                               ?>
                           </div>
                       <?php } ?>
                       </div>
                </form>
            </div>
        </div>
    </div>
    <br /><br /><br /><br />
   <?php include 'includes/footer.php'; ?>
