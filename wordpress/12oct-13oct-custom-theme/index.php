
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
                  <p class="text-secondary">Posted: <?php the_date('F j, Y');?> <?php the_time();?></p>
                  <!-- f = full name of month -->
                  <!-- j = number of the month -->
                  <!-- y = year -->
                <p class="card-text"><?php the_excerpt();?></p>
                <!-- the_excerpt is a shortened version of the_content that cuts it off so it displays briefly :D  -->
                <p class="card-text text-secondary author-tag">By <span class="pastel-purp">@<?php the_author();?></span></p>
                <a href="<?php the_permalink();?>" style="color:white;"><button type="button" class="btn btn-primary bg-pastel">Read more</button></a>
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
