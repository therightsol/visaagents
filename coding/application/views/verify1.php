<html lang="en">
   <?php include 'includes/header.inc'; ?> 
</head>

<body class="default">
    <div id="wrapper" >
<div id="overlay" class="overlay"></div>
<?php include 'includes/header_second.inc'	?>


<figure id="masthead">
	<img src="<?php echo $root; ?>foxtons-static.global.ssl.fastly.net/img/masthead/blur_15.jpg" class="photo" alt="">
</figure> 


<div id="content_holder" class="content_holder">
	<div id="content" class="content sub_holder custom_content_holder">
	
	<a href="#section_nav" id="submenu_link" style="float:right;">Menu</a>


	<h1 style="color:#7FAAFF">Reset your password</h1>
 
	
 

<?php  
    $email = $this->session->userdata('email');
    $isempty = empty($email);
    if ($isempty) {     // if user is not loggedint only then user can reset password. so,
?>

<div class="container">
            <div class="row">
                 
                    <div class="col-md-8 col-md-offset-2">
                           <?php if ($email_verify != 'yes'){
                          if($email_alredy_verified != ''){ ?>
                        <div class="alert alert-success">
                            Your email address Already verified.
                        </div>
                        
                          <?php }
                         if($base_enc_username == 'yes'){ ?>
                        <div class="alert alert-danger">
                            Email not verified because of some internal error. ERROR #1001
                        </div>
                        <?php } 
                        
                        if($uid_empty == 'yes'){ ?>
                        
                        <div class="alert alert-danger">
                            Email not verified because of some internal error. ERROR #1002
                        </div>
                        
                        <?php } 
                        
                        if($user_notfound == 'yes') { ?>
                        <div class="alert alert-danger">
                            Email not verified because of some internal error. ERROR #1003
                        </div>
                        <?php }
                        }else{ ?>
                         <div class="alert alert-success">
                            Your email have been successfully verified.
                        </div>
                        <?php } ?>   
                         
                    </div> 
                 
            </div>
        </div> 
     

    
    
     
 
    <?php }else{ ?> <!-- empty($loggedInUser) closed -->
    <br />
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="alert alert-danger">
                    You are not authorized to access this page.
                    <br />
                    <strong> Reason : </strong>You are currently logged in. 
                </div>
            </div>
        </div>
    </div> 
    <br />
    
    <?php } ?> <!-- ELSE Part for empty($loggedInUser) -->
    
    </div> <!-- class wrapper closed -->  
         

    <?php include 'includes/footer.inc'; ?>
    <script>
        $('input').keyup(function(){
            //console.log($(this).parent());
            var $this = $(this);
            
            if($this.attr('id') === 'email'){
                var regExp = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                if (regExp.test($this.val())){
                    // Do whatever if it passes.
                    $this.parents('.form-group').removeClass('has-error').children('.help-block').remove(); 
                }else{
                    // Do whatever if it fails.
                    if(!$this.parents('.form-group').hasClass('has-error')){
                        $this.parents('.form-group').addClass('has-error').append('<span class="help-block">Enter a valid email address.</span>'); 
                    }
                } 
            }else if($this.attr('id') === 'password'){
                var regExp = /^((?=.*\d)(?=.*[A-Z])(?=.*\W).{8,})$/;
                
                var result = regExp.test($this.val());
                //console.log(result);
                
                if(result === true){
                    $this.parents('.form-group').removeClass('has-error').children('.help-block').hide('slow', function(){$this.parents('.form-group').children('.help-block').remove();});
                }else{
                    if(!$this.parents('.form-group').hasClass('has-error')){
                            $this.parents('.form-group').addClass('has-error')
                                    .append('<span class="help-block"><ul><li> Password should contains at least 8 characters.</li><li> Password should contains at least 1 number.</li><li> Password should contains at least 1 uppercase letter.</li><li> Password should contains at least 1 special character.</li><li> Password should matched with Re-type password field.</li></ul></span>'); 
                    }
                }
            }else if($this.attr('id') === 'conf_password'){
                var password = $('#password').val(); 
                
                if($this.val() !== password){
                    if(!$this.parents('.form-group').hasClass('has-error')){
                        $this.parents('.form-group').addClass('has-error').append('<span class="help-block">Password not match.</span>'); 
                    }
                }else{
                    $this.parents('.form-group').removeClass('has-error').children('.help-block').remove();
                }
            } 
        });
        
        
        $('#reset').click(function(){
            $('.help-block').remove();
            $('.form-group').removeClass('has-error');
        });
       
        
        $(':input').inputmask();  
        
         
        $(function(){
          $('#password').passwordstrength({
                    'minlength': 8,
                    'number'   : true,
                    'capital'  : true,
                    'special'  : true,
                    'labels'   : {
                            'general'   : 'The password must have :',
                            'minlength' : 'At leaset {{minlength}} characters',
                            'number'    : 'At least one number',
                            'capital'   : 'At least one uppercase letter',
                            'special'   : 'At least one special character'
                }   
            }); 
        });
        
            
    </script> 
</body>
</html>