  <?php
    /*
    * Template Name: Stile Archivio
    */

    if($_GET):
      $post_initial_view = $_GET['posts'];
    else:
      $post_initial_view = 4;
    endif;

    if($_GET):
      $post_orderby = $_GET['orderby'];
    else:
      $post_orderby = 'rand';
    endif;

    $args = array();
          $args['wp_query'] = array(
                                  'post_type' => 'film',
                                  'posts_per_page' => $post_initial_view,
                                  'orderby' => $post_orderby,
                                  'order' => 'ASC');
          $args['fields'][] = array(
                                  'type' => 'search',
                                  'label' => 'Cerca per titolo',
                                  'placeholder' => 'Cerca il film che fa per te...');
          $args['fields'][] = array(
                                  'type' => 'taxonomy',
                                  'label' => 'Cerca per genere',
                                  'default' => 'none',
                                  'taxonomy' => 'category',
                                  'format' => 'select',
                                  'operator' => 'AND',
                                  'term_args' => array(
                                               'hide_empty' => false,
                                               'orderby' => 'name',
                                               'order' => 'ASC'
                                              )
                                  );                         

          $args['fields'][] = array(
                                  'type' => 'submit',
                                  'value' => 'Search');

          $search = new WP_Advanced_Search($args);

  ?>

  <!--HEADER-->
  <?php get_header(); ?>
  
  <!--BODY-->
  <?php wp_reset_postdata(); ?>

  <div id="archivio" class="ricerca-bg large-12 columns">
    <div class="archivio-pg row">
      <div class="large-12 columns">
        <h2><?php echo __('Archivio'); ?></h2>
        <?php
        
          $search->the_form();

        ?>
      </div>
    </div>
  </div>
  <div class="option-visual-page row">
    <div class="large-6 columns">
      <ul class="order-film">
      <li><?php echo __('Ordina per'); ?></li>
        <li><a href="?orderby=title">Nome</a></li>
        <li><a href="?orderby=date">Più recente</a></li>
        <li><a href="?orderby=rand">Più vecchio</a></li>
      </ul>
    </div>
    <div class="large-6 end columns">
      <ul class="view-film">
      <li><?php echo __('Visualizza'); ?></li>
      <li><a href="?posts=4#archivio">4</a></li>
      <li><a href="?posts=8#archivio">8</a></li>
      <li><a href="?posts=12#archivio">12</a></li>
      <li><?php echo __('per pagina'); ?></li>
      </ul>
    </div>
  </div>
  <div class="archivio-film row">
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type'=>'film', 'orderby' => $post_orderby, 'order' => 'ASC', 'posts_per_page'=>$post_initial_view, 'paged'=>$paged)); ?>
    
    <?php
    $temp = $wp_query;
    $wp_query = $search->query();
    ?>

    <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
      <div class="layout-film large-3 small-12 columns">
        <div class="title-layout">
          <a href="<?php echo get_the_permalink(); ?>">
          <h3>
            <?php 
            $mytitle = get_the_title();
            echo $mytitle;
            ?>
          </h3>
          </a>
        </div>
          <a class="archive-img-smart" href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a>
          <a class="archive-img" href="<?php echo get_permalink(); ?>"><?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>
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
                <a href="<?php echo get_permalink($nazione->ID); ?>" title="Film di origine <?php echo $nazione ?>"><?php echo $separator . $nazione ?></a>
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
                <a href="<?php echo get_permalink($anno->ID); ?>" title="Film del <?php echo $anno ?>"><?php echo $anno;?></a>
              </h5>
            </div>
          <?php endwhile;
          else:
            echo '<p>Spiacenti. Nessun risultato trovato</p>';
          endif;


          $wp_query = $temp;
          wp_reset_query();

          ?>

          <div class="row">
          <div class="large-3 columns end right">
            <?php wpbeginner_numeric_posts_nav(); ?>
          </div>
        </div>

    </div>
  </div>
  
  <!--FOOTER-->
  <?php get_footer(); ?>
