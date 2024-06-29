<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>BOCIAN</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet" />
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap js -->
  <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
  <script>
    var cart = sessionStorage.getItem('cart') ? new Map(Object.entries(JSON.parse(sessionStorage.getItem('cart')))) : new Map();
    var cartItemCount = sessionStorage.getItem('itemsCount') ? sessionStorage.getItem('itemsCount') : 0 ;
    
    $(document).ready(() => {
      document.getElementById('cart-count').textContent = cartItemCount;
      document.getElementById('cart').value = JSON.stringify(Object.fromEntries(cart));
    })

  </script>

</head>

<body>

  <!-- header section strats -->
  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <img src="<?php echo base_url(); ?>images/bocian.jpg" width="5%">
        <a class="navbar-brand">
          <span>BOCIAN®</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ml-auto">
            <li class="nav-item">
              <?php echo session()->has("loggedInUser") ?  "<a href=\"". base_url("/userPanel") ."\"><img src=\"" .  base_url() . "images/l_user.png\" width=\"30%\" alt=\"login\"></a>" : 
                "<a href=\"". base_url("/login") ."\"><img src=\"" .  base_url() . "images/user.png\" width=\"30%\" alt=\"login\"></a>" ?>
            </li>
            <?php if( isset($_SESSION['loggedInUser'])) {
                echo '<li class="nav-item">
              <a href="' . base_url('/logout') . '"><img src="' . base_url() .'images/logout.png"
                  width="30%" alt="Wyloguj"></a>
            </li>';
            } ?>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->