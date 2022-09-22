<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FCHandball - Competitions</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php 
  include("menuSecGeneral.php");
  ?>

  <main id="main">

    
  <br>
<br>
<section id="about" class="about">
  <div class="container">
    <div class="section-title" data-aos="fade-left">
      <h2>Ajouter Agent</h2> 
    </div>
          <form style="width:100" style="width:500px;">
        <div class="form-group">
          <label for="exampleInputEmail1">Nom</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width:500px;">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Prénom</label>
          <input type="text" class="form-control" id="exampleInputPassword1" style="width:500px;">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Province</label>
          <input type="text" class="form-control" id="exampleInputPassword1" style="width:500px;">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Type</label>
          <select class="form-control" style="width:500px;">
                <option value="france">Chef de province</option>
                <option value="espagne">Agent</option>  
            </select> 
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>

  </main><!-- End #main -->

  <?php
    include("footer.php");
  ?>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>