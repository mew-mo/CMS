<?php
$widgets = array(
  '1' => array(
    'title' => 'SIGN UP FOR UPDATES',
    'subtitle' => 'Stay updated on...'
  ),
  '2' => array(
    'title' => 'Get your free guide - 10 steps to online export',
    'img' => 'book.png',
    'link' => 'Guide >',
    'color' => '#FF963A'
  ),
  '3' => array(
    'title' => 'Love music? Check out our studio!',
    'img' => 'cd.png',
    'link' => 'Music Studio >',
    'color' => '#3BA2C3'
  )
);
?>

<div class="col-4 mt-5 ml-5">
  <?php
  foreach ($widgets as $singleWidget) {
    if ($singleWidget['subtitle']) {
      ?>
      <div class="form-widget" style="border: solid 3px #4FE8CA; padding:20px;">
        <h4><?php echo $singleWidget['title']?></h4>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
        <br>
        <p><b><?php echo $singleWidget['subtitle']?></b></p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
          <label class="form-check-label" for="defaultCheck1">
            Blog
          </label>
          <br>
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
          <label class="form-check-label" for="defaultCheck2">
            Guides
          </label>
          <br>
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
          <label class="form-check-label" for="defaultCheck3">
            Music
          </label>
        </div>
        <br>
        <button type="button" class="btn btn-secondary">SUBSCRIBE</button>
      </div>
      <?php
    } else if ($singleWidget['img']) {
      ?>
      <div class="form-img mt-5" style="border: solid 3px <?php echo $singleWidget['color']?>;">
        <div class="imgimg d-flex justify-content-center" style="background:<?php echo $singleWidget['color']?>; height:140px;">
          <img src="<?php echo $singleWidget['img']?>" style="height:80%; margin-top:15px;">
        </div>
        <div style="padding:20px;">
          <h4><?php echo $singleWidget['title']?></h4>
          <a class="text-info" style="cursor:pointer;"><?php echo $singleWidget['link']?></a>
        </div>
      </div>
      <?php
    }
  }
  ?>

</div>
