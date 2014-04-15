  <!--HEADER-->
  <?php get_header(); ?>
  
  <!--BODY-->
  <?php wp_reset_postdata(); ?>
  
  <!--SIDEBAR-->
  <?php get_sidebar(); ?>
  <!--FOOTER-->
  <?php get_footer(); ?>
  


  <script>
    document.write('<script src=' +
      ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
      '.js><\/script>')
  </script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
