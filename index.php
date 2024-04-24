<?php
session_start();
include('includes/conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="external/css/style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php include('includes/styles.php') ?>

  <?php include('includes/nav.php')?>

  <?php include('includes/modals.php')?>

  <?php include('includes/scripts.php')?>

  <title>Severabs Tarot Shop | Index</title>
  
</head>



<body>
  <div class="container-no-margin">
    <img class="img-fluid" src="img/start-wallpaper.png">
  </div>
  <div class="container-no-margin container-background text-center">
    <h5 class="icon-top"> <i class="bi bi-stars icon-bg"></i></h5>
    <h5 class="icon-top info-text half-text">Get your tarot cards, crystals, and metaphysical essentials at none other than Severabs! Explore our curated collection of mystical treasures to enhance your spiritual journey.</h5>
  <br>
  <hr class="purple-small-line">
  <br>
    <div class="row center-gallery">

    <h5 class="para-text"><i class="bi bi-card-image"></i> <br>
      Latest Cards </h5>
    <div class="col-sm-3 hvr-shrink">
      <img src="img/products/tarot-img-1.png" class="img-fluid">
    </div>
    <div class="col-sm-3 hvr-shrink">
      <img src="img/products/tarot-img-2.png" class="img-fluid">
    </div>
    <div class="col-sm-3 hvr-shrink">
      <img src="img/products/tarot-img-3.png" class="img-fluid">
    </div>
    <div class="col-sm-3 hvr-shrink">
      <img src="img/products/tarot-img-4.png" class="img-fluid">
    </div>
  </div>
  <hr class="purple-small-line">
  <br>
  <div class="row center-gallery">
    <h5 class="para-text"><i class="bi bi-suit-diamond"></i> <br>
      Latest Crystals </h5>
    <div class="col-sm-3 hvr-shrink">
      <img src="img/products/sp-img1.jpg" class="img-fluid">
    </div>
    <div class="col-sm-3 hvr-shrink">
      <img src="img/products/sp-img10.jpg" class="img-fluid">
    </div>
    <div class="col-sm-3 hvr-shrink">
      <img src="img/products/sp-img23.jpg" class="img-fluid">
    </div>
    <div class="col-sm-3 hvr-shrink">
      <img src="img/products/sp-img24.jpg" class="img-fluid">
    </div>
  </div>
  <br>
  </div>


  <div class="container-fluid container-msg text-center">
    <h3 class="whisper-text">Trust your destiny</h3>
  </div>


</body>



<?php include('includes/footer.php') ?>

</html>