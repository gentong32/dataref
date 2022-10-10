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
    <!-- Animation -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/slick/slick.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="<?=base_url()?>/template/css/style.css?v3.3">
  <!-- Custom styles-->
  <link rel="stylesheet" href="<?=base_url()?>/template/css/custom.css?v3.3">

  <!-- Leaflet Maps styles-->
  <link rel="stylesheet" href="<?=base_url()?>/leaflet/leaflet.css?v1.7">

</head>
<body>
<div class="body-inner">

<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
          <div class="row align-items-center">
            <div>
                  <img style="max-width:320px" src="<?=base_url()?>/template/images/logodataref.png" alt="logo">
            </div><!-- logo end -->          
          </div><!-- logo area end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>  
</header>
<!--/ Header end -->

<div class="main-content" style="margin-bottom:50px;">
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

  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="<?=base_url()?>/template/plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap jQuery -->
  <script src="<?=base_url()?>/template/plugins/bootstrap/bootstrap.min.js" defer></script>
  <!-- Slick Carousel -->
  <script src="<?=base_url()?>/template/plugins/slick/slick.min.js"></script>
  <script src="<?=base_url()?>/template/plugins/slick/slick-animation.min.js"></script>
  <!-- Color box -->
  <script src="<?=base_url()?>/template/plugins/colorbox/jquery.colorbox.js"></script>
  <!-- shuffle -->
  <script src="<?=base_url()?>/template/plugins/shuffle/shuffle.min.js" defer></script>
  <!-- Template custom -->
  <script src="<?=base_url()?>/template/js/script.js"></script>

  <!-- Maps Leaflet -->
  <script src="<?=base_url()?>/leaflet/leaflet.js?v1.7"></script>

  <?=$this->renderSection('scriptpeta')?>
    
</div><!-- Body inner end -->
  </body>

  </html>

  <script>
    $("#search-field").bind("keypress", {}, keypressInBox);

    function keypressInBox(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) { //Enter keycode                        
            e.preventDefault();
            alert ("cihuy");
            // $("yourFormId").submit();
        }
    };
  </script>