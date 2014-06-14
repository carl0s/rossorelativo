<?php get_header(); ?>

<?php wp_reset_postdata();  ?>
<?php $category = get_the_category();  ?>
<?php
  $this_id = get_the_ID();
  foreach($category as $cat_string_item):
    $cat_string = "'" . $cat_string_item->term_id . ",";
  endforeach;
 ?>
<div class="img-film slideshow-wrapper">
  <div class="fotorama slideshow" data-nav="thumbs" data-width="100%" data-ratio="1440/750">
    <div class="slide">
      <div class='info-wrapper'>
        <?php echo get_the_post_thumbnail(); ?>
        <div class='row'>
          <div class='info-title large-6 columns'>
            <?php the_title('<h2>','</h2>'); ?>
            <div class="row collapse">
              <div class="large-9 columns">
                <div class='info-content'>
                  <p><?php echo __('Titolo originale'); ?></p>
                  <span><?php echo get_field('titolo_originale'); ?></span>
                </div>
                <div class='film-thumb-title'>
                  <h4>
                    <?php
                    if( get_field('trailer_scaricabile') ):
                      $file = get_field('trailer_scaricabile');
                    ?>
                    <a href="<?php echo $file['url']; ?>"><?php echo __('Scarica il trailer'); ?></a>
                    <?php
                    endif;
                    ?>
                  </h4>
                </div>
              </div>
            </div>
          </div>
          <div class='info-share large-1 large-offset-4 columns'>
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
    <h3><span><?php echo __('Il film') ?></span></h3>
    <div class="row">
      <div class="infofilm large-3 columns">
        <h4><?php echo __('Regia'); ?></h4>
      </div>
      <div class="content-film large-9 columns">
        <?php
        $registi = get_field('regia');
        $i = 0;
        foreach($registi as $regista):
          if($i > 0):
            $separator = ', ';
          else:
            $separator = '';
          endif;
          ?>
          <?php echo $separator; ?><a href="<?php echo get_permalink($regista->ID); ?>" title="La scheda di <?php echo $regista->post_title; ?>"><?php echo $regista->post_title; ?></a>
          <?php
          $i++;
          endforeach;
          ?>
        </div>
      </div>
      <div class="row">
        <div class="infofilm large-3 columns">
          <h4><?php echo __('Genere'); ?></h4>
        </div>
        <div class="content-film large-9 columns">
          <a><?php the_category (', '); ?></a>
        </div>
      </div>
      <div class="row">
        <div class="infofilm large-3 columns">
          <h4><?php echo __('Nazione'); ?></h4>
        </div>
        <div class="content-film large-9 columns">
          <a><?php
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
              ?></a>
            </div>
          </div>
          <div class="row">
            <div class="infofilm large-3 columns">
              <h4><?php echo __('Anno'); ?></h4>
            </div>
            <div class="content-film large-9 columns">
              <a><?php echo get_field('anno'); ?></a>
            </div>
          </div>
          <div class="row">
            <div class="infofilm large-3 columns">
              <h4><?php echo __('Durata'); ?></h4>
            </div>
            <div id="durata" class="content-film large-9 columns">
              <a><?php echo get_field('durata'); ?></a>
            </div>
          </div>
          <div class="row">
            <div class="large-3 columns">
              <h4><?php echo __('Cast'); ?></h4>
            </div>
          </div>
        </div>
        <div class="trama large-6 columns">
          <h3><span><?php echo __('La trama'); ?></span></h3>
          <p><?php the_content(); ?></p>
        </div>
      </div>
      <?php if(get_field('foto_item') && get_field('uscita_del_materiale_di_stampa') && get_field('poster') && get_field('video_item')): ?>
      <div class="row">
        <div class="download-film large-12 columns">
          <h3>Download</h3>
          <dl class="tabs" data-tab>
            <?php if(get_field('foto_item')): ?>
            <dd class="active large-2 columns">
              <a href="#panel-foto"><h4><span><?php echo __('Foto film'); ?></span></h4></a>
            </dd>
            <?php endif; ?>
            <?php if(get_field('uscita_del_materiale_di_stampa')): ?>
            <dd class="large-2 columns">
              <a href="#panel-pressbook"><h4><span><?php echo __('Pressbook'); ?></span></h4></a>
            </dd>
            <?php endif; ?>
            <?php if(get_field('poster')): ?>
            <dd class="large-2 columns">
              <a href="#panel-manifesto"><h4><span><?php echo __('Manifesto'); ?></span></h4></a>
            </dd>
            <?php endif; ?>
            <?php if(get_field('video_item')): ?>
            <dd class="large-2 columns">
              <a href="#panel-video"><h4><span><?php echo __('Clip video'); ?></span></h4></a>
            </dd>
            <?php endif; ?>
            <dd class="large-2 columns">
              <a href="#panel-dvd"><h4><span><?php echo __('Dvd Pack'); ?></span></h4></a>
            </dd>
            <dd class="large-2 columns">
              <a href="#panel-audio"><h4><span><?php echo __('Clip audio'); ?></span></h4></a>
            </dd>
          </dl>
        </div>
      </div>
      <div class="tabs-content">
        <?php if(get_field('foto_item')): ?>
        <div class="content active" id="panel-foto">
          <div class="img-film-download slideshow-wrapper">
            <div class="fotorama slideshow" data-click="false" data-nav="thumbs" data-width="100%" data-ratio="1440/750" data-thumbheight="115" data-thumbwidth="180">
              <?php if (get_field('foto_item')) : while(the_repeater_field('foto_item')) : ?>
              <div class="slide" data-thumb="<?php the_sub_field('foto_immagine'); ?>">
                <div class='info-wrapper'>
                  <div class="row">
                    <div class='film-thumb-title large-5 columns'>
                      <h4>
                      <?php
                      if( get_sub_field('download_immagine') ):
                        $file = get_sub_field('download_immagine');
                      ?>
                      <a href="<?php echo $file['url']; ?>"><?php echo __('Download immagine'); ?></a>
                      <?php
                      endif;
                      ?>
                      </h4>
                    </div>
                  </div>
                  <img src="<?php the_sub_field('foto_immagine'); ?>" alt="<?php the_sub_field('titolo'); ?>" />
                  <div class='row'>
                    <div class='info-date large-1 large-offset-11 columns'>
                        <h6 class="share">
                          Share
                          <div class="inner">
                            <div class="icons">
                            </div>
                          </div>
                        </h6>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="film-thumb large-12 columns">
                    <?php the_field('video_thumbnail'); ?>
                  </div>
                </div>
              </div>
              <?php endwhile; endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(get_field('uscita_del_materiale_di_stampa')): ?>
        <div class="content" id="panel-pressbook">
          <div class="pressbook">
            <?php echo get_the_post_thumbnail(); ?>
            <div class="large-12 columns">
            <h4>Vuoi sapere tutto ciò che riguarda il tuo film preferito?</h4>
            <h5>Hai la possibilità di scaricare il Pressbook e leggere tutte le curiosità riguardanti il film</h5>
            <?php
                if( get_field('uscita_del_materiale_di_stampa') ):
                  $file = get_field('uscita_del_materiale_di_stampa');
              ?>
                <a href="<?php echo $file['url']; ?>" class="button large"><?php echo __('Download'); ?></a>
              <?php
                endif;
              ?>
          </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(get_field('poster')): ?>
        <div class="content" id="panel-manifesto">
          <div class="manifesto">
            <?php echo get_the_post_thumbnail(); ?>
            <div class="manifesto-bg">
              <div class="large-3 large-offset-2 columns">
                <a href="<?php echo get_permalink(); ?>"><?php $manifesto = get_field('poster'); ?><img src="<?php echo $manifesto['url']; ?>" /></a>
              </div>
              <div class="large-6 large-offset-1 columns">
                <h4>Il manifesto del film</h4>
                <h6><span>Formato:</span> <?php echo get_field('formato_manifesto'); ?></h6><br><br>
                <h6><span>Misure:</span> <?php echo get_field('misure_manifesto'); ?></h6><br><br>
                <h6><span>Risoluzione:</span> <?php echo get_field('risoluzione_manifesto'); ?></h6>
                <?php
                  if( get_field('poster') ):
                    $file = get_field('poster');
                ?>
                  <a href="<?php echo $file['url']; ?>" class="button left large"><?php echo __('Download'); ?></a>
                <?php
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(get_field('video_item')): ?>
        <div class="content" id="panel-video">
          <!-- GALLERY DI VIDEO -->
          <?php $items = get_field('video_item'); ?>

          <div class="video-film-download fotorama" data-click="false" data-nav="thumbs" data-thumbheight="115" data-thumbwidth="180">
            <?php
              while(the_repeater_field('video_item')) :
            ?>
            <a href="<?php the_sub_field('video_link'); ?>" data-caption="
              <div class='info-wrapper'>
                  <div class='row'>
                    <div class='film-thumb-title large-5 columns'>
                    <h4>
                    <?php
                      if( get_sub_field('download_video') ):
                        $file = get_sub_field('download_video');
                      ?>
                      <a href='<?php echo $file['url']; ?>'><?php echo __('Download video'); ?></a>
                      <?php
                      endif;
                      ?>
                    </h4>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='info-date large-1 large-offset-11 columns'>
                      <h6>Share</h6>
                    </div>
                  </div>
            ">
              <img src="<?php the_sub_field('foto_video'); ?>" alt="<?php the_sub_field('titolo_video'); ?>">
            </a>
            <?php
            endwhile;
            ?>
          </div>
          <!-- END GALLERY -->
        </div>
        <?php endif; ?>
        <div class="content" id="panel-dvd">
          <div class="pressbook">
            <?php echo get_the_post_thumbnail(); ?>
          </div>
        </div>
        <div class="content" id="panel-audio">
          <div class="pressbook">
            <?php echo get_the_post_thumbnail(); ?>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="row">
      <div class="large-12 columns">
        <div class="slider-film-simili slideshow-wrapper">
          <div class="fotorama slideshow" data-transition="crossfade" data-nav="thumbs" data-width="100%" data-ratio="1180/460" data-thumbheight="255" data-thumbwidth="185">
            <?php 
            $args = array(
              'post_type'  => 'film',
              'cat' => $cat_string,
              );
            wp_reset_postdata();
            $film = new WP_Query($args);
            ?>
            <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
              <?php if(get_the_ID() != $this_id): ?>
              <div class="slide" data-thumb="<?php echo wp_get_attachment_image_src($image = get_field('locandina'));?><?php echo $image['url']; ?>">
                <div class="altri-film">
                  <a href="<?php echo get_permalink(); ?>"><span>Guarda anche: </span><?php the_title(); ?></a>
                </div>
                <div class='info-wrapper'>
                  <?php echo get_the_post_thumbnail($film->ID); ?>
                </div>
              </div>
            <?php endif; ?>
            <?php endwhile; endif; ?>
          </div>
        </div>

      </div>

    </div>

    <?php get_footer(); ?>