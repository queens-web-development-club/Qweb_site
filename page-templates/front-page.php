<?php
global $template_settings, $post;
bb_add_body_classes('front-page full-height');
the_post();
get_header();
?>
<div class='container-fluid background-texture home h-75' id="large-header">
  <!--<canvas id="demo-canvas"></canvas>-->
  <div class="row h-75">
    <div class="col-md-12">

        <div class="text-center">
          <div class="text-block"><h1>LEARN AT QWEB</h1>
          <button type="button" class="btn btn-light btn-lg font-family:'Google Sans'">Join Qweb</button>
          <button type="button" class="btn btn-outline-light btn-lg">Work With Us</button>
        </div>

      </div>
    </div>
  </div>

</div>
<!--<script src="wordpress/wp-content/themes/qweb-theme/scripts/min/TweenLite.min.js"></script>
<script src="wordpress/wp-content/themes/qweb-theme/scripts/min/EasePack.min.js"></script>
<script src="wordpress/wp-content/themes/qweb-theme/scripts/rAF.js"></script>
<script src="wordpress/wp-content/themes/qweb-theme/scripts/header_effect.js"></script>-->

</header>
<?php get_footer(); ?>
