<?php

/*

Template Name: momo dont like sport template!

*/

?>

<?php

query_posts(
  array(
    'post_type' => 'sports'
  )
);
// checks what the posts are. make sure they MATCH
?>

<?php

get_header(); ?>

<div class="container mt-5">
  <h1><?php the_title(); ?></h1>
  <h3>i am not a sport fan; welcome to SPORTS</h3>
  <?php the_content(); ?>

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
