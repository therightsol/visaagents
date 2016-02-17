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
                   
                <h1 class="page-header">Terms & Conditions</h1>
                    <h3>  These are the minimum terms and conditions set by the Govt. of Pakistan.</h3>
 <br /> <br />
                <ul>
                    
                    <li>1. Period of Contract Minimum one year. </li>
                    <li>2. Probation Period 90 days or as per the labor laws of the country. </li>
                    <li>3. Daily Working Hours 8 hours per day, maximum 12 hours per day with additional 4 hours paid as overtime. </li>
                    <li>4. Weekly Working Days 6 days per week, paid holiday.</li>
                    <li>5. Weekly Rest Day At least 1 day per week. </li>
                    <li>6. Rate of Overtime As per labor laws of host country or minimum 1.50 times of basic salary per hour. </li>
                    <li>7. Accommodation Free of cost bachelor accommodation (not tents) must be provided by employer with electricity, water, gas and bedding. </li>
                    <li>8. Messing Facilities Free food or 25% of basic pay to be paid in lieu of free food for unskilled, semi-skilled and skilled workers. This provision of free food is not applicable to U.A.E. and Bahrain. </li>
                    <li>9. Medical Facilities Free, to be provided by the employer. </li>
                    <li>10. Transportation Free transport is to be provided by the employer from residence to work place. </li>
                    <li>11. Passage  Economy class by air from place of hire to place of employment and back on expiry of contract. It is to be provided by the employer, if not included in the salary, which should be in addition to the minimum wages laid down. </li>
                    <li>12. Vacation leave per year as per labor laws of the host country. </li>
                    <li>13. Illness leave per year  As per labor laws of the host country. </li>
                    <li>14. Social Security / Insurance  Employment to be covered at the cost of the employer according to the labor laws. </li>
                    <li>15. Dead Bodies Dispatch to dead bodies or evacuation due to serious injury will be made to Pakistan at employer’s expenses. </li>
                </ul>
                
            </div> </div> </div>    
                
    <br /><br /><br /><br />
</body>
   <?php include 'includes/footer.php'; ?>
