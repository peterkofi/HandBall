<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FCHandball - Accueil</title>
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
  include("menuAgent.php");
  ?>

<main id="main">

    

<!-- ======= About Section ======= -->
<br>
<br>
<section id="about" class="about">
  <div class="container">
    <div class="section-title" data-aos="fade-left">
      <h2>Liste des athletes</h2> 
      <a href="ajoutAthlete.php">
            <button type="button" class="btn btn-primary">Ajouter un athlete</button>
      </a>
      <br>
      <br>
      <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="RECHERCHER UN ATHLETE" aria-label="Search" style="width:500px;">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Numero</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Province</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Tshilomba</td>
                <td>Ben</td>
                <td>Kinshasa</td>
                <td>
                    <a href="">
                        <button type="button" class="btn btn-success">Modifier</button>
                    </a>
                    <a href="">
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Muzaliwa</td>
                <td>Alpha</td>
                <td>Katanga</td>
                <td>
                    <a href="">
                        <button type="button" class="btn btn-success">Modifier</button>
                    </a>
                    <a href="">
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Kofi</td>
                <td>Peter</td>
                <td>Bandundu</td>
                <td>
                    <a href="">
                        <button type="button" class="btn btn-success">Modifier</button> 
                    </a>
                    <a href="">
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </a>
                </td>
            </tr>
</table>
  
</section><!-- End About Section -->


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