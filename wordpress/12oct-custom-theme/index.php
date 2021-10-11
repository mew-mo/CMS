
  <?php get_header(); ?>
  <!-- wordpress NEEDS to have a header and a footer or else it will be so upset with you -->
  <!-- finds our header.php and runs it across all pages (cool) -->
  <!-- wordpress will always use a default file to render the template unless you have a custom files specifically. your custom stuff will always override their defaults -->

    <div class="container mt-5">
      <h1>ALL POSTS</h1>

      <div class="row">

        <?php

        if ( have_posts() ) :

          while (have_posts() ) : the_post(); ?>
          <!-- this is where it loops over each post -->
          <div class="col-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">
                  <a href="<?php the_permalink();?>">
                  <?php the_title(); ?></h5>
                  </a>
                <p class="card-text"><?php the_content();?></p>
              </div>
            </div>
          </div>
          <?php endwhile;
            else : echo '<p> There are no posts,, </p>';
          endif
          ?>

      </div>
      <!-- end row -->


      <?php
      // if ( have_posts() ) {
      //   // looking for if the posts/page exists. posts represents a single data object or multiple
      // 	while ( have_posts() ) {
      //     // another loop- stepping through each individual post
      // 		the_post();
      //     // represents the data for the individual post
      // 		//
      // 		// Post Content here
      // 		//
      // 	} // end while
      // } // end if
      ?>
    </div>
    <!-- end container -->
  <?php get_footer(); ?>
</html>
