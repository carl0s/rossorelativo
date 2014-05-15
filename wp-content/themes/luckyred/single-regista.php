<?php get_header(); ?>

<?php wp_reset_postdata();  ?>

<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        
        pausePlay: true,
        start: function(slider){
          $('body').removeClass('loading');
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
  <section class="slider">
    <div class="flexslider carousel">
      <ul class="slides">
        <?php query_posts(array('post_type'=>'film')); ?>
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <li><a href="<?php echo get_permalink(); ?>"><?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a></li>
      <?php endwhile; endif; ?>
      </ul>
    </div>
  </section>
</div>
    <!--FOOTER-->
    <?php get_footer(); ?>