<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12 grid-margin d-flex stretch-card">
      <div class="card">
        <div class="card-header bg-success text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
            <span class="fa fa-shop"></span>&nbsp Detail Penjualan Hari Ini
        </div>
        <div class="card-body">
          <h6> <span class="fa fa-calendar"></span>&nbsp <?= date('d M Y'); ?></h6>
          <?php
          $notif = $this->session->flashdata('notif');
          if($notif != NULL){
            echo '<div class="alert alert-danger col-12">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="fa fa-check"></span>&nbsp '.$notif.'
          </div>';
          }

          ?>
          <!-- <a href="#" class="btn btn-sm btn-primary mt-3 mb-3" style="background-color : ##077ee0; color: white; border: none;"> <span class="fa fa-file-word-o"></span>&nbsp Export Word</a> -->
          <div class="row">
            <a href="<?= base_url() ?>index.php/laporan/export_today" class="btn btn-sm btn-success btn-block mt-3 mb-3" style="background-color : #009111; color: white; border: none;"> <span class="fa fa-file-excel-o"></span>&nbsp Export to Excel</a>
            <!-- <a href="<?= base_url() ?>index.php/omzet" class="btn btn-sm btn-primary mt-3 mb-3 ml-2"> <span class="fa fa-money"></span>&nbsp Semua Omzet Penjualan</a> -->

          </div>

            <!-- <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
              <li class="nav-item">
                <a class="nav-link pl-2 pr-2" id="revenue" href="<?= base_url() ?>index.php/laporan/data_laporan_total" role="tab" aria-controls="revenue-for-last-month" aria-selected="true"> <span class="fa fa-calendar"></span>&nbsp Semua</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active pl-2 pr-2" id="server-loading-tab" href="<?= base_url() ?>index.php/laporan/data_laporan" role="tab" aria-controls="server-loading" aria-selected="false"> <span class="fa fa-clock-o"></span>&nbsp Hari Ini</a>
              </li>
            </ul> -->
            <div class="tab-content tab-no-active-fill-tab-content" id="konten">
              <div class="table-responsive">
                <?php foreach ($pelapor as $p){ ?>
                  <table>
                    <tr>
                     <td> <h6 style="color: black; font-weight:bold; font-size: 14px;">Nama : <?= $p->user_laporan ?></h6>  </td>
                    </tr>
                    <tr>
                      <td> <h6 style="color: black; font-weight:bold; font-size: 14px;">Lokasi : <?= $p->nama_booth ?></h6> </td>
                    </tr>
                    <tr>
                     <td> <h6 style="color: black; font-weight:bold; font-size: 14px;">Tanggal : <?= $p->tanggal ?></h6> </td>
                    </tr>

                  </table>
                  <br>
                  <form class="" action="<?= base_url() ?>index.php/laporan/laporan_modif" method="post">
                    <input type="hidden" name="id_laporan" value="<?= $p->id_laporan ?>">
                    <button type="submit" name="button" class="btn btn-xs btn-primary mb-2"><span class="fa fa-eye mr-2"></span>Lihat Detail</button>
                    <a href="#" class="btn btn-xs btn-danger mb-2" data-toggle="modal" data-target="#delete_laporan<?= $p->id_laporan ?>"><span class="fa fa-trash mr-2"></span>Hapus Laporan</a>
                  </form>
                  <br>
                  <div class="row">
                    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                      <h6 style="color: black; font-weight:bold;">Data Penjualan</h6>
                      <br>
                      <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                          <tr>
                            <td align="center" style="background-color : #4D2E07; color: white;" rowspan="1" colspan="3">Nama Menu</td>
                            <td align="center" style="background-color : #4D2E07; color: white;" rowspan="1" colspan="3">Harga</td>
                            <td align="center" style="background-color : #4D2E07; color: white;" rowspan="1" colspan="3">Terjual</td>
                            <td align="center" style="background-color : #4D2E07; color: white;" rowspan="1" colspan="3">Bonus</td>
                            <td align="center" style="background-color : #4D2E07; color: white;" rowspan="1" colspan="3">Sisa</td>

                          </tr>
                          <?php $a=0; ?>
                          <?php foreach ($laporan as $l){ ?>
                            <?php if ($l->id_laporan == $p->id_laporan){ ?>
                              <tr>
                                <td align="center" colspan="3"><?= $l->nama_menu ?></td>
                                <td align="center" colspan="3">Rp. <?= number_format($l->harga_menu) ?></td>
                                <td align="center" colspan="3"><?= $l->terjual ?></td>
                                <td align="center" colspan="3"><?= $l->bonus ?></td>
                                <td align="center" colspan="3"><?= $l->sisa_cup ?> Cup , <?= $l->sisa_plastik ?> Plastik</td>
                                <!-- <td colspan="4" style="background-color: #ffc43b;"></td> -->
                                <?php $a = $a+($l->terjual*$l->harga_menu) ?>
                              </tr>
                            <?php } ?>
                          <?php } ?>
                          <tr>
                            <td align="center" colspan="6" style="font-weight:bold;color: black;">Total Omzet</td>
                            <td align="center" colspan="9" style="font-weight:bold; color: black;">Rp. <?= number_format($a); ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label for="" style="color: black; font-weight:bold;"> <span class="fa fa-edit mr-2"></span> Catatan Harian</label>
                        <textarea name="name" rows="8" cols="80" disabled class="form-control" style="background: white;"><?= $p->notepad ?></textarea>
                      </div>
                    </div>
                  </div>
                  <hr>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Modal -->
<?php foreach ($laporan as $l){ ?>
<div class="modal fade" id="edit<?= $l->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="#" method="post">
          <h4 class="text-danger">Menu : <?= $l->nama_menu ?></h4>
          <div class="form-group">
            <label for=""> Terjual</label>
            <input type="hidden" name="id" value="">
            <input type="text" name="terjual" value="<?= $l->terjual ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for=""> Bonus</label>
            <input type="text" name="bonus" value="<?= $l->bonus ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for=""> Sisa (Cup)</label>
            <input type="text" name="cup" value="<?= $l->sisa_cup ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for=""> Sisa (Plastik)</label>
            <input type="text" name="plastik" value="<?= $l->sisa_plastik ?>" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- Modal Delete-->
<?php foreach ($pelapor as $p){ ?>
<div class="modal fade" id="delete_laporan<?= $p->id_laporan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?= base_url() ?>index.php/laporan/delete_data_laporan" method="post">
          <div class="form-group">
            <label for="">Anda yakin akan menghapus data laporan ini ?</label>
            <input type="hidden" name="id" value="<?= $p->id_laporan ?>" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-xs btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#table_id').hide();
});
</script>
