<!-- https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png -->

  <?php get_header(); ?>

    <div class="container mt-5">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>

      <div class="row">
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  <?php get_footer(); ?>
</html>
