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

<section class="solutions contain">
  <h2>Consult with <span class="purple">our club</span> to find the right solution for <span class="blue">you</span>.</h2>
  <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="true">We Work With</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="create-tab" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-selected="false">We Create</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="work" role="tabpanel" aria-labelledby="work-tab">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>Students</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
        </div>
        <div class="col-md-4">
          <h3>Clubs</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>

        </div>
        <div class="col-md-4">
          <h3>Businesses</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>

        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="create" role="tabpanel" aria-labelledby="create-tab">...</div>

</div>
</section>

<section class="process">

</section>
<?php get_footer(); ?>
