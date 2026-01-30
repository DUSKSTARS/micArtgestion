<?php
require 'config/db.php';
  $date = date('Y-m-d');
  $ventes = $pdo->query("SELECT SUM(montant) FROM ventes WHERE DATE(created_at)='$date'")->fetchColumn();
  $depenses = $pdo->query("SELECT SUM(montant) FROM depenses WHERE DATE(created_at)='$date'")->fetchColumn();
  $benefice = $ventes - $depenses;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <script src="jquery-3.7.0.js"></script>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="#header">Accueil</a></li>
          <li><a class="nav-link" href="#about">Inventaires</a></li>
          <li><a class="nav-link" href="#resume">Ventes</a></li>
          <li><a class="nav-link" href="#services">Dépenses</a></li>
          <li><a class="nav-link" href="#portfolio">Bilan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Inventaire Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2>Inventaires</h2>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <!-- <img src="assets/img/me.jpg" class="img-fluid" alt=""> -->
          <form action="" class="row" id="formItem">
            <div class="col-12">
              <div class="row">
                <label for="produit" class="clo-md-6">Articles</label>
                <input type="text" id="produit" name="nom" class="col-md-6">
              </div>
              <div class="row">
                <div class="col-4"></div>
                <button class="btn btn-primary">Enregistrer</button>

                <!-- <input type="submit" value="Enregistrer" class="btn btn-primary col-4 mt-5"> -->
              </div>
            </div>
          </form>
          <div id="msg"></div>

        </div>
      </div>

    </div><!-- End About Me -->

    <!-- ======= Citations ======= -->
    <div class="testimonials container">

      <div class="section-title">
        <h2>Citations</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Pour l'artiste, l'art est caché sous un brin d'herbe; pour le profane, sous une montagne.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Mille larmes ne paient pas une dette.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  La patience doit être mise en tête de tout projet.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Il faut courber les arbustes quand ils sont encore tendres. Et éduquer les enfants lorqu'ils sont encore dans l'innocence.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  A force de couler, l'eau finit par user la pierre.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

      <div class="owl-carousel testimonials-carousel">

      </div>

    </div><!-- End Testimonials  -->

  </section><!-- End About Section -->

  <!-- ======= Vente Section ======= -->
  <section id="resume" class="resume">
    <div class="container">

      <div class="section-title">
        <h2>Vente</h2>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <h3 class="resume-title">Vente</h3>
          <div class="resume-item pb-0">
            <h4>Nouvelle vente</h4>
            <form id="formVente">
              <select name="item_id" class="form-control mb-2" required>
                <option value="">Choisir</option>
                <?php
                  require 'config/db.php';
                  foreach($pdo->query('SELECT * FROM items') as $i){
                    echo "<option value='{$i['id']}'>{$i['nom']}</option>";
                  }
                ?>
              </select>
              <input type="number" step="0.01" name="montant" class="form-control mb-2" placeholder="Montant" required>
              <button class="btn btn-success">Valider</button>
            </form>
            <div id="msg"></div>
            <div id="msg"></div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Resume Section -->

  <!-- ======= Depense Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Depenses</h2>
      </div>

      <form id="formDepense">
        <input name="libelle" class="form-control mb-2" placeholder="Libellé" required>
        <input type="number" step="0.01" name="montant" class="form-control mb-2" placeholder="Montant" required>
        <button type="submit" class="btn btn-danger">Ajouter dépense</button>
      </form>
      <div id="msg"></div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Bilan Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h3>Bilan du jour</h3>
      </div>

      <div id="bilan"></div>

    </div>
  </section><!-- End Portfolio Section -->

    </div>
  </section><!-- End Contact Section -->

  <div class="credits">
    Designed by <a href="#">DuskDev</a>
  </div>

  <!-- pour les inventaire  -->
  <script>
    $('#formItem').submit(function(e){
      e.preventDefault();
      $.post('ajax/add_item.php', $(this).serialize(), function(res){
        $('#msg').html(res);
        $('#formItem')[0].reset();
      });
    });
  </script>
  <!-- pour les ventes  -->
  <script>
    $('#formVente').submit(function(e){
      e.preventDefault();
      $.post('ajax/add_vente.php', $(this).serialize(), function(res){
        $('#msg').html(res);
        
        $('#formVente')[0].reset();
      });
    });
  </script>
  <!-- depenses  -->
  <script>
    $('#formDepense').submit(function(e){
      e.preventDefault();

      $.post('ajax/add_depense.php', $(this).serialize(), function(res){
          $('#msg').html(res);
          $('#formDepense')[0].reset();

          // 🔁 Mise à jour des dépenses + bilan
          if(typeof loadDepenses === 'function'){
              loadDepenses();
          }

          if(typeof loadBilan === 'function'){
              loadBilan();
          }
      });
    });
  </script>
  <!-- pour le bilan  -->
  <script>
    function loadBilan(){
      $('#bilan').load('ajax/get_bilan.php');
    }
    loadBilan();
    setInterval(loadBilan, 5000); // rafraîchissement auto toutes les 5s
  </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>