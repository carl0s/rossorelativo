<?php
  /* 
   * Template Name: Page Blog
   */
?>
<?php get_header(); ?>

<section class="main-section">
  <!-- content goes here -->

<?php wp_reset_postdata(); ?>

<?php
$actual_id = get_the_ID();
?>

<?php 
  $args = array(
    'post_type'  => 'post',
    'post__not_in' => array (
                        $actual_id
                      ),
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
    );
  $loop_blog = new WP_Query($args);
?>

<?php if ($loop_blog->have_posts()) : while($loop_blog->have_posts()) : $loop_blog->the_post(); ?>
  <?php $temp_id = get_the_ID(); //echo $temp_id; ?>
  <?php if ($actual_id != $temp_id ): ?>
  <div class="slide-blog-general">
  <div class='info-wrapper' data-id="<?php echo get_permalink(); ?>">
    <?php echo get_the_post_thumbnail(); ?>
    <div class='row'>
      <div class="info-blog">
        <div class='info-date large-2 small-5 columns'>
          <h6><?php echo get_the_date('d F Y'); ?></h6>
        </div>
        <div class='info-title large-12 small-12 columns'>
          <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>  
        <div class="row collapse">
          <div class="info-content" >
            <?php excerpt('35','<p>','</p>'); ?>
          </div> 
        </div>
      </div>
      <div class="arrow-blog-general">
        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_template_directory_uri() . '/img/arrow-right.svg' ?>"></a>
      </div>
    </div>
  </div>
  </div>
<?php endif; ?>
<?php endwhile; endif; ?> 
<?php wp_reset_query(); ?>
</div>

</section>

  <a class="exit-off-canvas"></a>

  </div>
</div>

<?php get_footer(); ?>
