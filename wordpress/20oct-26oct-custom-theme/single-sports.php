  <?php get_header(); ?>
  <!-- HAS to be called single-sport=> it has to be EXACTLY identical to the postype singlename dataname you set . so its a single page For That -->

    <div class="container mt-5">
      <h1>SPORTSE</h1>
      <!-- sportse -->
      <div class="row">

        <?php

        if ( have_posts() ) :
          while (have_posts() ) : the_post(); ?>
          <?php the_post_thumbnail('large', ['class' => 'big-sport-pic']); ?>
          <!-- 1st arg is img size -->
          <!-- 2nd arg is an array of attributes -->
          <!-- this is where it loops over each post -->
          <div class="col-12">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="text-danger"><?php
                $contact_or_nah = get_post_meta(get_the_ID(), 'sportcontact_input', true);
                if ($contact_or_nah) {
                  echo $contact_or_nah . ' sport';
                }
                ?></p>
                <hr>
                <p><?php
                $splurb = get_post_meta(get_the_ID(), 'sportblurb_input', true);
                if ($splurb) {
                  echo $splurb;
                }
                ?></p><br>
                <p class="card-text text-secondary"><span class="pastel-purp">@<?php the_author();?></span>'s take: <?php the_content();?></p>
                <a href="<?php echo get_page_link(get_page_by_path('sports-real'));?>" style="color:white;">
                  Back to all SPOTSE</button></a>
              </div>
            </div>
          </div>
          <?php endwhile;
            else : echo '<p> There are no posts?? </p>';
          endif
          ?>
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  <?php get_footer(); ?>
</html>
