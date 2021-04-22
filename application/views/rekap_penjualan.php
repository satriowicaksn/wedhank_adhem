<div class="content-wrapper">
<div class="row">
<div class="col-lg-12 d-flex grid-margin stretch-card">
<div class="card">
<div class="card-body">
  <div class="alert alert-info text-center" role="alert">
    <span class="fa fa-info-circle"></span>&nbsp&nbsp Rekap Laporan Penjualan
  </div>
  <form class="" action="<?= base_url() ?>index.php/rekap/rekaphari" method="post">
    <div class="row">
      <div class="col-lg-6">
        <div class="input-group mb-3">
              <div class="input-group-prepend" style="">
                <span class="input-group-text" id="basic-addon2" style="background: #f2eeeb; color: black; width: 120px; font-weight:bold;">Dari Tanggal</span>
              </div>
            <input type="date" name="awal" class="form-control" placeholder="Masukan nama anda" value="" required>
          </div>
      </div>
      <div class="col-lg-6">
        <div class="input-group mb-3">
              <div class="input-group-prepend" style="">
                <span class="input-group-text" id="basic-addon2" style="background: #f2eeeb; color: black; width: 120px; font-weight:bold;">Sampai Tanggal</span>
              </div>
            <input type="date" name="akhir" class="form-control" placeholder="Masukan nama anda" value="" required>
          </div>
      </div>
    </div>
    <br>
    <button type="submit" class="btn btn-block btn-primary" name="button" style="border-radius: 20px;"> <span class="fa fa-search"></span>&nbsp&nbsp Tampilkan Penjualan</button>
  </form>
</div>
</div>
</div>
</div>
</div>
