<?php
global $template_settings, $post;
bb_add_body_classes('portfoio');
the_post();
get_header();
?>
<div class='container-fluid background-texture portfolio h-75'>
  <div class="row h-100">
    <div class="col-md-12">

        <div class="text-center">
          <div class="text-block"><h1>PORTFOLIO</h1>
          <button type="button" class="btn btn-light btn-lg">Join Qweb</button>
          <button type="button" class="btn btn-outline-light btn-lg">Work With Us</button>
        </div>

      </div>
    </div>
  </div>

</div>

</header>
<?php get_footer(); ?>
