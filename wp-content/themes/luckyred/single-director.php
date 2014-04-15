<?php get_header(); ?>

<?php wp_reset_postdata();  ?>

<div class="row film-uno">
  <?php // query_posts('post_type=movie'); ?>
  <div class="large-4 columns">
    <?php echo get_the_post_thumbnail($movie->ID); ?>
  </div>
  <div class="large-8 columns">
    <?php //if (have_posts()) : while(have_posts()) : the_post(); ?>
    <h1><?php echo get_the_title(); ?></h1>
    </h6>
    <p>
      <?php the_content(); ?>
    </p>
    <?php //endwhile; endif; ?>
  </div>
</div>

<?php get_footer(); ?>