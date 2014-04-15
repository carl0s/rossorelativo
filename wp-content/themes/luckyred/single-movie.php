<?php get_header(); ?>

<?php wp_reset_postdata();  ?>

<div class="row film-uno">
  <?php // query_posts('post_type=movie'); ?>
  <div class="large-4 columns">
    <?php echo get_the_post_thumbnail($movie->ID); ?>
  </div>
  <div class="large-8 columns">
    <?php //if (have_posts()) : while(have_posts()) : the_post(); ?>
    <h1><?php echo the_title(); ?></h1>
    <h6>Regia:
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
    <h6>Genere: 
      <?php the_category (', '); ?>
    </h6>
    <h6>Nazione:
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
    <h6>Anno:
      <?php echo get_field('year'); ?>
    </h6>
    <h6>Cast:
      <?php
      $casts = get_field('cast');
      $i = 0;
      foreach($casts as $cast):
        if($i = 0):
          $separator = ', ';
        else:
          $separator = '';
        endif;
      ?>
      <a href="<?php echo get_permalink($cast->ID); ?>" title="La scheda di <?php echo $cast->post_title; ?>"><?php echo $separator . $cast->post_title; ?></a>
      <?php
          $i++;
        endforeach;
      ?>
    </h6>
    <p>
      <?php the_content(); ?>
    </p>
    <br><br><br><br><br><br>
    <?php //endwhile; endif; ?>
  </div>
  <div class="row">
  <div class="large-3 columns">
    <a class="button film [tiny small large]">Manifesto</a>
  </div>
  <div class="large-3 columns">
    <a class="button film [tiny small large]">Locandina</a>
  </div>
  <div class="large-3 columns">
    <a class="button film [tiny small large]">Trailer</a>
  </div>
  <div class="large-3 columns">
    <a class="button film [tiny small large]">Banner</a>
  </div>
  </div>
</div>

<?php get_footer(); ?>