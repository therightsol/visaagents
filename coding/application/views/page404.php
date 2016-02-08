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
    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="page-content">
                <div class="error-page">
                    <h1>404</h1>
                    <h3>File not Found</h3>
                    <p>We're sorry, but the page you were looking for doesn't exist.</p>
                    <div class="text-center"><a href="<?php echo $root; ?>" class="btn-system btn-small">Back To Home</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
<?php include 'includes/footer.php'; ?>