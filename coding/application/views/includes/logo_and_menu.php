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
              </div><!-- test on line 22 -->
            </div>
            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a class="active" href="<?php echo $root; ?>home">Home</a> 
              </li>
              <li>
                <a href="<?php echo $root; ?>AddVisa">Add Visa</a> 
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