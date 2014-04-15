  <!--HEADER-->
  <?php get_header(); ?>
  
  <!--BODY-->
  <?php wp_reset_postdata(); ?>
  
  <div class="slideshow-wrapper">
    <div class="fotorama slideshow" data-nav="thumbs" data-allowfullscreen="native" data-width="100%" data-ratio="1440/750">
      <?php 
      $args = array(
              'post_type' => 'film'
            );
      $film = new WP_Query($args);
      ?>
      <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
        <a href="<?php the_field('link_trailer'); ?>" data-caption="<div class='info-wrapper'><div class='row'><div class='info-film large-6 columns'><?php the_title('<h4>','</h4>'); ?></div></div></div>"><?php echo get_the_post_thumbnail($film->ID); ?></a>
        <div class="row">
          <div class="large-12 columns">
            <?php the_field('video_thumbnail'); ?>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>


  </div>
  <div id="content" class="row">
    <div class="large-12 columns">
      <br>
      <h2>La nostra Mission</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel volutpat ligula. Ut tellus nibh, bibendum et congue in, sodales id ligula. Sed nec euismod ante. Aliquam eleifend mi id quam porta egestas non non purus. Vestibulum at lectus arcu.</p>
      <br>
      <hr>
    </div>
    <div class="large-12 columns">
      <h2>Prossime Uscite</h2>
      <div class="row">
        <div class="large-7 columns fotorama" data-nav="thumbs" data-allowfullscreen="native">
          <?php query_posts('post_type=movie'); ?>
          <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
            <a href="<?php the_field('video_link'); ?>">
              <?php the_field('video_thumbnail'); ?>
            </a>
          <?php endwhile; endif; ?>
        </div>
        <div class="large-4 large-offset-1 columns">
          <img src="http://www.placehold.it/250X350">
          <br><br><br>
          <a class="button [tiny small large] right">Vai alla pagina</a>
        </div>
        <hr>
      </div>
    </div>
    <div class="large-12 columns">
      <h2>On Demand</h2>
      <div class="row">
        <div class="large-7 columns">
          <?php query_posts(array('post_type'=>'ondemand', 'posts_per_page'=>3)); ?>
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
          <?php echo get_the_post_thumbnail($ondemand->ID, array(160,260)); ?>
          <?php endwhile; endif; ?>
        </div>
        <div class="large-5 columns">
          <h3><a href="<?php echo get_permalink($ondemand->ID); ?>" title="La scheda di <?php echo the_title(); ?>"><?php echo the_title(); ?></a></h3>
          <p><?php the_content(); ?></p>
          <a href="ondemand.html" class="button [tiny small large] right">Vai alla pagina</a>
        </div>
      </div>
      <br>
      <hr>
    </div>
    <div class="large-12 columns">
    <div class="row">
      <div class="large-5 columns">
        <h2>Blog</h2>
        <h5>Titolo articolo</h5>
        <img src="http://www.placehold.it/500X150">
        <br><br><br>
        <p id="news">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel volutpat ligula. Ut tellus nibh, bibendum et congue in, sodales id ligula. Sed nec euismod ante.</p>
        <a class="button [tiny small large] right">Leggi l'articolo completo</a>
      </div>
      <div class="large-5 large-offset-2 columns">
        <h2>Archivio</h2>
        <?php query_posts(array('post_type'=>'movie', 'posts_per_page'=>3)); ?>
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <div class="large-4 columns">
            <h6><?php the_title(); ?></h6>
            <?php
              $movies = array('numberposts' => 3);
              $thumbnails = get_posts($movies);
              foreach ($movies as $movie){
                if(has_post_thumbnail($movie->ID)){
                  echo'<a href="'. get_permalink($movie->ID).'"title="'. esc_attr($movie->post_title).'">';
                  echo get_the_post_thumbnail($movie->ID, 'movies');
                  echo '</a>';
                }
              }
            ?>
            <h6>
              <?php
                $directors = get_field('director');
                $i = 0;
                foreach($directors as $director):
                  if($i = 0):
                    $separator = ', ';
                  else:
                    $separator = '';
                  endif;
              ?>
                  <a href="<?php echo get_permalink($director->ID); ?>" title="La scheda di <?php echo $director->post_title; ?>"><?php echo $separator . $director->post_title; ?></a>
              <?php
                  $i++;
                endforeach;
              ?>
            </h6>
            <h6><?php the_category (', '); ?></h6>
            <h6>
              <?php
                $countries = get_field('country');
                $i = 0;
                foreach ($countries as $country):
                  if($i > 0):
                    $separator = ', ';
                  else:
                    $separator = '';
                  endif;
                  echo $country;
                  $i++; 
                endforeach;
              ?>
            </h6>
            <h6><?php echo get_field('year'); ?></h6>
        </div>
        <?php endwhile; endif; ?>
        <a href="#" class="button [tiny small large] right">Guarda l'archivio completo</a>
      </div>
    </div>
    </div>
    <hr>
    <div class="large-12 columns">
      <h2>Press</h2>
      <div class="large-2 columns">
          <img src="img/img-press.svg">
        </div>
        <div class="large-10 columns">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel volutpat ligula. Ut tellus nibh, bibendum et congue in, sodales id ligula. Sed nec euismod ante. Aliquam eleifend mi id quam porta egestas non non purus. Vestibulum at lectus arcu.</p>
          <a href="press.html" class="button [tiny small large] right">Vai alla pagina</a>
        </div>
    </div>
    <hr>
    <div class="large-12 columns">
      <h2>Contatti</h2>
      <div class="large-6 columns">
          <div data-interchange="[../examples/interchange/default.html, (small)], [../examples/interchange/medium.html, (medium)], [../examples/interchange/large.html, (large)]"><img src="img/mappa.png"></div>
        </div>
        <div class="large-6 columns">
          <br>
          <p>Telefono 06.3759441 - Fax 06.37352310<br>Mail info@luckyred.it<br>Via Antonio Chinotto, 16 - 00195 - Roma<br>P.I.01880311004 - C.F.07824900588<br>N°Iscrizione Reg.Imp. di ROMA 07824900588 REA N°631446 CAP. SOC. € 154.000,00 I.V.</p>
        </div>
      </div>
    </div>
  </div>
  <!--SIDEBAR-->
  <?php get_sidebar(); ?>
  <!--FOOTER-->
  <?php get_footer(); ?>

  <script>
    $(document).foundation();
  </script>
