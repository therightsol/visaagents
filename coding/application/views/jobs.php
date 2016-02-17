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
    <br />
    <br /> 
    <br />
    <div class="container" >
        <div class="row" >  
            <div class="col-md-12"> 
                <p>
                We International Employment Bureau have contributed a lot in the overseas employment promotion in Pakistan.
We are the foundation stone in the field of overseas employment promotion. Since last many  years we are 
serving our nation through overseas employment promotion. A number of people have enjoyed our active, 
trustable and discipline service. We are not doing this with the passion of earning profit but with the 
passion of serving our nation. We are dealing for almost all countries of Europe and Middle East, including 
U.A.E, Kuwait, Sudi Arabia, France, U.K , Germany ,Canada, Japan. Korea, China, U.S.A and Australia etc. 
We cater for all fields namely, unskilled and specialists particularly in the following trades:
The Islamic Republic of Pakistan is rich in its varied culture and customs, history and heritage. 
Among the countless resources blessed by Almighty God, Pakistan has plenty of highly educated and talented 
youth and has therefore become a major source of high quality manpower export. 
                </p>
                <br />
                 <h1 class="page-header">Construction Civil Engineers</h1>
                 <ul>
                            <li>
                                Architects
                            </li>
                            <li>
                                Junior Architects
                            </li>
                            <li>
                                Site Supervisors
                            </li>
                            <li>
                                Masons & Mason Helpers
                            </li>
                            <li>
                                Laborers
                            </li>
                            <li>
                                Painters/Painter Assistants
                            </li>
                            <li>
                                Carpenters
                            </li>
                            <li>
                                Surveyors
                            </li>
                             <li>
                                Designers
                            </li>
                            <li>
                                Tile fixers
                            </li>
                            <li>
                                Steel fixers
                            </li>
                            <li>
                                Plumbers
                            </li>
                            <li>
                               Electricians & Assistants
                            </li>
                            <li>
                                Electrical Wiremen
                            </li>
                            <li>
                               Forklift Operators
                            </li>
                            <li>
                               Truck Drivers/Loaders
                            </li>
                            <li>
                                Storekeepers
                            </li>
                        </ul>
                 <br />
                 <h1 class="page-header">Medical</h1>
                 <ul>
                     <li>General Physicians </li>
                           <li>Surgeons </li>
                           <li>Consultant Specialists </li>
                           <li> Resident Medical Officers (RMOs) </li>
                           <li>Casualty Medical Officers (CMOs) </li>
                           <li>Male & Female Nurses </li>
                           <li>Gynecologists </li>
                           <li>Hospital Administrative Staff </li>
                           <li>Receptionists/Telephone Operators </li>
                           <li>Storekeepers </li>
                           <li>Lab Technicians </li>
                           <li>X-Ray Technicians </li>
                           <li>O.T. Technicians </li>
                           <li>ICU & Neonatal ICU Staff </li>
                           <li>Physiotherapists </li>
                           <li>Cleaners/Sweepers </li> 
                           <li>Maintenance Staff </li>
                           <li>Dispensers</li>


                        </ul>
                 <br />
                 <h1 class="page-header">Electronic Engineering</h1>
                 <ul>
                     <li>Elevator/lift technicians </li>
                     <li>Computer and Hardware Engineers</li>
                     <li>TV, AC and Fridge Technicians</li>
                     <li>Electrical generator technicians </li>
                     <li> Automobile Wiring Technicians</li>
                     <li>Telephone & Communication Engineers</li>
                     <li>Foremen/Assistants</li>


                   </ul>
                   <br />
                 <h1 class="page-header">Mechanical Engineering</h1>
                 <ul>
                     <li>Electrical generator technicians </li>
                     <li>Automobile Mechanics </li>
                     <li>Mobile Heavy Equipment Mechanics</li>
                     <li> Bulldozer Mechanics</li>
                     <li>Scraper Mechanics</li>


                   </ul>
                 <h1 class="page-header">Agricultural & Geological</h1>
                 <ul>
                     <li>  Geological Surveyors </li>
                     <li>Soil Testing Lab Technicians </li>
                     <li>Agricultural hands </li>
                     <li>Poultry, Fishery and  Pesticide Specialists </li>



                   </ul>
                  <h1 class="page-header"> Electrical Engineering</h1>
                 <ul>
                     <li> Electrical engineers </li>
                     <li>Electrical Wiremen</li>
                     <li>Electrical Contractors </li>
                     <li>Generator Technicians </li>
                     <li>Cable men </li>
                     <li> Heavy Electrical Engineers & Juniors</li>

                   </ul>
                  <h1 class="page-header">Administrators & Managers</h1>
                 <ul>
                     <li> Junior Managers</li>
                     <li>Supervisors</li>
                     <li>Accountants</li>
                     <li>Assistant Accountants</li>
                     <li>Clerks</li>
                     <li>Computer Typists </li>
                     <li>Receptionists </li>
                     <li>Telephone Operators </li>
                     <li>Computer Operators</li>
                     <li> Programmers</li>
                     <li>Drivers</li>
                     <li>Gatekeepers</li>
                     <li>Storekeepers</li>
                     <li>Peons </li>
                     <li>Lift Operators </li>
                   </ul>
                  <h1 class="page-header">Others</h1>
                 <ul>
                     <li>Tailors </li>
                     <li>Salesmen </li>
                     <li>Barber s </li>
                     <li>Jewellers </li>
                     <li>IT Professions</li>
                   </ul>
            </div>
            
        </div>
    </div>



    
    <br /><br /><br /><br />
</body>
   <?php include 'includes/footer.php'; ?>
