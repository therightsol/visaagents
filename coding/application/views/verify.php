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




    <?php
    $email = $this->session->userdata('email');
    $isempty = empty($email);
    if ($isempty) {     // if user is not loggedint only then user can reset password. so,
        ?>

        <div class="container">
            <div class="row">

                <h1 style="color:#7FAAFF; margin-bottom: 14%">Verify Email Address</h1>

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

</div>
       
    <br /><br /><br /><br />
</body>
   <?php include 'includes/footer.php'; ?>
