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
	$post_orderby = 'rand';
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
                                  'placeholder' => 'Seleziona il genere',
                                  'taxonomy' => 'category');                          

          $args['fields'][] = array(
                                  'type' => 'submit',
                                  'value' => 'Search');

          $search = new WP_Advanced_Search($args);

?>

<div id="press" class="ricerca-bg large-12 columns">
    <div class="archivio-pg row">
      <div class="large-12 columns">
        <p>Cerca il tuo film all'interno del catalogo.<br>
        Scegli il contenuto multimediale e la risoluzione che desideri<br>
        e avvia il download.</p>
        <?php
        
          $search->the_form();

        ?>
      </div>
    </div>
  </div>
<div class="press-bg large-12 columns">
	<div class="row">
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
	      <li><a href="?posts=16#archivio">16</a></li>
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
		<div class="sezione-film large-3 columns">
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

			<dl class="tabs" data-tab>
				<dd class="tab-title">
					<a href="#film<?php echo $id; ?>-1"><img src="<?php echo get_template_directory_uri() . '/img/gallery.png' ?>"></a>
				</dd>
				<dd class="tab-title">
					<a href="#film<?php echo $id; ?>-2"><img src="<?php echo get_template_directory_uri() . '/img/video.png' ?>"></a>
				</dd>
				<dd class="tab-title">
					<a href="#film<?php echo $id; ?>-3"><img src="<?php echo get_template_directory_uri() . '/img/press.png' ?>"></a>
				</dd>
				<dd class="tab-title">
					<a href="#film<?php echo $id; ?>-4"><img src="<?php echo get_template_directory_uri() . '/img/copy.png' ?>"></a>
				</dd>
				<dd class="tab-title">
					<a href="#film<?php echo $id; ?>-5"><img src="<?php echo get_template_directory_uri() . '/img/audio.png' ?>"></a>
				</dd>
			</dl>

		</div>

		<?php endwhile; endif; ?>

		<div class="tabs-content large-12 columns">
			<div class="content" id="film<?php echo $id; ?>-1">
				

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
                      <a href="<?php echo $file['url']; ?>"><?php echo __('Download'); ?></a>
                      <?php
                      endif;
                      ?>
                      </h4>
                    </div>
                  </div>
                  <img src="<?php the_sub_field('foto_immagine'); ?>" alt="<?php the_sub_field('titolo'); ?>" />
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
              <?php endwhile;
          else:
            echo '<p>Spiacenti. Nessun risultato trovato</p>';
          endif;


          $wp_query = $temp;
          wp_reset_query();

          ?>
            </div>
          </div>


			</div>
			<div class="content" id="film<?php echo $id; ?>-2">
				<p>Second panel content goes here...</p>
			</div>
			<div class="content" id="panel2-3">
				<p>Third panel content goes here...</p>
			</div>
			<div class="content" id="panel2-4">
				<p>Fourth panel content goes here...</p>
			</div>
			<div class="content" id="panel2-5">
				<p>Fourth panel content goes here...</p>
			</div>
		</div>



	</div>




	<div class="row">
		<div class="large-3 columns end right">
			<?php wpbeginner_numeric_posts_nav(); ?>
		</div>
		
	</div>
	
</div>

<!--FOOTER-->
<?php get_footer(); ?>