<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12 grid-margin d-flex stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-2"> <span class="fa fa-edit"></span>&nbsp Detail Penjualan Hari Ini</h5>
          </div>
          <h6> <span class="fa fa-calendar"></span>&nbsp <?= date('d M Y'); ?></h6>
          <!-- <a href="<?= base_url() ?>index.php/laporan/export_today" class="btn btn-sm btn-success mt-3 mb-3 col-4" style="background-color : #009111; color: white; border: none;"> <span class="fa fa-file-excel-o"></span>&nbsp Export Detail Hari Ini</a> -->
          <div>

            <div class="tab-content tab-no-active-fill-tab-content" id="konten">
              <div class="table-responsive">
               <table class="table table-bordered table-sm">
                 <tr>
                   <td align="center" style="background-color: #ffc43b;" rowspan="1" colspan="3">Waktu</td>
                   <td align="center" style="background-color: #ffc43b;" rowspan="1" colspan="3">Nama Menu</td>
                   <td align="center" style="background-color: #ffc43b;" rowspan="1" colspan="3">Keterangan</td>

                 </tr>

                 <?php foreach ($laporan as $l){ ?>
                   <tr>
                     <td align="center" colspan="3"><?= $l->nama_menu ?></td>
                     <td align="center" colspan="3"><?= $l->time_detail ?></td>
                     <td align="center" colspan="3"><?= $l->ket_detail ?></td>

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



<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

</script>
