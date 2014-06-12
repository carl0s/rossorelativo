<?php get_header(); ?>

<?php //wp_reset_postdata(); ?>

<?php
$actual_id = the_ID();

?>

<div id="blog" class="large-12 columns">


    <div class="slide-blog" data-thumb="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; // retrieving url from attached thumb as featured image ?>">
    <div class='info-wrapper' data-id="<?php echo get_permalink(); ?>">
      <?php echo get_the_post_thumbnail(); ?>
      <div class='row'>
        <div class="info-blog">
        <div class='info-title large-5 columns'>
          <?php the_title('<h2>','</h2>'); ?>
        </div>
        <div class='info-date large-1 large-offset-9 columns'>
          <h4><?php echo date_i18n('j', strtotime(get_the_date())); ?></h4>
          <h5><?php echo date_i18n('F', strtotime(get_the_date())); ?></h5>
          <h6><?php echo date_i18n('Y', strtotime(get_the_date())); ?></h6>
        </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="film-thumb large-12 columns">
        <?php the_field('video_thumbnail'); ?>
      </div>
    </div>
    <div class="row">
      <div class="blog-content">
      <p> <?php echo get_the_content(); ?> </p>
      </div>
    </div>
    </div>

<div class="row">
  <div class="large-12 column">
  <?php echo get_comments();  ?>
  </div>
</div>
<div class="row">
  <div class="large-3 columns end right">
    <?php //wpbeginner_numeric_posts_nav(); ?>
  </div>
    
  <?php wp_reset_postdata(); ?>
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
    <?php $temp_id = get_the_ID(); echo $temp_id; ?>
    <?php if ($actual_id != $temp_id ): ?>
    <div class="slide-blog" data-thumb="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; // retrieving url from attached thumb as featured image ?>">
    <div class='info-wrapper' data-id="<?php echo get_permalink(); ?>">
      <?php echo get_the_post_thumbnail(); ?>
      <div class='row'>
        <div class="info-blog">
        <div class='info-title large-5 columns'>
          <?php the_title('<h2>','</h2>'); ?>
        </div>
        <div class='info-date large-1 large-offset-9 columns'>
          <h4><?php echo date_i18n('j', strtotime(get_the_date())); ?></h4>
          <h5><?php echo date_i18n('F', strtotime(get_the_date())); ?></h5>
          <h6><?php echo date_i18n('Y', strtotime(get_the_date())); ?></h6>
        </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="film-thumb large-12 columns">
        <?php the_field('video_thumbnail'); ?>
      </div>
    </div>
    <div class="row">
      <div class="blog-content">
      <p> <?php echo get_the_content(); ?> </p>
      </div>
    </div>
    </div>
  <?php endif; ?>
  <?php endwhile; endif; ?> 
  


</div>

</div>

<!--FOOTER-->
<?php get_footer(); ?>