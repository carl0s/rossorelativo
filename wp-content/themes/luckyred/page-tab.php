<?php

  /* Template Name: Page Tab */

?>

<?php get_header(); ?>


<br><br><br><br><br><br><br><br><br><br>



<br><br><br><br><br>


<dl class="tabs" data-tab>
  <dd><a href="#panel2-1"><img src="<?php echo get_template_directory_uri() . '/img/facebook.svg' ?>"></a></dd>
  <dd><a href="#panel2-2">Tab 2</a></dd>
  <dd><a href="#panel2-3">Tab 3</a></dd>
  <dd><a href="#panel2-4">Tab 4</a></dd>
</dl>
<div class="tabs-content">
  <div class="content" id="panel2-1">
    <p>First panel content goes here...</p>
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
</div>
<div class="large-5 columns">
<a href="#" data-dropdown="drop1">Has Dropdown</a>
</div>
</div>
<div class="large-12 columns">
<ul id="drop1" class="f-dropdown" data-dropdown-content> <li><a href="#">This is a link</a></li> <li><a href="#">This is another</a></li> <li><a href="#">Yet another</a></li> </ul> <a href="#" data-dropdown="drop2">Has Content Dropdown</a> <div id="drop2" data-dropdown-content class="f-dropdown content"> <p>Some text that people will think is awesome! Some text that people will think is awesome! Some text that people will think is awesome!</p> </div>
</div>

<div class="social-icon large-3 columns end right">
          <a href="https://www.facebook.com/lucky.red.distribuzione"><img src="<?php echo get_template_directory_uri() . '/img/facebook.svg' ?>"></a>
          <a href="https://twitter.com/luckyredfilm"><img src="<?php echo get_template_directory_uri() . '/img/twitter.svg' ?>"></a>
          <a href="http://luckyred.dev"><img src="<?php echo get_template_directory_uri() . '/img/pinterest.svg' ?>"></a>
          <a href="https://plus.google.com/103538445066530070167"><img src="<?php echo get_template_directory_uri() . '/img/googleplus.svg' ?>"></a>
          <a href="https://www.youtube.com/channel/UCZ2NF3-EhyJ1LNYfQIvqJRg"><img src="<?php echo get_template_directory_uri() . '/img/youtube.svg' ?>"></a>
</div>

<?php get_footer() ?>