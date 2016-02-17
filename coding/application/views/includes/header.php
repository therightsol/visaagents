<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>
<?php $root = base_url();   ?>
  <!-- Basic -->
  <title>
      <?php
      if(isset($pagename)){
      if($pagename == 'home'){
          echo 'Visa Processing | Noman Ahmad'; 
          
      }elseif($pagename == 'addvisa'){ echo 'Add New Visa';
      }
      elseif($pagename == 'Login'){ echo 'Login Here';
      }
      elseif($pagename == 'Register'){ echo 'Register Here';
      }
      elseif($pagename == 'jobs'){ echo 'Register Here';
      }
      elseif($pagename == 'terms'){ echo 'Terms & conditions';
      }
      elseif($pagename == 'Visa_Procedure'){ echo 'Visa Procedure';
      }
      }else{
        echo 'Visa Processing | Noman Ahmad';
      }
      ?></title>

  <!-- Define Charset -->
  <meta charset="utf-8">
  
  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Visa Processign Project -- TR Solutions">
  <meta name="author" content="TEAM TheRightSol">

  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="<?php echo $root; ?>asset/css/bootstrap.min.css" type="text/css" media="screen">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="<?php echo $root; ?>asset/css/font-awesome.min.css" type="text/css" media="screen">

  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/slicknav.css" media="screen">

  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/style.css" media="screen">

  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/responsive.css" media="screen">

  <!-- Css3 Transitions Styles  -->
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/animate.css" media="screen">
  <!-- Css3 Date Styles  -->
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/datepicker.min.css" media="screen">
  <!-- Css3 Custom Styles  -->
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/custom.css" media="screen">
    <!-- Data table Styles  -->
    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/datatable.min.css" media="screen">
    <!-- Css Editable Styles  -->
    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/editable.css">
    <!-- Color CSS Styles  -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/picedit.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/red.css" title="red" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/jade.css" title="jade" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/green.css" title="green" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/blue.css" title="blue" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/beige.css" title="beige" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/cyan.css" title="cyan" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/orange.css" title="orange" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/peach.css" title="peach" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/pink.css" title="pink" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/purple.css" title="purple" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/sky-blue.css" title="sky-blue" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>asset/css/colors/yellow.css" title="yellow" media="screen" />

  <!-- Margo JS  -->
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.migrate.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/modernizrr.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.appear.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/count-to.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.textillate.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.lettering.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.nicescroll.min.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.parallax.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/mediaelement-and-player.js"></script>
  <script type="text/javascript" src="<?php echo $root; ?>asset/js/jquery.slicknav.js"></script>

  <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>