<?php

  /* Template Name: Page Tab */

?>

<?php get_header(); ?>


<br><br><br><br><br><br><br><br><br><br>

<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>

<div class="slideToggler2">
  click to open an EXPANDING COLLAPSING DIV
</div>
<div class="slideContent2">
  content content content <span class="collaps2"><b>CLOSE</b></span>
</div>


<img id="expanderHead" style="cursor:pointer;" src="<?php echo get_template_directory_uri() . '/img/gallery.png' ?>"/>
<div id="expanderContent" style="display:none">
  content<br />
  content<br />
  content<br />
  content<br />
  content<br />
</div>

<?php get_footer() ?>