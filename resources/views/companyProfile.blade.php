<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trashid - Bank Sampah</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('Cprofile/img/icon.png')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('Cprofile/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('Cprofile/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('Cprofile/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('Cprofile/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{ asset('Cprofile/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('Cprofile/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img style="max-width:500px" src="{{ asset('Cprofile/img/logo5.png')}}" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Why</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Log in</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">WELCOME TO TRASH.ID</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Pengelolaan bank sampah anda menjadi lebih mudah dan cepat</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Mulai Bergabung</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="Cprofile/img/undraw_Nature_fun_re_iney.svg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>About</h3>
              <h2>Trash.id</h2>
              <p>
                Bank sampah adalah suatu tempat yang digunakan untuk mengumpulkan sampah yang sudah dipilah-pilah. Hasil dari pengumpulan 
                sampah yang sudah dipilah akan disetorkan ke tempat pembuatan kerajinan dari sampah atau ke tempat pengepul sampah
              </p>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="Cprofile/img/samphabout.jfif" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <!-- <h2>Services</h2> -->
          <p>Mengapa Harus mengguanakn Trash.id ?</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <i class="ri-discuss-line icon"></i>
              <h3>Peraktis</h3>
              <p class="mt-2">Pengelolaan data dilakukan secara digital & dapat meningkatkan paperless activity.</p>
            
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange">
              <i class="ri-discuss-line icon"></i>
              <h3>Transparan</h3>
              <p>Pengelola Bank Sampah dapat mengelola tabungan nasabah secara transparan.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-box green">
              <i class="ri-discuss-line icon"></i>
              <h3>Berbasis Website</h3>
              <p>Dengan menggunakan smartphone berbasis Android, Bank Sampah dapat melakukan transaksi dengan mudah dan nyaman.</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <!-- <h2>Portfolio</h2> -->
          <p>Gallery</p>
        </header>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Cprofile/img/portfolio/sampah-5.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Cprofile/img/portfolio/sampah.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Cprofile/img/portfolio/3.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Cprofile/img/portfolio/sampah-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Cprofile/img/portfolio/sampah-4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Cprofile/img/portfolio/sampah-5.jpeg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

    </section><!-- End Portfolio Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="Cprofile/img/logo5.png" alt="">
            </a>
            <p>Pengelolaan bank sampah anda menjadi lebih<div> mudah dan cepat</div></p>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#about">About</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#why">Why</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{ route('login') }}">Log in</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              Bank Sampah Trashid<br>
              Jl. St. KA Cicayur No.27, Cisauk, <br>
              Kec. Cisauk, Tangerang, Banten 15341 <br><br>
              <strong>Phone:</strong> +62 5589 55488 55<br>
              <strong>Email:</strong> trashid@gmail.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('Cprofile/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
  {{-- <script src="{{ asset('Cprofile/vendor/aos/aos.js')}}"></script> --}}
  <script src="{{ asset('Cprofile/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('Cprofile/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('Cprofile/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{ asset('Cprofile/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('Cprofile/vendor/glightbox/js/glightbox.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('Cprofile/js/main.js')}}"></script>

</body>

</html>