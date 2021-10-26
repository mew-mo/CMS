<?php
get_header();
?>

<!-- https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/ -->

<div class="container mt-5">
  <div class="row">
    <div class="col">
      <?php woocommerce_content();?>
      <!-- wp content -> plugins -> woocommerce -> templates -->
      <!-- templates is a list ofall the things u can change on woocommerce -->
    </div>
  </div>
</div>

<?php
get_footer();
?>
