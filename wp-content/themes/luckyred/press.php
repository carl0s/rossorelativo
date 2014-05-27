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
?>

<div class="press-bg large-12 columns">
	<div class="row">
		<div class="first-menu large-6 columns">
			<ul class="selected">
				<li><h5>Ordina per</h5></li>
				<li><a href="?orderby=title">Nome</a></li>
				<li><a href="?orderby=date">Più recente</a></li>
				<li><a href="?orderby=rand">Più vecchio</a></li>
			</ul>
		</div>
		<div class="large-6 columns right">
			<ul class="selected">
				<li><h5>Visualizza</h5></li>
				<li><a href="#">9</a></li>
				<li><a href="#">12</a></li>
				<li><a href="#">18</a></li>
				<li><h5>per pagina</h5></li>
			</ul>
		</div>
		


		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type'=>'film', 'orderby'=>$post_orderby, 'order'=>'ASC', 'posts_per_page'=>4, 'paged'=>$paged)); ?>
		<?php


	 	if (have_posts()) : while(have_posts()) : the_post();
	 	?>
		<div class="sezione-film large-3 columns">
			<h4>
				<?php 
				$mytitle = get_the_title();
				echo $mytitle;
				?>
			</h4>
			
			<a class="archive-img" href="<?php echo get_permalink(); ?>"> <?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>
			

			<ul id="og-grid" class="og-grid">
				<li>
					<a data-largesrc="<?php echo get_template_directory_uri() . '/img/blur.png' ?>" data-title="<?php echo get_the_title(); ?>" data-description="<?php echo get_the_content(); ?>">
						<img src="<?php echo get_template_directory_uri() . '/img/gallery.png' ?>" alt="img01"/>
					</a>
				</li>
				<li>
					<a class="hide"><img class="press-icone" src="<?php echo get_template_directory_uri() . '/img/video.png' ?>"></a>
				</li>
				
				<li>
					<a class="hide"><img class="press-icone2" src="<?php echo get_template_directory_uri() . '/img/press.png' ?>"></a>
				</li>
				
				<li>
					<a class="hide"><img class="press-icone2" src="<?php echo get_template_directory_uri() . '/img/copy.png' ?>"></a>
				</li>
				
				<li>
					<a class="hide"><img class="press-icone2" src="<?php echo get_template_directory_uri() . '/img/audio.png' ?>"></a>
				</li>
			</ul>

		</div>
		<?php endwhile; endif; ?>

	</div>

	<div class="row">
		<div class="large-3 columns end right">
			<?php wpbeginner_numeric_posts_nav(); ?>
		</div>
		
	</div>
	
</div>

<!--FOOTER-->
<?php get_footer(); ?>