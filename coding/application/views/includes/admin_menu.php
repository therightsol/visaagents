<!-- Start  Logo & Naviagtion  -->
<div class="navbar navbar-default navbar-top">
  <div class="container">
    <div class="navbar-header">
      <!-- Stat Toggle Nav Link For Mobiles -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <i class="fa fa-bars"></i>
      </button>
      <!-- End Toggle Nav Link For Mobiles -->
      <a class="navbar-brand" href="<?php echo $root; ?>home">
        <img alt="" src="<?php echo $root; ?>asset/images/margo.png">
      </a>
    </div>
    <div class="navbar-collapse collapse">
      <!-- Stat Search -->
      <
      <!-- End Search -->
      <!-- Start Navigation List -->
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a
              <?php if(isset($activeMenu)){ if($activeMenu == 'home'){ echo 'class="active"'; }} ?>
              href="<?php echo $root; ?>home">Home
          </a>
        </li>
        <li>
          <a<?php if(isset($activeMenu)){ if($activeMenu == 'worker'){ echo 'class="active"'; }} ?>
              href="#">Worker
          </a>
          <ul class="dropdown">
            <li><a href="<?php echo $root; ?>add_worker">Add Worker</a></li>
            <li><a href="<?php echo $root; ?>workers">View Worker</a></li>
            <li><a href="<?php echo $root; ?>worker_application">Application Status</a></li>
          </ul>
        </li>
        <li>
          <a
              <?php if(isset($activeMenu)){ if($activeMenu == 'admin_panel'){ echo 'class="active"'; }} ?>
              href="#">Work Place
          </a>
          <ul class="dropdown">
            <li><a href="<?php echo $root; ?>admin_panel/add_kafeel">Add kafeel</a></li>
            <li><a href="<?php echo $root; ?>admin_panel/add_local_user">Add Local User</a></li>
            <li><a href="<?php echo $root; ?>admin_panel/user">User Operation</a></li>
            <li><a href="<?php echo $root; ?>admin_panel/add_visa">Add Visa</a></li>
            <li><a href="<?php echo $root; ?>admin_panel/visa_profession">Visa Profession</a></li>
            <li><a href="<?php echo $root; ?>admin_panel/visa_category">Visa Category</a></li>
            <li><a href="<?php echo $root; ?>admin_panel/iqama_profession">Iqama Profession</a></li>
          </ul>
        </li>
        <li>

          <a
              <?php if (isset($activeMenu)) {
                if ($activeMenu == 'Aboutus') {
                  echo 'class="active"';
                }
              } ?>
              href="#">
            About Us
          </a>
          <ul>
            <li class="dropdown">
              <a href="<?php echo $root; ?>Visa_Procedure">
                Services
              </a>
            </li>
          </ul>



        </li>
        <li>
          <a
              <?php if (isset($activeMenu)) {
                if ($activeMenu == 'jobs') {
                  echo 'class="active"';
                }
              } ?>
              href="<?php echo $root; ?>Jobs">Jobs
          </a>
        </li>
        <li>
          <a
              <?php if (isset($activeMenu)) {
                if ($activeMenu == 'contact') {
                  echo 'class="active"';
                }
              } ?>
              href="<?php echo $root; ?>Contact">Contact Us
          </a>
        </li>
        <li>
          <a
              <?php if (isset($activeMenu)) {
                if ($activeMenu == 'terms') {
                  echo 'class="active"';
                }
              } ?>
              href="<?php echo $root; ?>Terms_and_conditions"> Terms
          </a>
        </li>
        <li>
          <a href="<?php echo $root; ?>Logout">Logout</a>
        </li>

      </ul>
      <!-- End Navigation List -->
    </div>
  </div>

  <!-- Mobile Menu Start -->
  <ul class="wpb-mobile-menu">
    <li>
      <a class="active" href="<?php echo $root; ?>home">Home</a>


    </li>



  </ul>
  <!-- Mobile Menu End -->

</div>
<!-- End Header Logo & Naviagtion -->

</header>
<!-- End Header Section -->