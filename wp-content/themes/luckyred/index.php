  <!--HEADER-->
  <?php get_header(); ?>
  
  <!--BODY-->
  <?php wp_reset_postdata(); ?>
  
  <div class="slider-cinema">
    <div class="slideshow-wrapper">
      <div class="fotorama slideshow" data-nav="thumbs" data-allowfullscreen="native" data-width="100%" data-ratio="1440/750" data-thumbheight="116">
        <?php 
        $args = array(
          'post_type' => 'film',
          'meta_key' => 'in_uscita',
          'meta_value' => 'No'
          );
        $film = new WP_Query($args);
        ?>
        <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
          <a href="<?php the_field('link_trailer'); ?>" data-caption="
            <div class='info-wrapper'>
              <div class='row'>
                <div class='info-title large-6 columns'>
                  <?php the_title('<h4>','</h4>'); ?>
                </div>
                <div class='info-date large-1 large-offset-4 columns'>
                  <h4><?php echo get_field('giorno_uscita'); ?></h4>
                  <h5><?php echo get_field('mese_uscita'); ?></h5>
                  <h6>al cinema</h6>
                </div>
              </div>
              <div class='row'>
                <div class='info-content large-3 columns'>
                  <?php excerpt('35','<p>','</p>'); ?>
                </div>
              </div>
              <div class='row'>
                <div class='film-thumb-title large-2 columns'>
                  <h4>Altri film</h4>
                </div>
              </div>
            </div>
          </div>">
          <?php echo get_the_post_thumbnail($film->ID); ?></a>
          <div class="row">
            <div class="film-thumb large-12 columns">
              <?php the_field('video_thumbnail'); ?>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>

  <?php wp_reset_postdata(); ?>

  <div class="nextexit-bg large-12 columns">
    <div class="row">
      <h2>Prossime Uscite</h2>

      <div class="slider-nextexit">
        <div class="slideshow-wrapper">
          <?php wp_reset_postdata(); ?>
          <div class="fotorama slideshow" data-nav="thumbs" data-width="100%" data-ratio="1180/360">
            <?php 
            $args = array(
              'post_type' => 'film',
              'meta_key' => 'in_uscita',
              'meta_value' => 'Si'
              );
            $film = new WP_Query($args);
            ?>
            <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
              <a href="<?php the_field('link_trailer'); ?>" data-caption="
                <div class='info-wrapper'>
                  <div class='row'>
                    <div class='info-title large-3 columns'>
                      <?php the_title('<h4>','</h4>'); ?>
                    </div>
                    <div class='info-date large-3 columns'>
                    <h5><?php echo get_field('data_di_uscita'); ?></h5>
                    </div>
                  </div>
                </div>">
                <?php echo get_the_post_thumbnail($film->ID); ?></a>
                <div class="row">
                  <div class="large-12 columns">
                    <?php the_field('video_thumbnail'); ?>
                  </div>
                </div>
              <?php endwhile; endif; ?>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="ondemand-bg row">
      <h2>On Demand</h2>
    </div>
    <!--SIDEBAR-->
    <?php get_sidebar(); ?>
    <!--FOOTER-->
    <?php get_footer(); ?>

    <script>
      $(document).foundation();
    </script>
