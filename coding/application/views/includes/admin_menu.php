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
      <div class="search-side">
        <a class="show-search"><i class="fa fa-search"></i></a>
        <div class="search-form">
          <form autocomplete="off" role="search" method="get" class="searchform" action="#">
            <input type="text" value="" name="s" id="s" placeholder="Search the site...">
          </form>
        </div><!-- test on line       -->
      </div>
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
          <a
              <?php if(isset($activeMenu)){ if($activeMenu == 'add_worker'){ echo 'class="active"'; }} ?>
              href="<?php echo $root; ?>add_worker">Add Worker
          </a>
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
              <?php if(isset($activeMenu)){ if($activeMenu == 'profile'){ echo 'class="active"'; }} ?>
              href="<?php echo $root; ?>profile">Profile
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
    <li>
      <a href="<?php echo $root; ?>about">Add Worker</a>
    </li>

    <li>
      <a href="<?php echo $root; ?>portfolio">Portfolio</a>
      <ul class="dropdown">
        <li><a href="#">2 Columns</a>
        </li>
        <li><a href="#">3 Columns</a>
        </li>
        <li><a href="#">4 Columns</a>
        </li>
        <li><a href="#">Single Project</a>
        </li>
      </ul>
    </li>

  </ul>
  <!-- Mobile Menu End -->

</div>
<!-- End Header Logo & Naviagtion -->

</header>
<!-- End Header Section -->