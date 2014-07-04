  <?php get_header(); ?>

  <section class="main-section">
    <!-- content goes here -->

    <?php wp_reset_postdata();  ?>

    <div class="img-regista slideshow-wrapper">
      <div class="fotorama slideshow" data-allowfullscreen="native" data-width="100%" data-ratio="1440/750">
        <div class="slide">
          <div class='info-wrapper'>
            <?php echo get_the_post_thumbnail(); ?>
            <div class='row'>
              <div class='info-title large-6 columns'>
                <?php the_title('<h2>','</h2>'); ?>
                <div class="row collapse">
                  <div class="large-9 columns">
                    <div class='info-content'>
                      <span><?php echo get_field('nazionalità'); ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class='info-date large-1 large-offset-4 columns'>
                <h6>Share</h6>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="film-thumb large-12 columns">
              <?php the_field('video_thumbnail'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="biografia large-12 columns">
      <div class="row">
        <h2>Biografia</h2>
        <p><?php echo get_the_content(); ?></p>
      </div>
    </div>

    <div class="filmografia large-12 columns">
      <div class="row">
        <h2><?php echo __('Filmografia'); ?></h2>
        <h3><?php echo __('Film dal catalogo lucky red'); ?></h3>
        <?php if (have_posts()) : while(have_posts()) : the_post() ; ?>
        <div class="large-12 columns">
          <?php 
          $filmografie = get_posts(array(
            'post_type'  => 'film',
            'posts_per_page' => -1,
            'meta_query' => array(
              array(
                  'key' => 'regia', // name of custom field
                  'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                  'compare' => 'LIKE'
                  )
              )
            ));
            ?>
            <?php if( $filmografie ): ?>
            <?php foreach( $filmografie as $filmografia ): ?>
            <?php 
            $id = $filmografia->ID;
            ?>
            <div class="film-regista large-3 end columns">
              <a href="<?php get_permalink(); ?>"><?php echo get_the_post_thumbnail($filmografia->ID); ?></a>
              <div class="title-layout">
                <a href="<?php get_the_permalink($id); ?>"><h4 class="titolo-film-regista"> <?php echo $filmografia->post_title; ?></h4></a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    <?php endwhile; endif; ?>
  </div>
</div>

<div class="altri-film-bg large-12 columns ">
  <div class="row">
    <h3><span><?php echo __('Altri film'); ?></span></h3>
    <div class="altri-film-regista">
      <?php query_posts(array('post_type'=>'regista')); ?>
      <h5><?php echo get_field('film_regista'); ?></h5>
    </div>
  </div>
</div>

</section>

<a class="exit-off-canvas"></a>

</div>
</div>
<!--FOOTER-->
<?php get_footer(); ?>
