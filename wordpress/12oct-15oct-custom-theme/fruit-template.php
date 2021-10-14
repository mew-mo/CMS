<!-- template for the fruit us page ^-^ wooo -->

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

get_header(); ?>

<div class="container mt-5">
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>

  <div class="row">


<?php
if ( have_posts() ) : $postcount =0;
// the : defines whats going to happen AFTER

  while (have_posts() ) : the_post();
    $postcount++;

    if ($postcount == 1) {
    ?>
    <!-- if the post is 1, it is the most recent post- we are making it stand out fromother posts. im rendering a NEW little line on it to show that :) -->
  <!-- this is where it loops over each post -->
  <div class="col-4">
    <div class="card" style="width: 18rem;">
      <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
      <!-- 1st arg is img size -->
      <!-- 2nd arg is an array of attributes -->
      <div class="card-body">
        <h5 class="card-title" style="display:inline;">
          <a href="<?php the_permalink();?>">
          <?php the_title(); ?></h5>
          </a>
          <p class="text-danger" style="display:inline; float:right;">  NEW</p>
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
  <?php
}  //closing bracket for the if statement that is at the beginning of this codeblock. IT IS IMPORTNANT
  else {
    ?>
    <!-- else-> all of the normal posts show! -->
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
    <?php
  } // END OF ELSE
  endwhile;
    else : echo '<p> There are no posts,, </p>';
  endif
  ?>

  </div>
  <!-- end row -->

</div>
<!-- end container -->


  <?php get_footer(); ?>
</html>
