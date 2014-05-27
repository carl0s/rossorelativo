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
		

		<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		query_posts(array(
									'post_type'=>'film', 
									'orderby'=>'title', 
									'order'=>'ASC', 
									'posts_per_page'=>3, 
									'paged'=>$paged)
								); 
		
	 	if (have_posts()) : while(have_posts()) : the_post();
	 	?>
		<div class="sezione-film large-4 columns">
			<h4>
				<?php 
				$mytitle = get_the_title();
				echo $mytitle;
				?>
			</h4>
			
			<a class="archive-img" href="<?php echo get_permalink(); ?>"> <?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>
			
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