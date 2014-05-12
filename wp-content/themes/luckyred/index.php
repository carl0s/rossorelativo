  <!--HEADER-->
  <?php get_header(); ?>
  
  <!--BODY-->
  <?php wp_reset_postdata(); ?>
  
  <!-- <script type="text/javascript">$pesticide-debug: true;</script> -->

  <div class="slider-cinema slideshow-wrapper">
    <div class="fotorama slideshow" data-nav="thumbs" data-allowfullscreen="native" data-width="100%" data-ratio="1440/750">
      <?php 
      $args = array(
        'post_type'  => 'film',
        'meta_key'   => 'in_uscita',
        'meta_value' => 'Si'
        );
      $film = new WP_Query($args);
      ?>
      <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
      <div class="slide" data-thumb="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($film->ID))[0]; // retrieving url from attached thumb as featured image ?>">
        <div class='info-wrapper'>
          <?php echo get_the_post_thumbnail($film->ID); ?>
          <div class='row'>
            <div class='info-title large-6 columns'>
              <?php the_title('<h2>','</h2>'); ?>
              <div class="row collapse">
                <div class="large-9 columns">
                  <div class='info-content'>
                    <?php excerpt('35','<p>','</p>'); ?>
                  </div>
                </div>
              </div>
              <div class="row collapse">
                <div class='film-thumb-title large-5 columns'>
                  <h4>Altri film al cinema</h4>
                </div>
              </div>
            </div>
            <div class='info-date large-1 large-offset-4 columns'>
              <?php 
              $date = DateTime::createFromFormat('Ymd', get_field('data_di_uscita'));
              ?>
              <h6>dal</h6>
              <h4><?php echo $date->format('d'); ?></h4>
              <h5><?php echo $date->format('M'); ?></h5>
              <h6>al cinema</h6>
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

<?php wp_reset_postdata(); ?>

<div class="nextexit-bg large-12 columns">
  <div class="row">
    <h2>Prossime Uscite</h2>

    <div class="slider-nextexit slideshow-wrapper">
      <div class="fotorama slideshow" data-nav="thumbs" data-width="100%" data-ratio="1440/750">
        <?php 
        $args = array(
          'post_type'  => 'film',
          'meta_key'   => 'in_uscita',
          'meta_value' => 'Si'
          );
        $film = new WP_Query($args);
        ?>
        <?php if ($film->have_posts()) : while($film->have_posts()) : $film->the_post() ; ?>
        <div class="slide" data-thumb="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($film->ID))[0]; // retrieving url from attached thumb as featured image ?>">
          <div class='info-wrapper'>
            <?php echo get_the_post_thumbnail($film->ID); ?>
            <div class='row'>
              <div class='info-title large-5 columns'>
                <?php the_title('<h2>','</h2>'); ?>
              </div>
            </div>
            <div class='row'>
              <div class='info-date large-3 large-offset-9 end columns'>
                <?php 
                $date = DateTime::createFromFormat('Ymd', get_field('data_di_uscita'));
                ?>
                <h4><?php echo $date->format('d'); ?></h4>
                <h5><?php echo $date->format('M'); ?></h5>
                <h6><?php echo $date->format('Y'); ?></h6>
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
    <a class="button right [tiny small large]">Vai alla pagina</a>
  </div>
</div>
</div>
</div>
<div class="large-12 columns">
  <div class="ondemand-bg row">
    <h2>On Demand</h2>
  </div>
</div>


<div class="blog-archivio-bg large-12 columns">
  <div class="row">
    <div class="blog large-5 columns">
      <h2>Blog</h2>
      <h4>PROVA TESTO</h4>
    </div>

    <div class="archivio large-7 columns">
      <h2>Archivio Film</h2>
      <br>
      <div class="archive-film row">  
        <?php query_posts(array('post_type'=>'film', 'posts_per_page'=>3)); ?>
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <div class="lista large-4 columns">
          <a class="archive-img"><?php echo the_post_thumbnail(array());?></a>
          <h3>
            <?php 
            $mytitle = get_the_title();
            if (strlen($mytitle)>20) $mytitle=substr($mytitle, 0,15) . '...';
            echo $mytitle;
            ?>
          </h3>
          <h5><span>Regia:</span>  
            <?php $registi = get_field('regia');
            $i = 0;
            foreach($registi as $regista):
              if($i = 0):
                $separator = ', ';
              else:
                $separator = '';
              endif;?>
              <a href="<?php echo get_permalink($regista->ID); ?>" title="Regia di <?php echo $regista->post_title; ?>"><?php echo $separator . $regista->post_title; ?></a>
              <?php
              $i++;
              endforeach;
              ?>
            </h5>
            <h5>
              <span>Genere:</span> 
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
              <span>Nazione:</span>
              <?php
              $nazioni = get_field('nazione');
              $i=0;
              foreach($nazioni as $nazione):
                if($i = 0):
                  $separator = ', ';
                else:
                  $separator = '';
                endif;?>
                <a href="<?php echo get_permalink($nazione->ID); ?>" title="Film di origine <?php echo $nazione ?>"><?php echo $separator . $nazione ?></a>
                <?php
                $i++;
                endforeach;
                ?>
              </h5>
              <h5>
                <span>Anno:</span>
                <?php
                $anno = get_field('anno');
                ?>
                <a href="<?php echo get_permalink($anno->ID); ?>" title="Film del <?php echo $anno ?>"><?php echo $anno;?></a>
              </h5>
            </div>
          <?php endwhile; endif; ?>
        </div>
        <div>
          <a class="button right [tiny small large]">Guarda l'archivio</a>
        </div>
      </div>
    </div>
  </div>
  <div class="mission large-12 columns">
    <div class="row">
      <h2>La nosta mission</h2>
      <p>Lucky Red è una società di distribuzione e produzione cinematografica, fondata nel 1987 da Andrea Occhipinti.<br>
        La socità acquista e distribuisce film considerati d'essai, attraverso festival cinematografici importanti come il festival di Cannes<br> e di Berlino.
        Lucky Red distribuisce i Italia pellicole spagnole, francesi e di molti altri paesi del mondo girate da autori di qualità e giovani emergenti.
      </p>
    </div>
  </div>
  <!--SIDEBAR-->
  <?php get_sidebar(); ?>
  <!--FOOTER-->
  <?php get_footer(); ?>

  <script>
  $(document).foundation();
  </script>
