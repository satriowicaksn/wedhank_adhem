<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12 grid-margin d-flex stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <h4 class="card-title mb-2"> <span class="fa fa-edit"></span>&nbsp Laporan Penjualan</h4>
          </div>
          <!-- <a href="#" class="btn btn-sm btn-primary mt-3 mb-3" style="background-color : ##077ee0; color: white; border: none;"> <span class="fa fa-file-word-o"></span>&nbsp Export Word</a> -->
          <a href="<?= base_url() ?>index.php/laporan/export" class="btn btn-sm btn-success mt-3 mb-3 col-4" style="background-color : #009111; color: white; border: none;"> <span class="fa fa-file-excel-o"></span>&nbsp Export Excel</a>
          <div>
            <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
              <li class="nav-item">
                <a class="nav-link pl-2 pr-2" id="revenue" data-toggle="tab" href="#revenue-for-last-month" role="tab" aria-controls="revenue-for-last-month" aria-selected="true"> <span class="fa fa-clock-o"></span>&nbsp Hari Ini</a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-2 pr-2" id="server-loading-tab" data-toggle="tab" href="#server-loading" role="tab" aria-controls="server-loading" aria-selected="false"> <span class="fa fa-calendar"></span>&nbsp Bulan ini</a>
              </li>
            </ul>
            <div class="tab-content tab-no-active-fill-tab-content" id="konten">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="tabel_laporan">
                  <thead>
                    <?php foreach ($pelapor as $p){ ?>
                      <tr class="" style="background-color: #e0e0e0;">
                        <td rowspan="2"><b> Nama </b></td>
                        <td rowspan="2"><b>Booth </b></td>
                        <td rowspan="2"><b>Tanggal </b></td>
                        <td colspan="4">Menu</td>
                      </tr>
                      <tr style="background-color: #e0e0e0;">
                        <td rowspan="2">Nama Menu</td>
                        <td rowspan="2">Terjual</td>
                        <td rowspan="2">Bonus</td>
                        <td rowspan="2">Sisa</td>
                      </tr>
                      <tr>
                        <td>as</td>
                        <td>as</td>
                        <td>as</td>
                      </tr>
                      <?php foreach ($laporan as $l){ ?>
                        <?php if ($l->id_laporan == $p->id_laporan){ ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><?= $l->nama_menu ?></td>
                          <td><?= $l->terjual ?></td>
                          <td><?= $l->bonus ?></td>
                          <td><?= $l->sisa_cup ?> Cup , <?= $l->sisa_plastik ?> Plastik</td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                    <!-- <tr class="" style="background-color: #e0e0e0;">
                      <th>Nama</th>
                      <th>Tempat</th>
                      <th>Tanggal</th>
                      <th>Menu</th>
                      <th>Terjual</th>
                      <th>Bonus</th>
                      <th>Sisa</th>
                    </tr> -->
                  </thead>
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
