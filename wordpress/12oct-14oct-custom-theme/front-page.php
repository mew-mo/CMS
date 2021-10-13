<!-- this is front-page.php >:D -->
<!-- it is essential practise to call it this -->
<!-- index is a last resort page that will be defaulted to sometimes -->

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

      query_posts(
        array(
          'post_type' => 'fruit'
        )
      );
      // checks what the posts are. make sure they MATCH
      ?>
      <div class="row">

        <div class="p-5 mb-4 bg-light rounded-3 mt-5">
          <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">There are also fruit</h1>
            <p class="col-md-8 fs-4"></p>
          </div>
        </div>

      <?php
      if ( have_posts() ) :

        while (have_posts() ) : the_post(); ?>
        <!-- this is where it loops over each post -->
        <div class="col-4">
          <div class="card" style="width: 18rem;">
            <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
            <!-- 1st arg is img size -->
            <!-- 2nd arg is an array of attributes -->
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
      <!-- end row again -->

      <?php

      query_posts(
        array(
          'post_type' => 'sports'
        )
      );
      // checks what the posts are. make sure they MATCH
      ?>

      <div class="row">
        <div class="p-5 mb-4 bg-light rounded-3 mt-5">
          <div class="container-fluid py-5">
            <div class="row">
              <div class="col-6">
                <h1 class="display-5 fw-bold">There are also SPORTS. seriously.</h1>
              </div>
              <div class="col-6">
                <?php
                if ( have_posts() ) :
                  while (have_posts() ) : the_post(); ?>
                    <ul>
                      <li>
                        <a href="<?php the_permalink();?>">
                        <?php the_title(); ?></h5>
                        </a>
                      </li>
                    </ul>
                  <?php endwhile;
                    else : echo '<p> There are no posts,, </p>';
                  endif
                  ?>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- end cont -->
        </div>
        <!-- end jumbo -->
      </div>
      <!-- end row -->

      <?php

      query_posts(
        array(
          'post_type' => 'photographs'
        )
      );
      ?>

      <div class="row photoslider">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
        <?php
        if ( have_posts() ) : $post_item = 0;
          while (have_posts() ) : the_post();
            $post_item++;

            if ($post_item == 1) {
          ?>
            <!-- first item so has to have the active class -->
            <div class="carousel-item active">
              <?php the_post_thumbnail('large',
              ['class' => 'd-block',
              'class' => 'w-100']); ?>
              <div class="carousel-caption d-none d-md-block" >
                <h5><?php the_title();?></h5>
                <p><?php the_content();?></p>
              </div>
              <!-- end caption -->
            </div>
            <!-- END ITEM -->
            <?php
          }  else { ?>
            <!-- THESE ONES do NOT have the active class -->
            <div class="carousel-item">
              <?php the_post_thumbnail('large',
              ['class' => 'd-block',
              'class' => 'w-100']); ?>
              <div class="carousel-caption d-none d-md-block">
                <h5><?php the_title();?></h5>
                <p><?php the_content();?></p>
              </div>
              <!-- end caption -->
            </div>
            <!-- END ITEM -->
            <?php
            } //else ends here
            endwhile;
              else: echo '<p> NO POSTS??? </p>';
            endif
            ?>
          </div>
          <!-- end inner carousel -->
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <!-- end photoslider row -->

    </div>
    <!-- end container -->
  <?php get_footer(); ?>
</html>
