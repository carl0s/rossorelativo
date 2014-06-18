<?php get_header(); ?>

<?php wp_reset_postdata(); ?>

<?php
$actual_id = get_the_ID();
?>

<div id="blog">
  <?php echo get_the_post_thumbnail(); ?>
  <div class="slide-blog" >
  <div class='info-wrapper' >
    <div class='row'>
      <div class="info-blog">
        <div class='info-date large-1 columns'>
          <h4><?php echo date_i18n('j', strtotime(get_the_date())); ?></h4>
          <h5><?php echo date_i18n('F', strtotime(get_the_date())); ?></h5>
          <h6>
            <?php echo __('Autore: ') ?><br>
            <?php the_author(); ?>
          </h6>
        </div>
        <div class='info-title large-10 columns'>
          <?php the_title('<h2>','</h2>'); ?><br>
          <h6><?php echo get_field('sottotitolo'); ?></h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="blog-content">
      <?php the_content(); ?>
      <div id="blog-tag" class="large-3 columns">
        <h2><?php echo __('Ricerca tra i tag ') ?></h2>
      </div>
      <div id="blog-tag" class="large-9 columns">
        <?php
        if(get_the_tag_list()) {
          echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
        }
        ?>
      </div>
    </div>
  </div>
  <div class="blog-simil-bg large-12 columns">
    <div class="blog-simil row">
      <h2><?php echo __('Altre news dal blog') ?></h2>
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
        <?php $temp_id = get_the_ID(); ?>
        <?php if ($actual_id != $temp_id ): ?>
        <div class="slide-blog-simil" >
        <div class='info-wrapper' data-id="<?php echo get_permalink(); ?>">
          <?php echo get_the_post_thumbnail(); ?>
          <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
        </div>
        <div class="row">
          <div class="blog-content-simil">
          <p><?php echo get_field('sottotitolo'); ?></p>
          <h6><?php echo get_the_date('d F Y'); ?></h6>
          </div>
        </div>
        </div>
        <?php endif; ?>
        <?php endwhile; endif; ?> 
        <?php wp_reset_query(); ?>
    </div>
  </div>

  <div class="row">
    <div class="comments">
      <?php $withcomments =1; comments_template();?>
    </div>
  </div>

<?php get_footer(); ?>