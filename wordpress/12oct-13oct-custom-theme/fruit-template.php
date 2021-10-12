<!-- template for the about us page ^-^ wooo -->

<?php

/*

Template Name: momo fruit fruit template!

*/

?>

<?php

query_posts(
  array(
    'post_type' => 'fruit'
  )
);
// checks what the posts are. make sure they MATCH
?>

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

  <?php get_header(); ?>

    <div class="container mt-5">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>

    </div>
    <!-- end container -->
  <?php get_footer(); ?>
</html>
