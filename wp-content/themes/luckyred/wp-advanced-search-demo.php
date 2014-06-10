<?php
/*
Template Name: Advanced Search Demo

A custom page template to demonstrate the functionality of WP Advanced Search.
To use, simply create a new page and select "Advanced Search Demo" under
Page Attributes > Template.
*/
get_header(); 
?>

<?php wp_reset_postdata(); ?>

<div class="img-ondemand slideshow-wrapper">
    <div data-allowfullscreen="native" data-width="100%" data-ratio="1440/1500">
      <div class="slide">
        <div class='info-wrapper'>
          <img src="<?php echo get_template_directory_uri() . '/img/ondemand.png' ?>">
            <div class="row">
              <div class="ondemand"> 
                  <div class="large-12 columns">
                  <?php the_title('<h2>','</h2>'); ?>
                  </div>
                      <div class="info-title large-12 columns">

      									<?php 
      									
                          $dir_args = array(
                                        'post_type' => 'regista',
                                        'number_posts' => -1
                                      );

                          $query = new WP_Query($dir_args);
                          $i=0;
                          foreach ($query->posts as $d):
                            $directors[$i] = $d->post_title;
                            $i++;
                          endforeach;

      										$args = array();
      										$args['wp_query'] = array('post_type' => 'film',
      										                                'posts_per_page' => 5,
      										                                'order' => 'DESC',
      										                                'orderby' => 'date');


      										$args['fields'][] = array('type' => 'search',
      										                                'label' => 'Search',
      										                                'value' => '');
         

      										$args['fields'][] = array('type' => 'taxonomy',
      											                                'label' => 'Genere',
      											                                'taxonomy' => 'category',
      											                                'format' => 'select',
      											                                'operator' => 'AND');

                          $args['fields'][] = array('type' => 'meta_key',
                                                                'label' => 'Regista',
                                                                'meta_key' => 'regista',
                                                                'values' => $directors,
                                                                'format' => 'select',
                                                                'operator' => 'AND',
                                                                'orderby' => 'meta_value_num');
                          $args['fields'][] = array(
                               
                                'label' => 'Regista',
                                'values' => $directors,
                                'format' => 'select',
                                
                                'type'=> 'meta_key',
                                'post_status' => 'publish',
                                'meta_key' => 'regista',
                                'meta_value' => 'custom field value'

                              );

                       
      										$args['fields'][] = array('type' => 'taxonomy',
      											                                'label' => 'Tags',
      											                                'taxonomy' => 'post_tag',
      											                                'format' => 'checkbox',
      											                                'operator' => 'IN');

      										$args['fields'][] = array('type' => 'order',
      							                            				'label' => 'Order',
      							                            				'values' => array('' => '', 'ASC' => 'ASC', 'DESC' => 'DESC'),
      							                            				'format' => 'select');

      										$args['fields'][] = array('type' => 'submit',
      										                                'value' => 'Search');
                          $my_search_object = new WP_Advanced_Search($args);

                          $my_search_object->the_form();

                          $temp_query = $wp_query;
                          $wp_query = $my_search_object->query();

                          if($args['fields']['antani'] != '') {
                            add_filter('acf/fields/relationship/query/name=' . $directors['tapioco'], 'nomefunzione', 10,4);
                          }
                          /*
                          echo "<pre>";
                          die(var_dump($wp_query));
                          echo "</pre>";*/
      										if ( have_posts() ): 

      											while ( have_posts() ): the_post();
      											?>
                              <?php get_template_part( 'single-filmsintesize', get_post_format()); ?>

                              
                          
      											<?php
      											endwhile;


                            if($my_query->have_posts()):
                                while($my_query->have_posts()):$my_query->the_post();

                                endwhile;
                            endif;
                            wp_reset_postdata();
 

      										$my_search_object->pagination();

      										else :

      											echo 'Spiacenti, nessun risultato trovato';

      										endif;
      										
      										$wp_query = $temp_query;
      										wp_reset_query();
      									?>

      								  </div>
                     </div>
                 </div>
             </div>
          </div>
      </div>
  </div>
</div>

<?php wp_reset_postdata(); ?>
  <div class="option-visual-page row">
    <div class="large-6 columns">
      <h6><?php echo __('Ordina per'); ?></h6>
    </div>
    <div class="large-6 columns">
      <h6><?php echo __('Visualizza'); ?></h6>
    </div>
  </div>
  <div class="ondemand-film row">
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
          <a class="ondmeand-img" href="<?php echo get_permalink(); ?>"><?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>
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