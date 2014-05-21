  <?php
    
    /* Template Name: Stile Archivio */
    
  ?>

  <!--HEADER-->
  <?php get_header(); ?>
  
  <!--BODY-->
  <?php wp_reset_postdata(); ?>

  <div class="ricerca-bg large-12 columns">
    <div class="archivio-pg row">
      <div class="large-12 columns">
        <h2><?php echo __('Archivio'); ?></h2>
      </div>
    </div>
  </div>
  <div class="option-visual-page row">
    <div class="large-6 columns">
      <h6><?php echo __('Ordina per'); ?></h6>
    </div>
    <div class="large-6 columns">
      <h6><?php echo __('Visualizza'); ?></h6>
    </div>
  </div>
  <div class="archivio-film row">
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type'=>'film', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page'=>4, 'paged'=>$paged)); ?>
    <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
      <div class="layout-film large-3 columns">
          <a href="<?php echo get_the_permalink(); ?>">
          <h3>
            <?php 
            $mytitle = get_the_title();
            if (strlen($mytitle)>17) $mytitle=substr($mytitle, 0,15) . '...';
            echo $mytitle;
            ?>
          </h3>
          </a>
          <a class="archive-img" href="<?php echo get_permalink(); ?>"><?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>
          <h5><span><?php echo __('Regia:'); ?></span>  
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
              <span><?php echo __('Genere:'); ?></span> 
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
              <span><?php echo __('Nazione:'); ?></span>
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
                <span><?php echo __('Anno:'); ?></span>
                <?php
                $anno = get_field('anno');
                ?>
                <a href="<?php echo get_permalink($anno->ID); ?>" title="Film del <?php echo $anno ?>"><?php echo $anno;?></a>
              </h5>
            </div>
          <?php endwhile; endif; ?>
        </div>

        <div class="row">
          <div class="large-3 columns end right">
            <?php wpbeginner_numeric_posts_nav(); ?>
          </div>
        </div>


    </div>
  </div>
  
  <!--SIDEBAR-->
  <?php get_sidebar(); ?>
  <!--FOOTER-->
  <?php get_footer(); ?>
