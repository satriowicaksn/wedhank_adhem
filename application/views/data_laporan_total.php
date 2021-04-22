<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12 grid-margin d-flex stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <h4 class="card-title mb-2"> <span class="fa fa-edit"></span>&nbsp Laporan Penjualan Total</h4>
          </div>
          <!-- <h6> <span class="fa fa-calendar"></span>&nbsp <?= date('d M Y'); ?></h6> -->
          <!-- <a href="#" class="btn btn-sm btn-primary mt-3 mb-3" style="background-color : ##077ee0; color: white; border: none;"> <span class="fa fa-file-word-o"></span>&nbsp Export Word</a> -->
          <a href="<?= base_url() ?>index.php/laporan/export" class="btn btn-sm btn-success mt-3 mb-3 col-4" style="background-color : #009111; color: white; border: none;"> <span class="fa fa-file-excel-o"></span>&nbsp Export Detail</a>
          <div>
            <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
              <li class="nav-item">
                <a class="nav-link active pl-2 pr-2" id="revenue" href="<?= base_url() ?>index.php/laporan/data_laporan_total" role="tab" aria-controls="revenue-for-last-month" aria-selected="true"> <span class="fa fa-calendar"></span>&nbsp Semua</a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-2 pr-2" id="server-loading-tab" href="<?= base_url() ?>index.php/laporan/data_laporan" role="tab" aria-controls="server-loading" aria-selected="false"> <span class="fa fa-clock-o"></span>&nbsp Hari Ini</a>
              </li>
            </ul>
            <div class="tab-content tab-no-active-fill-tab-content" id="konten">
              <div class="table-responsive">
                <table class="table table-sm table-bordered text-center" id="tabel_laporan">
                  <thead>
                    <tr style="background-color : #6c7293; color: white;">
                      <th>Menu</th>
                      <th>Total Terjual</th>
                      <th>Total Bonus</th>
                      <th>Total Sisa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($total as $t){ ?>
                      <tr>
                        <td><?= $t->nama_menu ?></td>
                        <td><?= $t->terjual ?></td>
                        <td><?= $t->bonus ?></td>
                        <td>Cup : <?= $t->sisa_cup ?> , Plastik : <?= $t->sisa_plastik ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
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
