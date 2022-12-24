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
  <link rel="stylesheet" href="<?=base_url()?>/template/css/style.css?v4.2">
 <!-- Custom styles-->
 <link rel="stylesheet" href="<?=base_url()?>/template/css/custom.css?v4.2">
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
                <a href="<?=site_url('/')?>">
                  <img style="max-width:320px" src="<?=base_url()?>/template/images/logodataref.png" alt="logo">
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Satuan Pendidikan</a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?=site_url('pendidikan/paud')?>">Pendidikan Anak Usia Dini (PAUD)</a></li>
                                  <li><a href="<?=site_url('pendidikan/dikdas')?>">Pendidikan Dasar (Dikdas)</a></li>
                                  <li><a href="<?=site_url('pendidikan/dikmen')?>">Pendidikan Menengah (Dikmen)</a></li>
                                  <li><a href="<?=site_url('pendidikan/dikti')?>">Pendidikan Tinggi (Dikti)</a></li>
                                  <li2><a href="<?=site_url('pendidikan/dikmas')?>">Pendidikan Masyarakat (Dikmas)</a></li2>
                                  <li><a class="redlink" href="<?=site_url('pendidikan/tidakupdate')?>">Residu Update Data</a></li>
                                  <li><a class="redlink" href="<?=site_url('pendidikan/tidakaktif')?>">Residu Tidak Aktif</a></li>
                                  <!-- <lib><span style="font-weight:bold;font-family: Montserrat;font-size: 12px;">RESIDU SATUAN PENDIDIKAN</span></lib> -->
                                  <!-- <li><a href="<?php //echo site_url('pendidikan/tidakaktif')?>">Residu Satuan Pendidikan</a></li> -->

                                </ul>
                            </li>
                            <li>
                                <a href="<?=site_url('pendidikan/yayasan')?>">Yayasan Pendidikan</a>                                
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Program / Layanan</a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?=site_url('pendidikan/program/paud')?>">Paud</a></li>
                                  <li><a href="<?=site_url('pendidikan/program/kesetaraan')?>">Kesetaraan</a></li>
                                  <li><a href="<?=site_url('pendidikan/program/terampil')?>">Keterampilan Kerja</a></li>
                                  <li><a href="<?=site_url('pendidikan/program/slb')?>">Sekolah Luar Biasa</a></li>
                                  <!-- <li><span style="font-weight:bold;font-family: Montserrat;font-size: 12px;">KETRAMPILAN KERJA</span></li> -->
                                </ul>
                            </li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Data Kebudayaan dan Kebahasaan <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-submenu">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Kebudayaan</a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?=site_url('kebudayaan/cagarbudaya')?>">Cagar Budaya</a></li>
                                  <li><a href="<?=site_url('kebudayaan/museum')?>">Museum</a></li>
                                  <li><a href="<?=site_url('kebudayaan/wbtb')?>">Warisan Budaya Tak Benda</a></li>
                                  <li><a href="<?=site_url('kebudayaan/sanggar')?>">Sanggar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Kebahasaan</a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?=site_url('kebahasaan/bahasadaerah')?>">Bahasa Daerah</a></li>
                                  <li><a href="<?=site_url('kebahasaan/komunitasbahasa')?>">Komunitas Bahasa/Sastra</a></li>
                                </ul>
                            </li>
                          </ul>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="<?=site_url('pustaka')?>">Pustaka</a></li>
                    </ul>
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->
    </div>

  </div>
</header>

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
  <!-- <script src="<?=base_url()?>/template/js/jquery-3.5.1.js"></script> -->
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

  <script src="<?=base_url()?>/template/js/script.js"></script>
  <script src="<?=base_url()?>/template/js/custom.js"></script>
  
  <?=$this->renderSection('scriptdata')?>

  </div>
  </body>

  </html>