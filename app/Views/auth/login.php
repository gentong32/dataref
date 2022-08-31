
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Admin</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0">
  <meta name="Description" content="Pusdatin Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi">
  <meta name="Keywords" content="Pusdatin, Data Referensi Pendidikan">
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/bootstrap/bootstrap.min.css">
</head>

<body>
<div class="body-inner">
<!-- Header start -->
<header id="header" class="header-one">
<div class="bg-white">
    <div class="containerlogo">
      <div class="logo-area">
          <div class="row align-items-center">
            <div style="margin:20px;">
                <a href="index.html">
                  <img style="max-width:320px" src="<?=base_url()?>/template/images/logodataref.png" alt="Constra">
                </a>
            </div><!-- logo end -->
  
           
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
 </div>
 </header>
</div>

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
         

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <b>Error !</b>
                            <?=session()->getFlashData('error')?>
                        </div>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?=site_url('auth/loginProcess')?>" class="needs-validation" novalidate="">
                  <?= csrf_field() ?>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                
              </div>
            </div>
            
            <div class="simple-footer">
              Copyright &copy; Pusdatin 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>

<script src="<?=base_url()?>/template/plugins/jQuery/jquery.min.js"></script>
<script src="<?=base_url()?>/template/plugins/bootstrap/bootstrap.min.js" defer></script>
