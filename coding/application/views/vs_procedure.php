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
                   
                <h2 class="page-header">Visa Process</h2>
                
                <h4>OUR GUESTS FEEL THEM AT LEISURE AND HOMELY ATMOSPHERE WHILE STAYING WITH US.</h4>
 
we are in a favor of selecting candidates through employer representatives in the event that we are entrusted with the responsibilities, we shall certainly ensure proper selection in accordance with the requirements set up by the employer's through our qualified staff.
 
The services of technical institutions will be employed for the purpose of testing highly technical trade. On behalf of the clients, we also provide the following services.
 <br /> <br /> 
<h4> PERMISSION FROM THE PROTECTOR: </h4>
After Receiving Manpower requirements, we seek permission from Protector of Emigrants.
 <br /> <br /> 
<h4>ADVERTISING: </h4>
Job facilities are advertised in widely circulated daily newspapers.
 <br /> <br /> 
<h4>INTERVIEW / TRADE TEST:</h4> 
After short listing the applications, for interviews and trade test. Candidate's skill is tested practically to evaluate the workmanship and his conformity to international standard.
 <br /> <br /> 
<h4>MEDICAL EXAMINATION: </h4>
Every prospective candidate undergoes strict medical examination including complete physical checkup, chest, X-Rays, etc from approved medical centers recognized by GCC.
 <br /> <br /> 
<h4>VISA ENDORSEMENT: </h4>
We are responsible for the visa stamping process and collection of the passport from the concerned Embassy / Consulate.
 <br /> <br /> 
<h4>REGISTRATION: </h4>
After stamping visa, we submit passports, for registration with the Protector of Emigrants.
 <br /> <br /> 
<h4>RESERVATION / TICKETING: </h4>
Good relations with all leading Airlines, efficient reservation and in time dispatch professionally.
 
 
As a part of our continuing commitment of services to our clients we provide a number of services to the employer and concerned employees to have a sustained relationship and also to make the job of the employer easy and realistic.         
                
                
            </div>
        </div>

    </div>

    
    <br /><br /><br /><br />
</body>
   <?php include 'includes/footer.php'; ?>
