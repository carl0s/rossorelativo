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
?>

<div id="press" class="ricerca-bg large-12 columns">
    <div class="archivio-pg row">
      <div class="large-12 columns">
        <p>Cerca il tuo film all'interno del catalogo.<br>
        Scegli il contenuto multimediale e la risoluzione che desideri<br>
        e avvia il download.</p>
      </div>
    </div>
  </div>
<div class="press-bg large-12 columns">
	<div class="row">
		<div class="option-visual-page row">
	    <div class="large-6 columns">
	      <ul class="order-film">
	      <li><?php echo __('Ordina per'); ?></li>
	      <li><a href="?posts=4#archivio">Nome</a></li>
	      <li><a href="?posts=8#archivio">Più recente</a></li>
	      <li><a href="?posts=16#archivio">Più vecchio</a></li>
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
	 	if (have_posts()) : while(have_posts()) : the_post();
	 	?>
		<div class="sezione-film large-3 columns">
			<div class="title-layout">
			<h4>
				<?php 
				$mytitle = get_the_title();
				echo $mytitle;
				?>
			</h4>
			</div>
			
			<a class="archive-img" href="<?php echo get_permalink(); ?>"> <?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>

			<dl class="tabs" data-tab>
				<dd class="tab-title">
					<a href="#panel2-1"><img src="<?php echo get_template_directory_uri() . '/img/gallery.png' ?>"></a>
				</dd>
				<dd class="tab-title">
					<a href="#panel2-2"><img src="<?php echo get_template_directory_uri() . '/img/video.png' ?>"></a>
				</dd>
				<dd class="tab-title">
					<a href="#panel2-3"><img src="<?php echo get_template_directory_uri() . '/img/press.png' ?>"></a>
				</dd>
				<dd class="tab-title">
					<a href="#panel2-4"><img src="<?php echo get_template_directory_uri() . '/img/copy.png' ?>"></a>
				</dd>
				<dd class="tab-title">
					<a href="#panel2-5"><img src="<?php echo get_template_directory_uri() . '/img/audio.png' ?>"></a>
				</dd>
			</dl>

		</div>

		<?php endwhile; endif; ?>

		<div class="tabs-content large-12 columns">
			<div class="content" id="panel2-1">
				<a href="<?php echo get_permalink($id) ?>">
					<p>First panel content goes here...First panel content goes here...First panel content goes here...First panel content goes here...First panel content goes here...First panel content goes here...</p>
				</a>
			</div>
			<div class="content" id="panel2-2">
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