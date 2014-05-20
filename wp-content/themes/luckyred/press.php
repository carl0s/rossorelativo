<?php
/*
Template Name:  Press
*/
?>

<!--HEADER-->
<?php get_header(); ?>

<!--BODY-->
<?php wp_reset_postdata(); ?>

<div class="press-bg large-12 columns">
	<div class="row">
		<div class="first-menu large-6 columns">
			<ul class="selected">
				<li><h5>Ordina per</h5></li>
				<li><a data-filter="nome" href="#">Nome</a></li>
				<li><a data-filter="recente" href="#">Più recente</a></li>
				<li><a href="#">Più vecchio</a></li>
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
		

		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type'=>'film', 'orderby'=>'title', 'order'=>'ASC', 'posts_per_page'=>5, 'paged'=>$paged)); ?>
		<?php if (have_posts()) : while(have_posts()) : the_post();?>
		<div class="sezione-film large-4 columns">
			<h4>
				<?php 
				$mytitle = get_the_title();
				if (strlen($mytitle)>30) $mytitle=substr($mytitle, 0,30) . '...';
				echo $mytitle;
				?>
			</h4>
			<div>
			<a class="archive-img" href="<?php echo get_permalink(); ?>"> <?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>
			<ul id="og-grid" class="og-grid">
				<li>
					<a href="luckyred.dev/press/" data-largesrc="img/logo.png">
						<img class="press-icone" src="<?php echo get_template_directory_uri() . '/img/images.svg' ?>">
					</a>
					<div class="og-expander">
						<div class="og-expander-inner">
							<span class="og-close"></span>
							<div class="og-fullimg">
								<div class="og-loading"></div>
								<img src="img/logo.png">
							</div>
							<div class="og-details">
								<h3>Veggies sunt bona vobis</h3>
								<p>Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.</p>
								<a href="http://cargocollective.com/jaimemartinez/">Visit website</a>
							</div>
						</div>
					</div>
				</li>
				<li>
					<a href="#"><img class="press-icone" src="<?php echo get_template_directory_uri() . '/img/film.svg' ?>"></a>
				</li>
				<li>
					<a href="#"><img class="press-icone2" src="<?php echo get_template_directory_uri() . '/img/file.svg' ?>"></a>
				</li>
				<li>
					<a href="#"><img class="press-icone2" src="<?php echo get_template_directory_uri() . '/img/copy.svg' ?>"></a>
				</li>
				<li>
					<a href="#"><img class="press-icone2" src="<?php echo get_template_directory_uri() . '/img/headphones.svg' ?>"></a>
				</li>
			</ul>
			
			
			
			
			

			


			</div>


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

<!--FOOTER-->
<?php get_footer(); ?>