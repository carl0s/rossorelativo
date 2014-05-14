<?php get_header(); ?>

<?php wp_reset_postdata();  ?>

<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="js/jquery.gridnav.js"></script>

<script type="text/javascript">
      $(function() {
        $('#tj_container').gridnav({
          rows    : 1,
    navL    : '#tj_prev',
    navR    : '#tj_next',
          type  : {
            mode    : 'def',  // use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
            speed   : 400,      // for fade, seqfade, updown, sequpdown, showhide, disperse, rows
            easing    : '',     // for fade, seqfade, updown, sequpdown, showhide, disperse, rows 
            factor    : 50,     // for seqfade, sequpdown, rows
            reverse   : false     // for sequpdown
          }
        });
      });
    </script>


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
    <h2>Filmografia</h2>
    <h3>Film dal catalogo lucky red</h3>
  </div>

  <div id="tj_container" class="tj_container">
          <div class="tj_nav">
            <span id="tj_prev" class="tj_prev">Previous</span>
            <span id="tj_next" class="tj_next">Next</span>
          </div>
          <div class="tj_wrapper">
            <ul class="tj_gallery">
              <?php query_posts(array('post_type'=>'film', 'posts_per_page'=>5)); ?>
              <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
              <li><a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a></li>
              <?php endwhile; endif; ?>
            </ul>
          </div>
        </div>
</div>
    <!--FOOTER-->
    <?php get_footer(); ?>