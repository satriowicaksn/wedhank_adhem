<div class="content-wrapper">
  <!-- <a href="#" data-toggle="modal" data-target="#add_laporan" class="btn btn-sm col-12 mb-3" style="box-shadow: 2px 2px 2px rgba(0,0,0,0.8); color: white; border: none; background-image:  linear-gradient(to bottom right, #2cb0d1, #18a2c4);"> <span class="fa fa-plus" id="btn_start"></span>&nbsp Start Laporan</a> -->
    <div class="row">
      <div class="col-sm-12 grid-margin d-flex stretch-card">
        <div class="card">
          <div class="card-header bg-success text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
              <span class="fa fa-dollar"></span>&nbsp Detail Omzet Penjualan
          </div>
          <br>
          <ul class="nav nav-tabs text-left ml-3" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="#tab1" role="tab" data-toggle="tab"><b> <span class="fa fa-calendar mr-2"></span> Omzet Berdasarkan Hari</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tab2" role="tab" data-toggle="tab"><b> <span class="fa fa-users mr-2"></span> Omzet Berdasarkan Pegawai</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tab3" role="tab" data-toggle="tab"><b> <span class="fa fa-shopping-bag mr-2"></span> Omzet Berdasarkan Booth</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tabmenu" role="tab" data-toggle="tab"><b> <span class="fa fa-info-circle mr-2"></span> Omzet Berdasarkan Menu</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tab4" role="tab" data-toggle="tab"><b> <span class="fa fa-info-circle mr-2"></span> Detail Per Penjualan</b></a>
        </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade-in active" id="tab1">
            <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table table-sm table-bordered text-center datables" id="tabel_id">
                      <thead>
                        <tr class="" style="background-color : #4D2E07; color: white;">
                          <th>Hari Ke</th>
                          <th>Tanggal</th>
                          <th>Terjual</th>
                          <th>Bonus</th>
                          <!-- <th>Booth yang buka</th>
                          <th>Rata rata penjualan per booth</th>
                          <th>Rata rata pendapatan per booth</th> -->
                          <th>Total Pendapatan</th>

                          <th>#</th>

                        </tr>
                      </thead>
                      <tbody id="pegawai">
                        <?php foreach ($omzet2 as $o){ ?>
                          <!-- <?php if ($o->tanggal != date('d-m-Y')){ ?> -->
                            <tr>
                              <td><?= $o->id_laporan ?></td>
                              <td><?= date('d F Y', strtotime($o->tanggal_date)); ?></td>
                              <td><?= $o->terjual ?></td>
                              <td><?= $o->bonus ?></td>
                              <!-- <td><?= $o->total_buka ?></td>
                              <td><?= $o->terjual/$o->total_buka ?></td>
                              <td>Rp. <?= number_format($o->omset_menu/$o->total_buka) ?></td> -->
                              <td>Rp. <?= number_format($o->omset_menu) ?></td>
                              <td>
                                <form class="" action="<?= base_url() ?>index.php/omzet/omzet_by_day" method="post">

                                  <input type="hidden" name="date" value="<?= $o->tanggal ?>">
                                  <button type="submit" name="button" class="btn btn-xs btn-primary" style="border-radius: 20px; background: white; color: #18a2c4;"> Details</button>
                                </form>
                              </td>
                            </tr>
                          <!-- <?php } ?> -->
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
          <div class="tab-pane fade" id="tab2">
            <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table table-sm table-bordered text-center datables" id="tabel_id">
                      <thead>
                        <tr class="" style="background-color : #4D2E07; color: white;">
                          <th>Nama Pegawai</th>
                          <th>Terjual</th>
                          <th>Bonus</th>
                          <th>Total Buka</th>
                          <th>Total Pendapatan</th>
                          <th>Rata rata penjualan per buka</th>
                          <th>Rata rata pendapatan per buka</th>
                        </tr>
                      </thead>
                      <tbody id="pegawai">
                        <?php foreach ($omzet3 as $o){ ?>
                          <tr>
                            <td>
                              <?= $o->user_laporan ?>
                            </td>
                            <td><?= $o->terjual ?></td>
                            <td><?= $o->bonus ?></td>
                            <td><?= $o->total_buka ?></td>
                            <td>Rp. <?= number_format($o->omset_menu) ?></td>
                            <td><?= round($o->terjual/$o->total_buka) ?></td>
                            <td>Rp. <?= number_format($o->omset_menu/$o->total_buka) ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
          <div class="tab-pane fade" id="tab3">
            <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table table-sm table-bordered text-center datables" id="tabel_id">
                      <thead>
                        <tr class="" style="background-color : #4D2E07; color: white;">
                          <th>Nama Lokasi</th>
                          <th>Terjual</th>
                          <th>Bonus</th>
                          <th>Total Buka</th>
                          <th>Total Pendapatan</th>
                          <th>Rata rata penjualan per buka</th>
                          <th>Rata rata pendapatan per buka</th>
                        </tr>
                      </thead>
                      <tbody id="pegawai">
                        <?php foreach ($omzet4 as $o){ ?>
                          <tr>
                            <td>
                              <?= $o->ket_tempat ?>
                            </td>
                            <td><?= $o->terjual ?></td>
                            <td><?= $o->bonus ?></td>
                            <td><?= $o->total_buka ?></td>
                            <td>Rp. <?= number_format($o->omset_menu) ?></td>
                            <td><?= round($o->terjual/$o->total_buka) ?></td>
                            <td>Rp. <?= number_format($o->omset_menu/$o->total_buka) ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
          <div class="tab-pane fade" id="tabmenu">
            <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table table-sm table-bordered text-center datables" id="tabel_id">
                      <thead>
                        <tr class="" style="background-color : #4D2E07; color: white;">
                          <th>Nama Menu</th>
                          <th>Terjual</th>
                          <th>Bonus</th>
                          <th>Total Pendapatan</th>
                          <th>Rata rata penjualan per buka</th>
                          <th>Rata rata pendapatan per buka</th>
                        </tr>
                      </thead>
                      <tbody id="pegawai">
                        <?php foreach ($omzetMenu as $o){ ?>
                          <tr>
                            <td>
                              <?= $o->nama_menu ?>
                            </td>
                            <td><?= $o->terjual ?></td>
                            <td><?= $o->bonus ?></td>
                            <td>Rp. <?= number_format($o->omset_menu) ?></td>
                            <td><?= round($o->terjual/$o->total_buka) ?></td>
                            <td>Rp. <?= number_format($o->omset_menu/$o->total_buka) ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
          <div class="tab-pane fade" id="tab4">
            <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table table-sm table-bordered text-center datables" id="tabel_id">
                      <thead>
                        <tr class="" style="background-color : #4D2E07; color: white;">
                          <th>Tanggal</th>
                          <th>User</th>
                          <th>Booth</th>
                          <th>Terjual</th>
                          <th>Bonus</th>
                          <th>Sisa</th>
                          <th>Total Pendapatan</th>
                        </tr>
                      </thead>
                      <tbody id="pegawai">
                        <?php foreach ($omzet as $o){ ?>
                          <tr>
                            <td>
                              <?= $o->tanggal_date ?>
                            </td>
                            <td><?= $o->user_laporan ?></td>
                            <td><?= $o->nama_booth ?></td>
                            <td><?= $o->terjual ?></td>
                            <td><?= $o->bonus ?></td>
                            <td>Cup : <?= $o->sisa_cup ?> , Plastik : <?= $o->sisa_plastik ?></td>
                            <td>Rp. <?= number_format($o->omzet_total) ?></td>
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
$(document).ready(function(){
$('.table').dataTable({
"order": [[ 0, "desc" ]],
"aLengthMenu": [[15, 35, 50, -1], [15, 35, 50, "All"]],

});
});

</script>
