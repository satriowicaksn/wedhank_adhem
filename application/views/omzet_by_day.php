<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12 grid-margin d-flex stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <h4 class="card-title mb-2"> <span class="fa fa-edit"></span>&nbsp Detail Omzet Penjualan</h4>
          </div>
          <!-- <h6> <span class="fa fa-calendar"></span>&nbsp <?= date('d M Y'); ?></h6> -->
          <br>
          <a href="<?= base_url() ?>index.php/home" class="btn btn-xs btn-primary"> <span class="fa fa-home"></span>&nbsp Back to home</a>
          <?php if ($this->session->flashdata('notif')): ?>
            <div class="alert alert-primary mt-3" role="alert">
           <span class="fa fa-info-circle"></span> Notification : Omzet berhasil di ubah <a href="<?= base_url() ?>index.php/home"></a>
        </div>
          <?php endif; ?>

          <!-- <a href="#" class="btn btn-sm btn-primary mt-3 mb-3" style="background-color : ##077ee0; color: white; border: none;"> <span class="fa fa-file-word-o"></span>&nbsp Export Word</a> -->
          <!-- <div class="row">
            <a href="<?= base_url() ?>index.php/laporan/export_today" class="btn btn-sm btn-success mt-3 mb-3 col-5" style="background-color : #009111; color: white; border: none;"> <span class="fa fa-file-excel-o"></span>&nbsp Export to Excel</a>
          </div> -->

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
                  <table class="text-dark mt-3">
                    <tr>
                     <td>  <h6><b>Nama : <?= $p->user_laporan ?></b></h6>  </td>
                    </tr>
                    <tr>
                      <td> <h6><b>Booth : <?= $p->ket_tempat ?></b></h6> </td>
                    </tr>
                    <tr>
                     <td> <h6><b>Tanggal : <?= $p->tanggal ?></b></h6> </td>
                    </tr>

                  </table>

                  <!-- <form class="" action="<?= base_url() ?>index.php/laporan/laporan_modif" method="post">
                    <input type="hidden" name="id_laporan" value="<?= $p->id_laporan ?>">
                    <button type="submit" name="button" class="btn btn-xs btn-primary mb-2 col-3"><span class="fa fa-edit"></span>&nbsp Edit</button>
                    <a href="#" class="btn btn-xs btn-danger col-3 mb-2" data-toggle="modal" data-target="#delete_laporan<?= $p->id_laporan ?>"><span class="fa fa-trash"></span>&nbsp Hapus</a>
                  </form> -->

               <table class="table table-bordered table-sm">
                 <tr>
                   <td align="center" style="background-color : #6c7293; color: white;" rowspan="1" colspan="3"> <b>Nama Menu</b></td>
                   <td align="center" style="background-color : #6c7293; color: white;" rowspan="1" colspan="3"> <b>Terjual</b></td>
                   <td align="center" style="background-color : #6c7293; color: white;" rowspan="1" colspan="3"> <b>Bonus</b></td>
                   <td align="center" style="background-color : #6c7293; color: white;" rowspan="1" colspan="3"> <b>Sisa</b></td>
                   <td align="center" style="background-color : #6c7293; color: white;" rowspan="1" colspan="3"> <b>Omset</b></td>

                 </tr>
                 <?php foreach ($laporan as $l){ ?>
                   <?php if ($l->id_laporan == $p->id_laporan){ ?>
                     <tr>
                       <td align="center" colspan="3"><?= $l->nama_menu ?></td>
                       <td align="center" colspan="3"><?= $l->terjual ?></td>
                       <td align="center" colspan="3"><?= $l->bonus ?></td>
                       <td align="center" colspan="3"><?= $l->sisa_cup ?> Cup , <?= $l->sisa_plastik ?> Plastik</td>
                       <td align="center" colspan="3">Rp. <?= number_format($l->omset_menu) ?></td>
                       <!-- <td colspan="4" style="background-color: #ffc43b;"></td> -->
                     </tr>
                   <?php } ?>
                 <?php } ?>
                 <?php foreach ($total as $t){ ?>
                   <?php if ($t->id_laporan == $p->id_laporan){ ?>
                     <tr>
                       <td colspan="15" align="center" rowspan="2"><b>
                         <br>
                         Total Omzet</b> : <b>Rp. <?= number_format($t->omset_menu)?></b> &nbsp&nbsp
                         <a href="#" data-toggle="modal" data-target="#modalomset<?= $t->id_laporan ?>" class="btn btn-xs btn-info text-white" style="border-radius: 20px;"> <span class="fa fa-edit"></span> Edit</a>
                         <br>
                        </td>
                     </tr>
                     <tr>

                     </tr>
                   <?php } ?>
                 <?php } ?>
               </table>
               <br>
               <div class="notea mb-3">
                 <label for="">* Note</label>
                 <textarea name="name" rows="8" cols="80" disabled class="form-control"><?= $p->notepad ?></textarea>
               </div>
               <br>
               <hr>
                <br>
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

<!-- Modal -->
<?php foreach ($total as $t): ?>
  <div class="modal fade" id="modalomset<?= $t->id_laporan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ubah Omset</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?= base_url() ?>index.php/omzet/ubah_omzet" method="post">
            <input type="hidden" name="id_laporan" value="<?= $t->id_laporan ?>">
            <?php foreach ($laporan as $l): ?>
              <?php if ($l->id_laporan == $t->id_laporan): ?>
                <div class="form-group">
                  <label for=""><?= $l->nama_menu ?></label>
                  <input type="hidden" name="id_laporan_menu[]" value="<?= $l->id ?>" class="form-control">
                  <input type="number" name="omset_menu[]" value="<?= $l->omset_menu ?>" class="form-control" required>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#table_id').hide();
});
</script>
