<?php 
  /* 
   * Template Name: Search Page
   */

?>
<?php get_header(); ?>

<div class="row content" role="content">
  <div class="article-container clearfix">
    <div class="small-12 medium-8 large-7 columns">
      <?php wp_reset_postdata(); ?>
      <?php

      $query_args = explode("&", $query_string);
      $search_query = array();

      foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);

        
      } // foreach

      $search = new WP_Query($search_query);
      ?>
      <h1 class="title-red">
        <?php 
          echo "Hai cercato: " . $search_query['s'];
        ?>
      </h1>
      <?php
      if($search->have_posts()):
      ?>
      <ul class="search-list">
      <?php
        while($search->have_posts()):
          $search->the_post();
      ?>
        <li>
        <?php echo get_the_post_thumbnail(); ?>
        <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
        <?php excerpt( '50','<p>','</p>'); ?>
        </li>
      <?php
        endwhile;
      ?>
      </ul>
      <?php
      else:
        echo __('Siamo spiacenti nessun risultato trovato');
      endif;
      ?>
    </div>
    <?php wp_reset_postdata(); ?>
    <div class="small-12 medium-4 large-4 columns">
      <div class="side">
        <h2><?php echo __('Notizie dal nostro blog'); ?></h2>
        <?php
          $args = array (
            'post_type' => 'post',
            'posts_per_page' => 5
          );
          $news = new WP_Query($args);
          if($news->have_posts()): 
            while($news->have_posts()): 
              $news->the_post();
        ?>
          <h4><?php echo get_the_date('d/M/Y'); ?></h4>
          <h3><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
          <?php excerpt( '30','<p>','</p>'); ?>
        <?php
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>
</div>
<?php wp_reset_postdata(); ?>

<div class="film-archivio-bg">
  <div class="row">
    <div class="large-12 columns">
      <h2 class="section-title"><?php echo __('I nostri film'); ?></h2>
    </div>
  </div>
  <div class="last_video_container clearfix">
    <div class="row content" role="content">
      <div class="last_video clearfix">
        <?php
        $args = array (
          'post_type' => 'film',
          'posts_per_page' => 4,
          'orderby' => 'rand',
          'order' => 'ASC'
          );
        $videos = new WP_Query($args);
        if($videos->have_posts()): 
          while($videos->have_posts()): 
            $videos->the_post();
          ?>
          <div class="small-12 medium-6 large-3 columns">
            <div class="row img-archivio">
              <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php $image = get_field('locandina'); ?><img src="<?php echo $image['url']; ?>" /></a>
              <?php the_category(); ?>
            </div>
            <div class="text-container">
              <h3><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
            </div>
          </div>
          <?php
          endwhile;
          endif;
          ?>
          <div class="small-12 medium-6 large-4 columns right">
            <a href="<?php echo get_page_link_by_slug('archivio'); ?>" class="search-button right">Guarda l'archivio</a>
          </div>       
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
