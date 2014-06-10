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
      <h1 class="title-red">
        <?php 
        global $query_string;

        $query_args = explode("=", $query_string);
        $query_args = explode("%2B", $query_args[1]);
        foreach($query_args as $arg):
          echo $arg . ', ';
        endforeach;
        ?>
      </h1>
      <?php

      $query_args = explode("&", $query_string);
      $search_query = array();

      foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);

        var_dump($search_query);
      } // foreach

      $search = new WP_Query($search_query);
      if($search->have_posts()):
      ?>
      <ul class="search-list">
      <?php
        while($search->have_posts()):
          $search->the_post();
      ?>
        <li>
        <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
        <?php the_excerpt(); ?>
        </li>
      <?php
        endwhile;
      ?>
      </ul>
      <?php
      else:
        echo __('Nessun risultato');
      endif;
      ?>
    </div>
    <?php wp_reset_postdata(); ?>
    <div class="small-12 medium-4 large-4 columns">
      <div class="side">
        <h2><?php echo __('ultime notizie'); ?></h2>
        <?php
          $args = array (
            'post_type' => 'post',
            'posts_per_page' => '2'
          );
          $news = new WP_Query($args);
          if($news->have_posts()): 
            while($news->have_posts()): 
              $news->the_post();
        ?>
          <h4><?php echo get_the_date('d/M/Y'); ?></h4>
          <h3><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
        <?php
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>
</div>
<?php wp_reset_postdata(); ?>

<div class="row">
  <div class="large-12 columns">
    <h2 class="section-title"><?php echo __('ultimi video'); ?></h2>
  </div>
</div>
<div class="last_video_container clearfix">
  <div class="row content" role="content">
    <div class="last_video clearfix">
      <?php
        $args = array (
          'post_type' => 'video',
          'posts_per_page' => '3'
        );
        $videos = new WP_Query($args);
        if($videos->have_posts()): 
          while($videos->have_posts()): 
            $videos->the_post();
      ?>
        <div class="small-12 medium-6 large-4 columns">
          <div class="video-item">
            <div class="thumb">
              <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_post_thumbnail('home-video-small'); ?></a>
              <?php the_category(); ?>
            </div>
            <div class="text-container">
              <h2><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
              <div class="share">
                <span><?php echo __('share on'); ?></span>
                <div class="icons"></div>
              </div>
            </div>
          </div>
        </div>
      <?php
          endwhile;
        endif;
      ?>
      <div class="small-12 medium-6 large-4 columns right">
        <div class="right">
          <a href="#load-more">
            <?php echo __('Altri video'); ?>
          </a>
        </div>
      </div>       
    </div>
  </div>
</div>
<?php get_footer(); ?>
