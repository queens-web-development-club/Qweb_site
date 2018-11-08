<?php
global $template_settings, $post;
bb_add_body_classes('contact');
the_post();
get_header();
?>

<div class='container-fluid background-texture contact h-75'>
  <div class="row h-100">
    <div class="col-md-12">

        <div class="text-center">
          <div class="text-block"><h1>CONTACT</h1>
          <button type="button" class="btn btn-light btn-lg">Join Qweb</button>
          <button type="button" class="btn btn-outline-light btn-lg">Work With Us</button>
        </div>

      </div>
    </div>
  </div>
</div>
</header>

<body>
<div class=Contact-Setion>
  <h3>Get in Touch</h3>
  <h5>Talk to <span style="color: #5f084b">our team</span> of experienced students to take your project from concept to <span style="color:#006f71">completion</span></h5>
</div>

</body>

<?php get_footer(); ?>
