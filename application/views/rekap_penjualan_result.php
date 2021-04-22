<div class="content-wrapper">
<div class="row">
  <div class="col-lg-12 d-flex grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <!-- <a href="<?= base_url() ?>index.php/rekap" class="btn btn-sm btn-secondary"> <span class="fa fa-undo"></span>&nbsp Kembali</a> -->

        <div class="mt-4 mb-3 alert alert-primary" style="color: black;">
          <h3 class="text-center">Rekap Laporan Penjualan</h3>
          <h6>Tanggal Mulai : <?= date('d/m/Y', strtotime($awal_export)); ?></h6>
          <h6>Tanggal Akhir : <?= date('d/m/Y', strtotime($akhir_export)); ?></h6>
        </div>

        <form class="" action="<?= base_url() ?>index.php/rekap/export" method="post">
          <input type="hidden" name="awal_export" value="<?= $awal_export ?>">
          <input type="hidden" name="akhir_export" value="<?= $akhir_export ?>">
          <button type="submit" class="btn btn-sm btn-success btn-block" style="background-color : #009111; color: white; border: none;"><span class="fa fa-file-excel-o"></span>&nbsp&nbsp Export Excel</button>
        </form>
        <br>
        <?php foreach ($rekap_pelapor as $rp): ?>
          <table style="color:black;">
            <tr>
              <td style="width: 200px;"><b>Nama Pegawai</b></td>
              <td style="width: 50px;">:</td>
              <td><?= $rp->user_laporan ?></td>
            </tr>
            <tr>
              <td style="width: 200px;"><b>Nama Booth</b></td>
              <td style="width: 50px;">:</td>
              <td><?= $rp->ket_tempat ?></td>
            </tr>
            <tr>
              <td style="width: 200px;"><b>Tanggal</b></td>
              <td style="width: 50px;">:</td>
              <?php if ($rp->hari == 'Mon'): ?>
                <td>
                  Senin , <?= $rp->tgl ?>
                </td>
              <?php endif; ?>
              <?php if ($rp->hari == 'Tue'): ?>
                <td>
                  Selasa , <?= $rp->tgl ?>
                </td>
              <?php endif; ?>
              <?php if ($rp->hari == 'Wed'): ?>
                <td>
                  Rabu , <?= $rp->tgl ?>
                </td>
              <?php endif; ?>
              <?php if ($rp->hari == 'Thu'): ?>
                <td>
                  Kamis , <?= $rp->tgl ?>
                </td>
              <?php endif; ?>
              <?php if ($rp->hari == 'Fri'): ?>
                <td>
                  Jum'at , <?= $rp->tgl ?>
                </td>
              <?php endif; ?>
              <?php if ($rp->hari == 'Sat'): ?>
                <td>
                  Sabtu , <?= $rp->tgl ?>
                </td>
              <?php endif; ?>
              <?php if ($rp->hari == 'Sun'): ?>
                <td>
                  Minggu , <?= $rp->tgl ?>
                </td>
              <?php endif; ?>
            </tr>
          </table>
          <br>
          <table class="table table-sm table-bordered text-center">
            <thead>
              <tr style="background-color : #4D2E07; color: white;">
                <th>Menu</th>
                <th>Terjual</th>
                <th>Bonus</th>
                <th>Sisa</th>
                <th>Harga</th>
                <th>Omzet</th>
              </tr>
            </thead>
            <?php foreach ($rekap as $r): ?>
              <?php if ($r->id_laporan == $rp->id_laporan): ?>
              <tbody>
                <tr>
                  <td><?= $r->nama_menu ?></td>
                  <td><?= $r->terjual ?></td>
                  <td><?= $r->bonus ?></td>
                  <td><?= $r->sisa_cup ?> Cup, <?= $r->sisa_plastik ?> Plastik</td>
                  <td>Rp. <?= number_format($r->harga_menu) ?></td>
                  <td>Rp. <?= number_format($r->omset_menu) ?></td>
                </tr>
              </tbody>
              <?php endif; ?>
            <?php endforeach; ?>
            <tbody>
              <tr class="" style="background: red; color: white;">
                <td>Total</td>
                <td><?= $rp->terjual ?></td>
                <td><?= $rp->bonus ?></td>
                <td><?= $rp->sisa_cup ?> Cup , <?= $rp->sisa_plastik ?> Plastik</td>
                <td></td>
                <td>Rp. <?= number_format($rp->omset_menu) ?></td>
              </tr>
              <tr>
                <td colspan="2"> <b>* Note</b></td>
                <td colspan="4"><?= $rp->notepad ?></td>
              </tr>
            </tbody>
          </table>
          <br>
          <hr>
          <br>
        <?php endforeach; ?>


      </div>
    </div>
  </div>
</div>
</div>
