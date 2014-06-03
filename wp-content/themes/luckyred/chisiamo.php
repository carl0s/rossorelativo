<?php
  /*
  * Template Name: Stile Chi Siamo
  */
?>

<?php get_header(); ?>
<?php wp_reset_postdata(); ?>

<div class="chi-siamo fotorama" data-click="false" data-nav="thumbs" data-thumbheight="115" data-thumbwidth="180">
  <a href="<?php the_field('link_video_celebrativo'); ?>" data-caption="
    <div class='info-wrapper'>
      <div class='row'>
        <div class='info-title large-6 columns'>
          <a href='<?php echo get_the_permalink(); ?>'><h2><?php echo get_field('titolo_video_celebrativo'); ?></h2></a>
          <div class='row collapse'>
            <div class='large-9 columns'>
              <div class='info-content'>
                <p><?php echo get_field('descrizione_video'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class='info-date large-1 large-offset-11 columns'>
          <h6>Share</h6>
        </div>
      </div>
    ">
    <img src='<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>'>
  </a>
</div>

<div class="chi-siamo-bg">
  <div class="row">
    <div class="large-12 columns">
      <h3><?php the_title(); ?></h3>
      <p><?php the_content(); ?></p>
    </div>
  </div>
</div>
<div class="produzioni-bg">
  <div class="row">
    <div class="large-12 columns">
      <h3><?php echo __('Le nostre produzioni'); ?></h3>
      <div class="row">
        <div class="large-6 columns">
          <h4><?php echo __('Produzione italiana'); ?></h4>
          <div class="row">
            <div class="large-4 columns">
              <?php
              if( have_rows('produzione_italiana') ): while ( have_rows('produzione_italiana') ) : the_row();
              ?>
              <h6 class="nome-produttore">
              <?php the_sub_field('nome_produttore'); ?>
              </h6>
              <?php
              endwhile;

              else :
              
              endif;
              ?>
            </div>
            <div class="large-8 columns">
              <?php
              if( have_rows('produzione_italiana') ): while ( have_rows('produzione_italiana') ) : the_row();
              ?>
              <h6 class="titolo-produzione">
              <?php the_sub_field('titolo_produzione'); ?>
              </h6>
              <?php
              endwhile;

              else :
              
              endif;
              ?>
            </div>
          </div>
        </div>
        <div class="large-6 columns">
          <h4><?php echo __('Co Produzioni internazionali'); ?></h4>
            <div class="row">
              <div class="large-4 columns">
                <?php
                if( have_rows('co_produzione_internazionale') ): while ( have_rows('co_produzione_internazionale') ) : the_row();
                ?>
                <h6 class="nome-produttore">
                <?php the_sub_field('nome_produttore_internazionale'); ?>
                </h6>
                <?php
                endwhile;

                else :
                
                endif;
                ?>
              </div>
              <div class="large-8 columns">
                <?php
                if( have_rows('co_produzione_internazionale') ): while ( have_rows('co_produzione_internazionale') ) : the_row();
                ?>
                <h6 class="titolo-produzione">
                <?php the_sub_field('titolo_produzione_internazionale'); ?>
                </h6>
                <?php
                endwhile;

                else :
                
                endif;
                ?>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<div class="azienda-bg">
    <div class="sfondo">
      <div class="row">
        <div class="large-12 columns">
          <h4><?php echo __("L'azienda"); ?></h4>
          <div class="row">
            <div class="large-3 columns">
              <a class="azienda-img" href="<?php echo get_permalink(); ?>"><?php $image = get_field('immagine_area_edizioni'); ?><img src="<?php echo $image['url']; ?>" /></a>
              <h5><?php echo get_field('titolo_area_edizioni'); ?></h5>
              <p><?php echo get_field('descrizione_area_edizioni'); ?></p>
            </div>
            <div class="large-3 columns">
              <a class="azienda-img" href="<?php echo get_permalink(); ?>"><?php $image = get_field('immagine_area_commerciale'); ?><img src="<?php echo $image['url']; ?>" /></a>
              <h5><?php echo get_field('titolo_area_commerciale'); ?></h5>
              <p><?php echo get_field('descrizione_area_commerciale'); ?></p>
            </div>
            <div class="large-3 columns">
              <a class="azienda-img" href="<?php echo get_permalink(); ?>"><?php $image = get_field('immagine_ufficio_stampa'); ?><img src="<?php echo $image['url']; ?>" /></a>
              <h5><?php echo get_field('titolo_ufficio_stampa'); ?></h5>
              <p><?php echo get_field('descrizione_ufficio_stampa'); ?></p>
            </div>
            <div class="large-3 columns">
              <a class="azienda-img" href="<?php echo get_permalink(); ?>"><?php $image = get_field('immagine_marketing'); ?><img src="<?php echo $image['url']; ?>" /></a>
              <h5><?php echo get_field('titolo_marketing'); ?></h5>
              <p><?php echo get_field('descrizione_marketing'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>