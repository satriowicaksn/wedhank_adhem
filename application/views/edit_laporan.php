<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12 grid-margin d-flex stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-2"> <span class="fa fa-edit"></span>&nbsp Detail Penjualan</h5>
          </div>
          <?php foreach ($get_laporan as $g){ ?>
            <br>
            <h5 style="font-weight:bold; color: black;">Nama : <?= $g->user_laporan ?></h5>
            <h5 style="font-weight:bold; color: black;">Booth : <?= $g->nama_booth ?></h5>
            <h5 style="font-weight:bold; color: black;">Tanggal : <?= $g->tanggal ?></h5>
            <!-- <a href="#" class="btn btn-xs btn-danger col-4" data-toggle="modal" data-target="#add<?= $g->id_laporan ?>"> <span class="fa fa-plus"></span>&nbsp Tambah</a> -->
          <?php } ?>
          <!-- <a href="<?= base_url() ?>index.php/laporan/export_today" class="btn btn-sm btn-success mt-3 mb-3 col-4" style="background-color : #009111; color: white; border: none;"> <span class="fa fa-file-excel-o"></span>&nbsp Export Detail Hari Ini</a> -->
          <div>

            <div class="tab-content tab-no-active-fill-tab-content" id="konten">
              <div class="table-responsive">
               <table class="table table-bordered table-sm">
                 <tr>
                   <td align="center" style="background-color : #4D2E07; color: white;" rowspan="1" colspan="3">Nama Menu</td>
                   <td align="center" style="background-color : #4D2E07; color: white;" rowspan="1" colspan="3">Waktu</td>
                   <td align="center" style="background-color : #4D2E07; color: white;" rowspan="1" colspan="3">Keterangan</td>
                   <td align="center" style="background-color : #4D2E07; color: white;" rowspan="1" colspan="3">Hapus</td>

                 </tr>

                 <?php foreach ($laporan as $l){ ?>
                   <tr>
                     <td align="center" colspan="3"><?= $l->nama_menu ?></td>
                     <td align="center" colspan="3"><?= $l->time_detail ?></td>
                     <td align="center" colspan="3"><?= $l->ket_detail ?></td>
                     <?php if ($l->ket_detail == 'terjual'){ ?>
                       <td align="center" colspan="3"> <button type="button" name="button" id="delete" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $l->id_detail ?>"><span class="fa fa-trash"></span></button> </td>
                     <?php } ?>
                     <?php if ($l->ket_detail == 'bonus'){ ?>
                       <td align="center" colspan="3"> <button type="button" name="button" id="delete" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#bdelete<?= $l->id_detail ?>"><span class="fa fa-trash"></span></button> </td>
                     <?php } ?>
                     <!-- <td align="center" colspan="3"> <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#edit"> <span class="fa fa-edit"></span> </a> </td> -->
                     <!-- <td colspan="4" style="background-color: #ffc43b;"></td> -->
                   </tr>
                 <?php } ?>
               </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Modal -->
<?php foreach ($get_laporan as $g){ ?>
<div class="modal fade" id="add<?= $g->id_laporan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?= base_url() ?>index.php/laporan/add_modif" method="post">
          <input type="hidden" name="id_laporan" value="<?= $g->id_laporan ?>">
          <div class="form-group">
            <label for="">Pilih Menu</label>
            <select class="form-control" name="menu" required>
              <option value="">-- Pilih --</option>
              <?php foreach ($menu as $m){ ?>
                <option value="<?= $m->id ?>"><?= $m->nama_menu ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Keterangan</label>
            <select class="form-control" name="ket" required>
              <option value="">-- Pilih --</option>
              <option value="terjual">Terjual</option>
              <option value="bonus">Bonus</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-xs">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- hapus terjual -->
<?php foreach ($laporan as $l){ ?>
  <div class="modal fade" id="delete<?= $l->id_detail ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?= base_url() ?>index.php/laporan/delete_detail" method="post">
            <label for="">Anda yakin menghapus data ini ?</label>
            <input type="hidden" name="id_detail" value="<?= $l->id_detail ?>">
            <input type="hidden" name="id" value="<?= $l->id ?>">
            <input type="hidden" name="id_laporan" value="<?= $l->id_laporan ?>">

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-xs">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<!-- hapus bonus -->
<?php foreach ($laporan as $l){ ?>
  <div class="modal fade" id="bdelete<?= $l->id_detail ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?= base_url() ?>index.php/laporan/delete_detail_bonus" method="post">
            <label for="">Anda yakin menghapus data ini ?</label>
            <input type="hidden" name="id_detail" value="<?= $l->id_detail ?>">
            <input type="hidden" name="id" value="<?= $l->id ?>">
            <input type="hidden" name="id_laporan" value="<?= $l->id_laporan ?>">

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-xs">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

</script>
