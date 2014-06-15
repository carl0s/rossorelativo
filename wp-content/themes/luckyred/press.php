<?php
/*
Template Name:  Press
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

if($_GET):
  $post_initial_view = $_GET['posts'];
else:
  $post_initial_view = 4;
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

<div id="press" class="ricerca-bg-pr">
    <div class="archivio-pg row">
      <div class="large-12 medium-12 columns">
      	<h2><?php echo __('Catalogo Press'); ?></h2><br>
        <p>Cerca il tuo film all'interno del catalogo.
        Scegli il contenuto multimediale e la risoluzione che desideri e avvia il download.</p>
        <?php
        
          $search->the_form();

        ?>
      </div>
    </div>
  </div>
<div class="press-bg">
	<div class="row">
		<div class="option-visual-page row">
	    <div class="large-6 medium-6 columns">
	      <ul class="order-film">
	      <li><?php echo __('Ordina per'); ?></li>
	      <li><a href="?orderby=title">Nome</a></li>
	      <li><a href="?orderby=date">Più recente</a></li>
	      <li><a href="?orderby=rand">Più vecchio</a></li>
	      </ul>
	    </div>
	    <div class="large-6 medium-6 columns">
	      <ul class="view-film">
	      <li><?php echo __('Visualizza'); ?></li>
	      <li><a href="?posts=4#archivio">4</a></li>
	      <li><a href="?posts=8#archivio">8</a></li>
	      <li><a href="?posts=12#archivio">12</a></li>
	      <li><?php echo __('per pagina'); ?></li>
	      </ul>
	    </div>
  </div>
		

		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type'=>'film', 'orderby'=>$post_orderby, 'order'=>'ASC', 'posts_per_page'=>$post_initial_view, 'paged'=>$paged)); ?>
		
		<?php
    $temp = $wp_query;
    $wp_query = $search->query();
    ?>

		<?php
	 	if (have_posts()) : while(have_posts()) : the_post();
	 	?>
		<div class="sezione-film large-3 medium-4 columns">
			<div class="title-layout">
			<h4>
				<?php 
				$mytitle = get_the_title();
				echo $mytitle;
				$id = get_the_ID();
				?>
			</h4>
			</div>
      
			<a class="archive-img-smart" href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a>
			<a class="archive-img" href="<?php echo get_permalink(); ?>"> <?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>

			<a href="<?php echo get_permalink($id); ?>#panel-foto"><img src="<?php echo get_template_directory_uri() . '/img/gallery.png' ?>"></a>
			<a href="<?php echo get_permalink($id); ?>#panel-video"><img src="<?php echo get_template_directory_uri() . '/img/video.png' ?>"></a>
			<a href="<?php echo get_permalink($id); ?>#panel-manifesto"><img src="<?php echo get_template_directory_uri() . '/img/press.png' ?>"></a>
			<a href="<?php echo get_permalink($id); ?>#panel-pressbook"><img src="<?php echo get_template_directory_uri() . '/img/copy.png' ?>"></a>
			<a href="<?php echo get_permalink($id); ?>#panel-audio"><img src="<?php echo get_template_directory_uri() . '/img/audio.png' ?>"></a>

		</div>

	<?php endwhile; ?>
	<div class="row">
		<div class="pagination large-3 medium-3 columns end right">
			<?php $search->pagination(array('prev_text' => '«','next_text' => '»')); ?>
		</div>
	</div>
	<?php
	else:
		echo '<p>Spiacenti. Nessun risultato trovato</p>';
	endif;


	$wp_query = $temp;
	wp_reset_query();

	?>
</div>
</div>


</div>
	
</div>

<!--FOOTER-->
<?php get_footer(); ?>