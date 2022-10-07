<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <?=$this->renderSection('titel')?>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Data Referensi - Pusdatin Kemdikbudristek">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0">
  <meta name="Description" content="Pusdatin Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi">
  <meta name="Keywords" content="Pusdatin, Data Referensi Pendidikan">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="<?=base_url()?>/template/images/logotut.png">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/bootstrap/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/fontawesome/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>/template/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/css/fixedColumns.dataTables.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/slick/slick.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="<?=base_url()?>/template/css/style.css?v3.1">
 <!-- Custom styles-->
 <link rel="stylesheet" href="<?=base_url()?>/template/css/custom.css?v3.2">
</head>
<body>
  <div class="body-inner">

<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="containerlogo">
      <div class="logo-area">
          <div class="row align-items-center">
            <div>
                  <img style="max-width:320px" src="<?=base_url()?>/template/images/logodataref.png" alt="logo">
            </div>
          </div>
      </div>
    </div>
  </div>
</header>
<!--/ Header end -->

<div id="page-container">
<div id="content-wrap">
    <?=$this->renderSection('content')?>
</div>

<footer id="footer" class="footer bg-overlay">
  <div class="copyright">
      <span>Pusdatin &copy; Kemendikbudristek <script>
          document.write(new Date().getFullYear())
        </script></span>
    </div>
  </div>
</footer>
<div>

  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="<?=base_url()?>/template/plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap jQuery -->
  <script src="<?=base_url()?>/template/plugins/bootstrap/bootstrap.min.js" defer></script>
  <!-- DataTables -->
  <script src="<?=base_url()?>/template/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>/template/js/dataTables.responsive.min.js"></script>
  <script src="<?=base_url()?>/template/js/dataTables.fixedColumns.min.js"></script>

  <!-- Slick Carousel -->
  <script src="<?=base_url()?>/template/plugins/slick/slick.min.js"></script>
  <script src="<?=base_url()?>/template/plugins/slick/slick-animation.min.js"></script>
  <!-- Color box -->
  <script src="<?=base_url()?>/template/plugins/colorbox/jquery.colorbox.js"></script>
  <!-- shuffle -->
  <script src="<?=base_url()?>/template/plugins/shuffle/shuffle.min.js" defer></script>



  <!-- Template custom -->
  <script src="<?=base_url()?>/template/js/script.js"></script>
  <script src="<?=base_url()?>/template/js/custom.js"></script>
  
  <?=$this->renderSection('scriptdata')?>

  </div><!-- Body inner end -->
  </body>

  </html>

  <script>
    $("#search-field").bind("keypress", {}, keypressInBox);

    function keypressInBox(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) { //Enter keycode                        
            e.preventDefault();
            window.open("<?php
            if ($tingkat=="kebudayaan")
              echo site_url('kebudayaan/cari/');
            else if ($tingkat!="yayasan")
              echo site_url('pendidikan/cari/');
            else
              echo site_url('pendidikan/cariyayasan/');
            ?>"+$("#search-field").val(),"_self");
            // $("yourFormId").submit();
        }
    };

    function yukcari() {
      window.open("<?php
            if ($tingkat=="kebudayaan")
              echo site_url('kebudayaan/cari/');
            else if ($tingkat!="yayasan")
              echo site_url('pendidikan/cari/');
            else
              echo site_url('pendidikan/cariyayasan/');
            ?>"+$("#search-field").val(),"_self");
    }
  </script>