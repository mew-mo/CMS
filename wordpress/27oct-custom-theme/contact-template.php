<!-- template for the about us page ^-^ wooo -->

<?php

/*

Template Name: momo contact page template!

*/

?>

  <?php get_header(); ?>

    <div class="container mt-5">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>

      <ul class="list-group">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A fourth item</li>
        <li class="list-group-item">And a fifth one</li>
      </ul>

      <hr>
      <div class="row contact-body">
        <div class="col-6">
          <div class="spinner-grow text-info" role="status">
          </div>
          <h3><span class="text-info">email:</span> fdsfkj@gmail.com</h3>
        </div>
        <div class="col-6">
          <div class="spinner-grow text-info" role="status">
          </div>
          <h3><span class="text-info">phone:</span> 1025 0208 0922</h3>
        </div>
      </div>
    </div>
    <!-- end container -->
  <?php get_footer(); ?>
</html>
