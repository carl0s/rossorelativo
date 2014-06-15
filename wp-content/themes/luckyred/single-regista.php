  <?php get_header(); ?>

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
    <h2>Filmografia</h2>
    <h3>Film dal catalogo lucky red:</h3>
    <div class="slider-film-catalogo slideshow-wrapper">
      <div class="fotorama slideshow" data-transition="crossfade" data-nav="thumbs" data-width="100%" data-ratio="1180/460" data-thumbheight="255" data-thumbwidth="185">
        <?php if (have_posts()) : while(have_posts()) : the_post() ; ?>
        <?php 
        $filmografie = get_posts(array(
          'post_type'  => 'film',
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
              <ul>
              <?php foreach( $filmografie as $filmografia ): ?>
                <?php 
                $id = $filmografia->ID;
                $photo = get_field('locandina', $filmografia->ID);
                ?>
                <div class="slide" data-thumb="<?php echo wp_get_attachment_image_src($photo['id'])[0];?>">
                  <a href="<?php echo get_the_permalink($id); ?>"> <?php echo $filmografia->post_title; ?></a>
                  <div class='info-wrapper'>
                    <?php echo get_the_post_thumbnail($filmografia->ID); ?>
                  </div>
                </div>
              <?php endforeach; ?>
              </ul>
            <?php endif; ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
  </div>
</div>

<div class="altri-film-bg large-12 columns">
  <div class="row">
    <h3><span>Altri film</span></h3>

    <?php query_posts(array('post_type'=>'regista')); ?>
    <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
    <ul>
      <?php $registi = get_field('film_regista')?>
      <?php if($registi):?>
      <?php foreach($registi as $regista):?>
      <li>
        <a href="<?php echo get_permalink($regista->ID); ?>"><?php echo get_the_title($regista->ID); ?></a>
      </li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
<?php endwhile; endif; ?>
  </div>
</div>
    <!--FOOTER-->
    <?php get_footer(); ?>