<?php
global $template_settings, $post;
bb_add_body_classes('team');
the_post();
get_header();
?>
<div class='container-fluid background-texture team h-75'>
  <div class="row h-100">
    <div class="col-md-12">

        <div class="text-center">
          <div class="text-block">
            <h1>OUR TEAM</h1>
          <button type="button" class="btn btn-light btn-lg">Join Qweb</button>
          <button type="button" class="btn btn-outline-light btn-lg">Work With Us</button>
        </div>

      </div>
    </div>
  </div>
  <div>
      <p align='right' id='-Members'> 87 Members. </p>
    </div>
    <div>
      <p align='left' id='EXECUTIVE-TEAM'> EXECUTIVE TEAM </p>
      <hr style ='border:2px solid purple'
    </div>
    <div>
      <img src="wp-content/themes/Qweb_site/media/person-icon.png "
       class="Person-Icon">
   </div>
</div>

</header>
<?php get_footer(); ?>
