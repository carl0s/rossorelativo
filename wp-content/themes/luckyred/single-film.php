<?php get_header(); ?>

<?php wp_reset_postdata();  ?>

<div class="img-film slideshow-wrapper">
    <div class="fotorama slideshow" data-nav="thumbs" data-allowfullscreen="native" data-width="100%" data-ratio="1440/750">
      <div class="slide">
        <div class='info-wrapper'>
          <?php echo get_the_post_thumbnail(); ?>
          <div class='row'>
            <div class='info-title large-6 columns'>
              <?php the_title('<h2>','</h2>'); ?>
              <div class="row collapse">
                <div class="large-9 columns">
                  <div class='info-content'>
                    <p>Titolo originale</p>
                    <span><?php echo get_field('titolo_originale'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row collapse">
                <div class='film-thumb-title large-5 columns'>
                  <h4>Gallery</h4>
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
<div class="info-film row">
  <div class="large-6 columns">
    <h3><span>Il film</span></h3>
    <h4>Regia 
      <span>
      <?php
      $registi = get_field('regia');
      $i = 0;
      foreach($registi as $regista):
        if($i = 0):
          $separator = ', ';
        else:
          $separator = '';
        endif;
    ?>
        <a href="<?php echo get_permalink($regista->ID); ?>" title="La scheda di <?php echo $regista->post_title; ?>"><?php echo $separator . $regista->post_title; ?></a>
    <?php
        $i++;
      endforeach;
    ?>
    </span>
    </h4>
    <h4>Genere 
    <span>
      <?php the_category (', '); ?>
    </span> 
    </h4>
    <h4>Nazione 
    <span>
    <a>
    <?php
      $nazioni = get_field('nazione');
      $i = 0;
      foreach ($nazioni as $nazione):
        if($i > 0):
          $separator = ', ';
        else:
          $separator = '';
        endif;
        echo $nazione;
        $i++; 
      endforeach;
    ?>
    </a>
    </span>
    </h4>
    <h4>Anno 
    <span>
    <a><?php echo get_field('anno'); ?></a>
    </span>
    </h4>
    <p><?php the_content(); ?></p>
  </div>
  <div class="large-6 columns">
    <h3><span>Il cast</span></h3>
  </div>
  <div class="download-film large-12 columns">
    <h3>Download</h3>
  </div>
  <div class="download-film large-2 columns">
    <h4><span>Foto film</span></h4>
  </div>
  <div class="download-film large-2 columns">
    <h4><span>Pressbook</span></h4>
  </div>
  <div class="download-film large-2 columns">
    <h4><span>Manifesto</span></h4>
  </div>
  <div class="download-film large-2 columns">
    <h4><span>Clip video</span></h4>
  </div>
  <div class="download-film large-2 columns">
    <h4><span>Dvd Pack</span></h4>
  </div>
  <div class="download-film large-2 columns">
    <h4><span>Clip audio</span></h4>
  </div>
</div>
<div class="img-film-download slideshow-wrapper">
    <div class="fotorama slideshow" data-nav="thumbs" data-width="100%" data-ratio="1440/750">
      <div class="slide">
        <div class='info-wrapper'>
          <?php echo get_the_post_thumbnail(); ?>
          <div class='row'>
            <div class='info-date large-1 large-offset-11 columns'>
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



<?php get_footer(); ?>