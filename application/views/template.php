<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wedhank Adem</title>
    <!-- base:css -->

    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/fc-3.3.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/LOGO Wedhank Adem.png" />
    <!-- <script type="text/javascript" src="//localhost/wedhank_adhem/livechat/php/app.php?widget-init.js"></script> -->
  </head>
  <body>
    <div class="preloader">
  			<div class="loading">
  				<!-- <img class="img_load" src="img/logo_sticky.png" alt=""> -->
          <div id="shadow"></div>
          <div id="box"></div>
          <!-- <img class="img_load" src="img/logo_sticky_dark.png" alt=""> -->
  			</div>
  		</div>
    <div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0" style="background: rgba(0, 0, 0, 0);">
        <div class="container-fluid" style="background-image:  linear-gradient(to bottom right, #A97B4C, #944300); box-shadow: 2px 2px 2px rgba(0.3,0.4,0,0.5); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">

            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="../../index.html"> <h3 class="text-white"><span class="fa fa-beer"></span>&nbsp&nbsp Es Kopi Klasik</h3> </a>
                <a class="navbar-brand brand-logo-mini text-white" href="#" style="margin-top: 15%;"> <h3><span class="fa fa-beer"></span>&nbsp&nbsp Es Kopi Klasik</h3></a>
            </div>
            <div class="ml-5">

            </div>
            <div class="refresh ml-5">
                <a href="#" class="btn btn-sm btn-light" onclick="window.location.reload();" style="color:#A97B4C; background-color: white; box-shadow: 2px 2px 2px rgba(0,0,0,0.3); border-radius: 20px;"> <span class="fa fa-refresh"></span></a>
                &nbsp&nbsp
                <a href="#" data-toggle="modal" data-target="#logout" class="btn btn-sm btn-light" style="color:#A97B4C; background-color: white; box-shadow: 2px 2px 2px rgba(0,0,0,0.3); border-radius: 20px;"> <span class="fa fa-sign-out"></span></a>
            </div>
            <?php if ($this->session->userdata('role') == 1): ?>
              <button style="color: white;" class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span style="color: white;" class="fa fa-bars"></span>
              </button>
            <?php endif; ?>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <?php if ($this->session->userdata('role') == '1'){ ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url(); ?>index.php/home">
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url(); ?>index.php/omzet">
                    <span class="menu-title">Data Omzet</span>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>index.php/rekap" class="nav-link">
                      <span class="menu-title">Rekap Penjualan</span>
                      <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>index.php/laporan/data_laporan" class="nav-link">
                      <span class="menu-title">Data Penjualan Hari ini</span>
                      <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>index.php/laporan/laporan_harian" class="nav-link">
                      <span class="menu-title">Laporan Harian</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>index.php/pegawai" class="nav-link">
                      <span class="menu-title">Data Pegawai</span>
                      <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>index.php/menu" class="nav-link">
                      <span class="menu-title">Data Menu</span>
                      <i class="menu-arrow"></i>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= base_url(); ?>index.php/cekmutasi" class="nav-link">
                      <span class="menu-title">Pembayaran</span>
                      <i class="menu-arrow"></i>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#logout" class="nav-link">
                      <span class="menu-title">Logout</span>
                      <i class="menu-arrow"></i>
                    </a>
                </li> -->
              <?php } ?>
            <?php if ($this->session->userdata('role') == '2'){ ?>
              <li class="nav-item">
                  <a href="<?= base_url(); ?>index.php/laporan/laporan_harian" class="nav-link">
                    <i class="mdi mdi-finance menu-icon"></i>
                    <span class="menu-title">Laporan Harian</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <!-- <li class="nav-item">
                  <a href="#" data-toggle="modal" data-target="#logout" class="nav-link">
                    <i class="mdi mdi-emoticon menu-icon"></i>
                    <span class="menu-title">Logout</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li> -->

            <?php } ?>

            </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
        <?php $this->load->view($konten); ?>
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>

    <!-- Modal Priority -->

    <div class="modal fade" id="logout" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Logout sekarang ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a href="<?= base_url(); ?>index.php/auth/logout" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </div>
    </div>

		<!-- container-scroller -->
    <!-- base:js -->
    <script src="<?= base_url(); ?>assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>assets/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->

    <script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/progressbar.js/progressbar.min.js"></script>
		<script src="<?= base_url(); ?>assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="<?= base_url(); ?>assets/vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="<?= base_url(); ?>assets/vendors/justgage/justgage.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/fc-3.3.1/datatables.min.js"></script>
    <!-- Custom js for this page-->
    <script src="<?= base_url(); ?>assets/js/dashboard.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/select2/select2.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/select2.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#table_id').dataTable();

  });
  </script>

    <!-- End custom js for this page-->
  </body>
</html>
