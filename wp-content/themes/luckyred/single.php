
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
<?php get_header(); ?>

<?php wp_reset_postdata(); ?>

<?php
$actual_id = get_the_ID();
?>

<div id="blog" class="large-12 columns">
  <div class="slide-blog" >
  <div class='info-wrapper' >
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
    <div class="blog-content">
    <p> <?php echo get_the_content(); ?> </p>
    <div id="blog-tag">
      <h2>ricerca tra i tag : </h2>
      <?php
      if(get_the_tag_list()) {
          echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
      }
      ?>
    </div>
    </div>
    <div class="blog-simil">
      <h2>altre news dal blog</h2>
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
      $loop_blog_simil = new WP_Query($args);
      ?>
        <?php if ($loop_blog_simil->have_posts()) : while($loop_blog_simil->have_posts()) : $loop_blog_simil->the_post(); ?>
        <?php $temp_id = get_the_ID(); echo $temp_id; ?>
        <?php if ($actual_id != $temp_id ): ?>
        <div class="slide-blog-simil" >
        <div class='info-wrapper' data-id="<?php echo get_permalink(); ?>">
          <?php echo get_the_post_thumbnail(); ?>
        </div>
        <div class="row">
          <div class="blog-content-simil">
          <?php excerpt('20','<p>','</p>'); ?>
          </div>
        </div>
        </div>
        <?php endif; ?>
        <?php endwhile; endif; ?> 
        <?php wp_reset_query(); ?>
    </div>
  </div>
  </div>

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
  <div class="slide-blog" >
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
    <div class="blog-content">
    <p> <?php echo get_the_content(); ?> </p>
    </div>
  </div>
  </div>
<?php endif; ?>
<?php endwhile; endif; ?> 
<?php wp_reset_query(); ?>
</div>
<?php //if (have_posts()) : while(have_posts()) : the_post(); ?>
  <a href="<?php the_field('video_link'); ?>">
    <?php the_field('video_thumbnail'); ?>
  </a>
<?php //endwhile; endif; ?>
