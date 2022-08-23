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
  <meta name="description" content="Construction Html5 Template">
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
  <!-- Animation -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/slick/slick.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="<?=base_url()?>/template/css/style.css?v1.2">
 <!-- Custom styles-->
 <link rel="stylesheet" href="<?=base_url()?>/template/css/custom.css?v1.2">
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
                <a href="index.html">
                  <img style="max-width:320px" src="<?=base_url()?>/template/images/logodataref.png" alt="Constra">
                </a>
            </div><!-- logo end -->
  
           
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation">
    <div class="containerlogo">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">

					<li class="nav-item"><a class="nav-link" href="<?=site_url('/')?>">Beranda</a></li>
          <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Data Pendidikan <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Satuan Pendidikan</a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?=site_url('pendidikan/paud')?>">Pendidikan Anak Usia Dini (PAUD)</a></li>
                                  <li><a href="<?=site_url('pendidikan/dikdas')?>">Pendidikan Dasar (Dikdas)</a></li>
                                  <li><a href="<?=site_url('pendidikan/dikmen')?>">Pendidikan Menengah (Dikmen)</a></li>
                                  <li><a href="<?=site_url('pendidikan/dikti')?>">Pendidikan Tinggi (Dikti)</a></li>
                                  <li><a href="<?=site_url('pendidikan/dikmas')?>">Pendidikan Masyarakat (Dikmas)</a></li>
                                </ul>
                            </li>
                          </ul>
                      </li>
					<li class="nav-item"><a class="nav-link" href="<?=site_url('kebudayaan')?>">Data Kebudayaan</a></li>

                    </ul>
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class="search-block" style="display: none;">
          <label for="search-field" class="w-100 mb-0">
            <input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
          </label>
          <span class="search-close">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->

<div class="main-content">
    <?=$this->renderSection('content')?>
</div>

<footer id="footer" class="footer bg-overlay">
  <div class="copyright">
      <span>Pusdatin &copy; Kemdikbudristek <script>
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
  <!-- DataTables -->
  <script src="<?=base_url()?>/template/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>/template/js/dataTables.responsive.min.js"></script>
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