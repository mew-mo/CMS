<!-- has to be named after taxonomy-[dataname] or else it will not work -->

<?php

get_header(); ?>

<div class="container mt-5">
  <h1>Taxonomy Page</h1>
  <h3>
    Category:
    <?php
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    // gets term by args
    // 1st arg, the slug is the permalink address- the very end of the url. so for the taxonomy it could just be ball. uses the slug to find the page that we're on and get the taxonomy. going to the individual page.
    // 2nd arg will query and get the term name of the taxonomy, get tha particular taxonomy name. in order to get it, it has to get all of the data of that taxonomy, which is the 3rd arg.
    // 3rd arg above.
    echo $term->name;
    ?>
  </h3>

  <div class="row">

<?php
if ( have_posts() ) :

  while (have_posts() ) : the_post(); ?>
  <!-- this is where it loops over each post -->
  <div class="col-4 mt-5">
    <div class="card" style="width: 18rem;">
      <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
      <!-- 1st arg is img size -->
      <!-- 2nd arg is an array of attributes -->
      <div class="card-body">
        <h5 class="card-title">
        <a href="<?php the_permalink();?>">
          <?php the_title(); ?></h5>
        </a>
        <p class="text-secondary">Posted: <?php echo get_the_date('F j, Y');?> <?php the_time();?></p>
          <!-- f = full name of month -->
          <!-- j = number of the month -->
          <!-- y = year -->

        <?php
        echo get_the_term_list($post->ID, 'attribute', '<div class="custom-class">', ' ', '</div>');
        // for our custom taxonomy tags :00
        // 1st arg the idea
        // 2nd arg the taxonomy name data
        // 3rd arg what its inside
        ?>

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
        ?></p>
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

</div>
<!-- end container -->


  <?php get_footer(); ?>
</html>
