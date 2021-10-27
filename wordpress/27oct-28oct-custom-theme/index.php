
  <?php get_header(); ?>

  <!-- the index is NOT the front page, but IS what wordpress will default to if it cant find a specified page type or template. the front page IS front-page.php. -->

  <!-- wordpress NEEDS to have a header and a footer or else it will be so upset with you -->
  <!-- finds our header.php and runs it across all pages (cool) -->
  <!-- wordpress will always use a default file to render the template unless you have a custom files specifically. your custom stuff will always override their defaults -->

    <div class="container mt-5">
      <h1>ALL POSTS</h1>
      <div class="row">

        <?php
        if ( have_posts() ) :
          while (have_posts() ) : the_post(); ?>
          <?php the_content();?>
          <?php endwhile;
            else : echo '<p> There are no posts,, </p>';
          endif
          ?>
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  <?php get_footer(); ?>

  <!-- here, read more about having good seo -->
  <!-- https://www.hostgator.com/blog/write-title-tags-seo/ -->
  <!-- https://yoast.com/meta-descriptions/ -->

  <!-- essential plugins -->
  <!-- loftloader -->
  <!-- smush -->
  <!-- all in one WP security & firewall -->
  <!-- w3 total cache -->
  <!-- yoast -->
</html>
