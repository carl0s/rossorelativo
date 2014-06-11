

<?php get_header(); ?>

<?php wp_reset_postdata(); ?>

<?php
if($_GET):
  $post_initial_view = $_GET['posts'];
else:
  $post_initial_view = 4;
endif;
?>

<div id="blog" class="large-12 columns">

  <div class="row">
    <div class="option-visual-page row">
      <div class="large-6 columns">
        <ul class="order-film">
        <li><?php echo __('Ordina per'); ?></li>
        <li><a href="?posts=4#">Nome</a></li>
        <li><a href="?posts=8#">Più recente</a></li>
        <li><a href="?posts=16#">Più vecchio</a></li>
        </ul>
      </div>
      <div class="large-6 end columns">
        <ul class="view-film">
        <li><?php echo __('Visualizza'); ?></li>
        <li><a href="?posts=4#">4</a></li>
        <li><a href="?posts=8#">8</a></li>
        <li><a href="?posts=16#">16</a></li>
        <li><?php echo __('per pagina'); ?></li>
        </ul>
      </div>
    </div>
  </div>

  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('orderby'=>'date', 'order'=>'DESC', 'posts_per_page'=>4, 'paged'=>$paged)); ?>
  <?php
  if (have_posts()) : while(have_posts()) : the_post();
  ?>

    <div class="slide-blog" data-thumb="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; // retrieving url from attached thumb as featured image ?>">
    <div class='info-wrapper' data-id="<?php echo get_permalink(); ?>">
      <?php echo get_the_post_thumbnail(); ?>
      <div class='row'>
        <div class="info-blog">
        <div class='info-title large-5 columns'>
          <?php the_title('<h2>','</h2>'); ?>
        </div>
        <div class='info-date large-1 large-offset-9 columns'>
          <h4><?php echo date_i18n('j', strtotime(get_the_date())); ?></h4>
          <h5><?php echo date_i18n('F', strtotime(get_the_date())); ?></h5>
          <h6><?php echo date_i18n('Y', strtotime(get_the_date())); ?></h6>
        </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="film-thumb large-12 columns">
        <?php the_field('video_thumbnail'); ?>
      </div>
    </div>
    <div class="row">
      <div class="blog-content">
      <p> <?php echo get_the_content(); ?> </p>
      </div>
    </div>

  </div>

<?php endwhile; endif; ?> 

<ol class="commentlist">
  <?php
    //Gather comments for a specific page/post 
    $comments = get_comments(array(
      'post_id' => XXX,
      'status' => 'approve' //Change this to the type of comments to be displayed
    ));

    //Display the list of comments
    wp_list_comments(array(
      'per_page' => 10, //Allow comment pagination
      'reverse_top_level' => false //Show the latest comments at the top of the list
    ), $comments);
  ?>
</ol>


<div class="row">
  <div class="large-3 columns end right">
    <?php wpbeginner_numeric_posts_nav(); ?>
  </div>
</div>

</div>

  

<!--FOOTER-->
<?php get_footer(); ?>