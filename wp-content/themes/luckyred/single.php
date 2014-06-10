<?php
get_header();
?>

<?php wp_reset_postdata();  ?>

<div class="row film-uno">
  <?php // query_posts('post_type=movie'); ?>
  <div class="large-4 columns">
    <img src="http://www.placehold.it/400X600">
  </div>
  <div class="large-8 columns">
    <?php //if (have_posts()) : while(have_posts()) : the_post(); ?>
    <h1><?php echo get_the_title(); ?></h1>
    <h6>Regia</h6>
    <h6>Genere</h6>
    <h6>Nazione</h6>
    <h6>Anno</h6>
    <h6>Cast</h6>
    <?php the_content(); ?>
    <?php //endwhile; endif; ?>
  </div>
</div>

<?php //if (have_posts()) : while(have_posts()) : the_post(); ?>
  <a href="<?php the_field('video_link'); ?>">
    <?php the_field('video_thumbnail'); ?>
  </a>
<?php //endwhile; endif; ?>