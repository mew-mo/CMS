<!-- HAS to be called single-fruit=> it has to be EXACTLY identical to the postype dataname you set . so its a single page For That -->

  <?php get_header(); ?>

    <div class="container mt-5">
      <div class="row">

        <?php

        if ( have_posts() ) :
          while (have_posts() ) : the_post(); ?>
          <?php the_post_thumbnail('large', ['class' => 'big-fruit-pic']); ?>
          <!-- 1st arg is img size -->
          <!-- 2nd arg is an array of attributes -->
          <!-- this is where it loops over each post -->
          <div class="col-12">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="text-secondary"><?php
                  $fruit_blurb = get_post_meta(get_the_ID(), 'blurb_input', true);
                  echo $fruit_blurb;
                 ?></p>
                <p class="card-text"><?php the_content();?></p>
                <a href="<?php echo get_page_link(get_page_by_path('actual-fruit-not-clickbait'));?>" style="color:white;">
                  <!-- get the page slug ^o^ to get page by path -->
                  <button type="button" class="btn btn-primary bg-pastel">Back to all fruit</button></a>
                <!-- link to an individual page on a website!!! lesgo >:3 -->
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
