<?php
global $template_settings, $post;
?>
<!DOCTYPE html>
<html>
<head>
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
<script src="jquery-3.3.1.min.js"></script>
<link rel="icon"
      type="image/png"
      href="/wordpress/wp-content/themes/qweb-theme/media/logo.png">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>

      <nav class="navbar navbar-expand-lg navbar-dark z-1000" id="navbar">
        <a class="navbar-brand" href="#">
          <img src="/wordpress/wp-content/themes/qweb-theme/media/logo.png" alt="Q web">
        </a>
        <button class="navbar-toggler hamburger hamburger--collapse" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="navToggle()">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/wordpress/#">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/wordpress/team">OUR TEAM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/wordpress/contact">CONTACT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/wordpress/about-us">ABOUT US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/wordpress/portfolio">PORTFOLIO</a>
            </li>
            <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>-->
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a class="navbar-brand" href="https://facebook.com">
              <img src="/wordpress/wp-content/themes/qweb-theme/media/facebook-icon.png" alt="Q web">
            </a>
            <a class="navbar-brand" href="https://instagram.com">
              <img src="/wordpress/wp-content/themes/qweb-theme/media/insta-icon.png" alt="Q web">
            </a>
            <a class="navbar-brand" href="https://linkedin.com">
              <img src="/wordpress/wp-content/themes/qweb-theme/media/linkedin-icon.png" alt="Q web">
            </a>
            <a class="navbar-brand" href="https://outlook.com">
              <img src="/wordpress/wp-content/themes/qweb-theme/media/mail-icon.png" alt="Q web">
            </a>
            <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
          </form>
        </div>
      </nav>

<script src="wordpress/wp-content/themes/qweb-theme/scripts/header_effect.js"></script>
    <script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {

    navbar.classList.add("sticky");
    if(window.pageYOffset >= 400){
      navbar.classList.add("bg-dark");
    }
  } else {
    navbar.classList.remove("bg-dark");
    navbar.classList.remove("sticky");
  }
}

/*
$(window).scroll(function() {
    if ($(this).scrollTop() > 200){ // Set position from top to add class
        $('.navbar').addClass("bg-dark");
    } else {
        $('.navbar').removeClass("bg-dark");
    }
});*/
</script>
