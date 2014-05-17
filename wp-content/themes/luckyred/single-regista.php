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
    <h3>Film dal catalogo lucky red:</h3>
    <div class="slider-film-catalogo slideshow-wrapper">
      <div class="fotorama slideshow" data-transition="crossfade" data-nav="thumbs" data-width="100%" data-ratio="1180/460" data-thumbheight="255" data-thumbwidth="185">
        <?php 
        $args = array(
          'post_type'  => 'film',
          );
        $film = new WP_Query($args);
        ?>
        <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
        <div class="slide" data-thumb="<?php echo wp_get_attachment_image_src($image = get_field('locandina'));?><?php echo $image['url']; ?>">
          <a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a>
          <div class='info-wrapper'>
            <?php echo get_the_post_thumbnail($film->ID); ?>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>

  </div>
</div>


<div class="altri-film-bg large-12 columns">
  <div class="row">
    <h2><span>Altri film</span></h2>
    <?php wp_reset_postdata();  ?>
      <?php $film_registi = get_field('film_regista'); ?>
      <?php if($film_registi): ?>
        <?php foreach ($film_registi as $film_regista): ?>
          <h6>
            <a href=""><?php echo get_the_title($film_regista->ID); ?></a>
          </h6>
        <?php endforeach; ?>
      <?php endif;?>
  </div>
</div>


<div class="altri-film-bg large-12 columns">
  <div class="row">
    <h2><span>Altri film</span></h2>
    <?php wp_reset_postdata();  ?>
      <?php $film_registi = get_field('film_regista'); ?>
      <?php if($film_registi): ?>
        <?php foreach ($film_registi as $film_regista): ?>
          <h6>
            <a href=""><?php echo get_the_title($film_regista->ID); ?></a>
          </h6>
        <?php endforeach; ?>
      <?php endif;?>
  </div>
</div>
    <!--FOOTER-->
    <?php get_footer(); ?>