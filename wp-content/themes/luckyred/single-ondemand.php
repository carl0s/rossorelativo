<?php get_header(); ?>

<?php wp_reset_postdata(); ?>

<div class="row film-ondemand">
  <div class="large-12 columns">
    <h1><?php the_title(); ?></h1>
    <br>
    <div class="large-8 columns">
      <img src="http://www.placehold.it/700X400">
      <br><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel volutpat ligula. Ut tellus nibh, bibendum et congue in, sodales id ligula. Sed nec euismod ante. Aliquam eleifend mi id quam porta egestas non non purus. Vestibulum at lectus arcu. Nulla imperdiet dolor a massa sollicitudin facilisis semper bibendum lectus.</p>
    </div>
    <div class="large-4 columns">
      <img src="http://www.placehold.it/250X350">
      <br><br>
      <a href="#" class="button film [tiny small large] split right">Noleggia<span data-dropdown="drop"></span></a><br>
      <ul id="drop" class="f-dropdown" data-dropdown-content>
      <li><a href="#">iTunes</a></li>
      <li><a href="#">Amazon</a></li>
      <li><a href="#">IMdB</a></li>
      </ul>        
      <br><br><br>
    </div>
  </div>
  <div class="large-12 columns">
    <br>
    <div class="large-4 columns">
      <img src="http://www.placehold.it/700X400">
    </div>
    <div class="large-4 columns">
      <img src="http://www.placehold.it/700X400">
    </div>
    <div class="large-4 columns">
      <img src="http://www.placehold.it/700X400">
    </div>
    <div class="large-12 columns">
      <br><br>
    </div>
    <hr>
  </div>
  <div class="large-12 columns">
    <h2>FILM SIMILI</h2>
    <br>
    <div class="large-4 columns">
      <img src="http://www.placehold.it/700X400">
    </div>
    <div class="large-4 columns">
      <img src="http://www.placehold.it/700X400">
    </div>
    <div class="large-4 columns">
      <img src="http://www.placehold.it/700X400">
    </div>
    <div class="large-12 columns">
      <br>
    </div>
  </div>
</div>

<?php get_footer(); ?>


<script>
    document.write('<script src=' +
      ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
      '.js><\/script>')
  </script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>