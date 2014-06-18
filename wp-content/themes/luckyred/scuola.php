 <?php
 /*
  * Template Name: Stile Scuola
  */
 ?>

 <!--HEADER-->
 <?php get_header(); ?>

 <!--BODY-->
 <?php wp_reset_postdata(); ?>
 <?php 
 if($_GET):
   $post_orderby = $_GET['orderby'];
 else:
   $post_orderby = 'title';
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
                                  'default' => '',
                                  'allow_null' => 'Scegli un genere',
                                  'taxonomy' => 'category',
                                  'format' => 'select',
                                  'operator' => 'AND',
                                  'term_args' => array(
                                                       'hide_empty' => true,
                                                       'orderby' => 'name',
                                                       'order' => 'ASC'
                                                      )
                                  );                         

          $args['fields'][] = array(
                                  'type' => 'submit',
                                  'value' => 'Search');

          $search = new WP_Advanced_Search($args);

 ?>

 <div id="archivio" class="ricerca-bg-sc large-12 columns">
    <div class="scuola-pg row">
      <div class="large-12 columns">
        <h2><?php echo __('Catalogo Scuole'); ?></h2>
        <p>Il nostro catalogo riservato alle scuole include film adatti alla visione in ambito didattico, per bambini e ragazzi dai 4 ai 16 anni.
        Per gli insegnanti è possibile scaricare gratuitamente materiali utili per l'analisi del film e delle sue tematiche.</p>
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
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type'=>'film', 'meta_key'=> 'scuola',
      'meta_value' => 'Si', 'orderby'=>$post_orderby, 'order'=>'ASC', 'posts_per_page'=>4, 'paged'=>$paged)); 
?>
<?php
if (have_posts()) : while(have_posts()) : the_post();
?>
<div id="scuola" class="row">
  <div id="sezione-film" class="large-12 small-12 columns">
    <ul>
      <li><h4>
        <?php 
        $mytitle = get_the_title();
        echo $mytitle;
        ?>
      </h4></li>
      <li><h3><span><?php echo __('Età consigliata '); ?></span><?php echo get_field('limite_età'); ?></h3></li>
    </ul>
  </div>
  <div class="sezione-film large-3 small-12 columns">
    <div class="img-device">
      <?php echo get_the_post_thumbnail(); ?>
    </div>
    <a class="archive-img" href="<?php echo get_permalink(); ?>"> <?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" ></a>
 </div>
 <div class="text-film large-6 small-12 columns">
  <p class="descrizione-scuole">
     <?php echo get_field('descrizione'); ?>
     <div class="white-gradient"><button class="bottone-scuola"></button></div>
  </p>
  <a href="<?php echo get_field('link_trailer'); ?>" class="trailer" target="_blank"><h5>Guarda il trailer</h5></a>
 </div>
  <div class="info-film-scuola large-3 columns">
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
      <div id="button-scuola">
        <?php
          if( get_field('scheda_del_film') ):
          $file = get_field('scheda_del_film');
        ?>
        <a href="<?php echo $file['url']; ?>" class="button expand"><?php echo __('Scheda del film'); ?></a>
        <?php
          endif;
        ?>
        <?php
          if( get_field('spunti_didattici') ):
          $file = get_field('spunti_didattici');
        ?>
        <a href="<?php echo $file['url']; ?>" class="button expand"><?php echo __('Spunti didattici'); ?></a>
        <?php
          endif;
        ?>
     </div>
   </div>
</div>
<?php endwhile; endif; ?>
</div>

<!--FOOTER-->
<?php get_footer(); ?>

