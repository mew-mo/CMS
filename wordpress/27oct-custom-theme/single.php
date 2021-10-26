
  <?php get_header(); ?>

    <div class="container mt-5">
      <div class="row">

        <?php

        if ( have_posts() ) :
          while (have_posts() ) : the_post(); ?>
          <!-- this is where it loops over each post -->
          <div class="col-12">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php the_content();?></p>
                <a href="<?php echo home_url();?>" style="color:white;"><button type="button" class="btn btn-primary bg-pastel">Home</button></a>
              </div>
            </div>
          </div>
          <?php endwhile;
            else : echo '<p> There are no posts,, </p>';
          endif
          ?>
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  <?php get_footer(); ?>
</html>
