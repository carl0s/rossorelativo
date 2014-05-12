<?php get_header(); ?>

<?php wp_reset_postdata();  ?>

<div class="img-regista slideshow-wrapper">
    <div class="fotorama slideshow" data-allowfullscreen="native" data-width="100%" data-ratio="1440/750">
      <div class="slide">
        <div class='info-wrapper'>
          <?php echo get_the_post_thumbnail(); ?>
          <div class='row'>
            <div class='info-title large-6 columns'>
              <?php the_title('<h2>','</h2>'); ?>
            </div>
            <div class='info-date large-1 large-offset-4 columns'>
              <?php 
              $date = DateTime::createFromFormat('Ymd', get_field('data_di_uscita'));
              ?>
              <h6>dal</h6>
              <h4><?php echo $date->format('d'); ?></h4>
              <h5><?php echo $date->format('M'); ?></h5>
              <h6>al cinema</h6>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<?php get_footer(); ?>