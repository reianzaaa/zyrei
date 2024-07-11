<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-PRIORITAS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">E-PRIORITAS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#">
            <img src="assets/img/blank.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block ps-2">Admin</span>        
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard')}}" data-id="dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link" href="{{route('pesanan.index')}}" data-id="pesanan">
        <i class="bi bi-journal-text"></i>
        <span>Data Pesanan</span>
      </a>
    </li><!-- End Data Pesanan Nav -->

    <li class="nav-item">
      <a class="nav-link" href="{{Route('paket.index')}}" data-id="paket">
        <i class="bi bi-cart3"></i>
        <span>Daftar Paket</span>
      </a>
    </li><!-- End Daftar Paket Nav -->

    <li class="nav-item">
      <a class="nav-link" href="pelanggan.html" data-id="pelanggan">
        <i class="bi bi-people"></i>
        <span>Data Pelanggan</span>
      </a>
    </li><!-- End Data Pelanggan Nav -->

    <li class="nav-item">
      <a class="nav-link" href="{{Route('prioritas')}}" data-id="prioritas">
        <i class="bi bi-bar-chart"></i>
        <span>Perhitungan SAW</span>
      </a>
    </li><!-- End Perhitungan SAW Nav -->

    <li class="nav-item">
      <a class="nav-link" href="{{route('logout')}}" data-id="logout">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Logout Nav -->
  </ul>
</aside><!-- End Sidebar-->

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get all nav links
    const navLinks = document.querySelectorAll('.sidebar .nav-link');
    
    // Function to set active link
    function setActiveLink(link) {
      navLinks.forEach(navLink => navLink.classList.remove('active'));
      link.classList.add('active');
      localStorage.setItem('activeNavLink', link.getAttribute('data-id'));
    }

    // Check if there is an active link saved in localStorage
    const activeNavLinkId = localStorage.getItem('activeNavLink');
    if (activeNavLinkId) {
      const activeNavLink = document.querySelector(`.sidebar .nav-link[data-id="${activeNavLinkId}"]`);
      if (activeNavLink) {
        activeNavLink.classList.add('active');
      }
    }

    // Add click event listener to all nav links
    navLinks.forEach(link => {
      link.addEventListener('click', function (event) {
        setActiveLink(this);
      });
    });
  });
</script>

<style>
  .nav-link.active {
    box-shadow: inset 5px 0 0 0 #007bff; /* Adjust the color to match your theme */
  }
</style>


    </ul>

  </aside><!-- End Sidebar-->

  @yield('main')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>