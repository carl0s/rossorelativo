  <!--HEADER-->
  <?php get_header(); ?>
  
  <!--BODY-->
  <?php wp_reset_postdata(); ?>
  
  <!-- <script type="text/javascript">$pesticide-debug: true;</script> -->

  <!-- PROVA NEW SLIDE -->

  <div class="fotorama slider-cinema" data-click="false" data-nav="thumbs" data-width="100%" data-ratio="1440/750" data-thumbheight="115" data-thumbwidth="180">
    <?php 
    $args = array(
      'post_type'  => 'film',
      'meta_key'   => 'in_uscita',
      'meta_value' => 'No',
      'posts_per_page' => 4,
      'orderby' => 'title',
      'order' => 'ASC'
      );
    $film = new WP_Query($args);
    ?>
    <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
      <a href="<?php the_field('link_trailer'); ?>" data-caption="
        <div class='info-wrapper'>
          <div class='row'>
            <div class='film-thumb-title large-5 columns'>
              <h4><?php echo __('Altri film al cinema'); ?></h4>
            </div>
          </div>
          <div class='row'>
            <div class='info-title large-6 columns'>
              <a href='<?php echo get_the_permalink(); ?>'><?php the_title('<h2>','</h2>'); ?></a>
              <div class='row collapse'>
                <div class='large-9 columns'>
                  <div class='info-content'>
                    <?php excerpt('35','<p>','</p>'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class='info-date large-1 large-offset-4 columns'>
              <h6><?php echo __('dal'); ?></h6>
              <h4><?php echo date_i18n('j', strtotime(get_field('data_di_uscita'))); ?></h4>
              <h5><?php echo date_i18n('F', strtotime(get_field('data_di_uscita'))); ?></h5>
              <h6><?php echo __('al cinema'); ?></h6>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='film-thumb large-12 columns'>
            <?php the_field('video_thumbnail'); ?>
          </div>
        </div>
        ">
        <img src='<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($film->ID), 'full')[0]; ?>'>
      </a>
    <?php endwhile; endif; ?>
  </div>

  <!-- FINE PROVA NEW SLIDE -->

<?php wp_reset_postdata(); ?>

<div name="prossime-uscite" id="prossime-uscite" class="nextexit-bg">
    <div class="row">
      <h2><?php echo __('Prossime uscite'); ?></h2>

      <div class="slider-nextexit slideshow-wrapper">
        <div class="fotorama slideshow" data-click="false" data-auto="false" data-nav="thumbs" data-width="100%" data-ratio="1180/360" data-thumbheight="112" data-thumbwidth="180">
          <?php 
          $args = array(
            'post_type'  => 'film',
            'meta_key'   => 'in_uscita',
            'meta_value' => 'Si',
            'posts_per_page' => 3,
            'orderby' => 'menu_order',
            'order' => 'ASC'
            );
          $film = new WP_Query($args);
          ?>
          <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
          <div class="slide" data-thumb="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; // retrieving url from attached thumb as featured image ?>">
            <div class='info-wrapper' data-film-link="<?php echo get_the_permalink(get_the_ID()); ?>">
              <?php echo get_the_post_thumbnail(); ?>
              <div class='row'>
                <div class='info-title large-5 columns'>
                  <a href="<?php echo get_the_permalink(); ?>"><?php the_title('<h2>','</h2>'); ?></a>
                </div>
              </div>
              <div class='row'>
                <div class='info-date large-3 large-offset-9 end columns'>
                  <h4><?php echo date_i18n('j', strtotime(get_field('data_di_uscita'))); ?></h4>
                  <h5><?php echo date_i18n('F', strtotime(get_field('data_di_uscita'))); ?></h5>
                  <h6><?php echo date_i18n('Y', strtotime(get_field('data_di_uscita'))); ?></h6>
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
      <a href="" class="cta-page button right"><?php echo __('Vai al film'); ?></a>
    </div>
  </div>
</div>

<?php wp_reset_postdata(); ?>

<div class="ondemand-bg">
  <div class="row">
    <a href="<?php echo get_page_link_by_slug('on demand'); ?>"><h2><?php echo __('Home video'); ?></h2></a>
    <div class="slider-ondemand slideshow-wrapper">
      <div class="fotorama slideshow" data-click="false" data-transition="crossfade" data-nav="thumbs" data-width="100%" data-ratio="1180/360" data-thumbheight="260" data-thumbwidth="180">
        <?php 
        $args = array(
          'post_type'  => 'film',
          'meta_key'   => 'on_demand',
          'meta_value' => 1,
          'posts_per_page' => 3
          );
        $film = new WP_Query($args);
        ?>
        <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
        <?php wp_get_attachment_image_src($image = get_field('locandina'));?>
        <div class="slide" data-thumb="<?php echo $image['url']; ?>">
          <div class='info-wrapper'>
            <?php echo get_the_post_thumbnail($film->ID); ?>
            <div class='row'>
              <div class='info-title large-5 large-offset-7 end columns'>
                <a href="<?php echo get_the_permalink(); ?>"><?php the_title('<h2>','</h2>'); ?></a>
                <div class="row collapse">
                  <div class="large-9 columns">
                    <div class='info-content'>
                      <?php excerpt('35','<p>','</p>'); ?>
                    </div>
                  </div>
                </div>
                <a href="<?php echo get_the_permalink($film->ID); ?>" class="button right"><?php echo __('Vai al film'); ?></a>
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
</div>

<div class="blog-archivio-bg">
  <div class="row">
    <div class="blog large-5 columns">
      <a href="<?php echo get_page_link_by_slug('blog'); ?>"><h2><?php echo __('Blog'); ?></h2></a>
      <br>
      <?php query_posts(array('post_type'=>'post', 'posts_per_page'=>1)); ?>
      <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
      <?php echo get_the_post_thumbnail(); ?>
      <h4><span><?php echo the_title(); ?></span></h4>
      <p><?php excerpt('50','<p>','</p>'); ?></p>
      <?php endwhile; endif; ?>
      <div>
          <a href="<?php echo get_permalink(); ?>" class="button right">Leggi articolo</a>
      </div>
    </div>

    <div class="archivio large-7 columns">
      <h2><?php echo __('Archivio Film'); ?></h2>
      <br>
      <div class="archive-film row">  
        <?php query_posts(array('post_type'=>'film', 'posts_per_page'=>3)); ?>
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <div class="large-4 columns">
          <a class="archive-img" href="<?php echo get_permalink(); ?>"><?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>
          <div class="title-layout">
            <a href="<?php echo get_permalink(); ?>">
              <h3>
                <?php 
                $mytitle = get_the_title();
                echo $mytitle;
                ?>
              </h3>
            </a>
          </div>
          <h5><span><?php echo __('Regia'); ?></span>  
            <?php $registi = get_field('regia');
            $i = 0;
            foreach($registi as $regista):
              if($i > 0):
                $separator = ', ';
              else:
                $separator = '';
              endif;?>
              <?php echo $separator; ?><a href="<?php echo get_permalink($regista->ID); ?>" title="La scheda di <?php echo $regista->post_title; ?>"><?php echo $regista->post_title; ?></a>
              <?php
              $i++;
              endforeach;
              ?>
            </h5>
            <h5>
              <span><?php echo __('Genere'); ?></span> 
              <?php
              $categories = get_the_category();
              $separator = ' ';
              $output = '';
              if($categories){
                foreach($categories as $category) {
                  $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                }
                echo trim($output, $separator);
              }
              ?>
            </h5> 
            <h5>
              <span><?php echo __('Nazione'); ?></span>
              <?php
              $nazioni = get_field('nazione');
              $i=0;
              foreach($nazioni as $nazione):
                if($i = 0):
                  $separator = ', ';
                else:
                  $separator = '';
                endif;?>
                <a title="Film di origine <?php echo $nazione ?>"><?php echo $separator . $nazione ?></a>
                <?php
                $i++;
                endforeach;
                ?>
              </h5>
              <h5>
                <span><?php echo __('Anno'); ?></span>
                <?php
                $anno = get_field('anno');
                ?>
                <a title="Film del <?php echo $anno ?>"><?php echo $anno;?></a>
              </h5>
            </div>
          <?php endwhile; endif; ?>
        </div>
        <div>
          <a href="<?php echo get_page_link_by_slug('archivio'); ?>" class="button right">Guarda l'archivio</a>
        </div>
      </div>
    </div>
  </div>
<div class="mission">
  <div class="row collapse">
    <div class="large-12 column">
      <h2><?php echo __('La nostra mission'); ?></h2>
      <p>Lucky Red è una società di distribuzione e produzione cinematografica, fondata nel 1987 da Andrea Occhipinti.<br>
        La socità acquista e distribuisce film considerati d'essai, attraverso festival cinematografici importanti come il festival di Cannes<br> e di Berlino.
        Lucky Red distribuisce i Italia pellicole spagnole, francesi e di molti altri paesi del mondo girate da autori di qualità e giovani emergenti.
      </p>
    </div>
  </div>
</div>

<!--FOOTER-->
  <?php get_footer(); ?>
