
<?php if ($this->session->userdata('role') == 1){ ?>
  <div class="content-wrapper">
    <div class="alert alert-warning" id="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="fa fa-bell"></span>&nbsp&nbsp Selamat datang kembali <b> <?= $this->session->userdata('email') ?> </b> !!
        </div>
  <div class="row">
    <div class="col-lg-4 d-flex grid-margin stretch-card">
      <div class="card">
        <div class="card-header bg-success text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
            <span class="fa fa-globe"></span>&nbsp Booth Penjualan
        </div>
        <div class="card-body">

          <button style="border-radius: 20px; background: white; color: #18a2c4;" type="button" class="btn btn-xs btn-primary mb-3" name="button" id="btn_booth">Hide / Show <span class="fa fa-arrow-right ml-2"></span></button>
          <br>
          <div class="" id="tabel_booth">
            <a class="btn btn-xs btn-primary btn-block text-white" name="button" id="show_add_modal"><span class="fa fa-plus"></span>&nbsp Tambah Lokasi</a>
            <a class="btn btn-xs btn-danger btn-block text-white" name="button" id="show_kosong_modal"><span class="fa fa-refresh"></span>&nbsp Kosongkan Semua Booth</a>
            <table class="table table-bordered table-sm text-center mt-3" id="tabel_booth">
              <thead>
                <tr style="background-color : #4D2E07; color: white;">
                  <th>Lokasi</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody id="tabel_booth_body">

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <div class="col-lg-4 d-flex grid-margin stretch-card">
      <div class="card">
        <div class="card-header text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
            <span class="fa fa-clock-o"></span>&nbsp Penjualan Hari Ini (<?= date('d F Y')?>)
        </div>
        <div class="card-body">


          <?php foreach ($today as $td){ ?>
            <h3 class="text-danger">
              Omset Hari Ini :
              Rp. <?= number_format($td->omset_menu) ?>
            </h3>
          <?php } ?>
          <br>
            <?php foreach ($today as $td): ?>
              <div class="row">
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                  <h6 class="text-dark"><b>Minuman Terjual</b> :
                    <?= $td->terjual ?>
                    <?php if ($td->terjual == NULL): ?>
                      <b>-</b>
                    <?php endif; ?>
                  </h6>
                  <h6 class="text-dark"><b>Bonus</b> : <?= $td->bonus ?>
                    <?php if ($td->bonus == NULL): ?>
                      <b>-</b>
                    <?php endif; ?>
                  </h6>
                </div>
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                      <h6 class="text-dark"><b>Sisa Cup</b> : <?= $td->sisa_cup ?>
                        <?php if ($td->sisa_cup == NULL): ?>
                        <b>-</b>
                    <?php endif; ?>
                      </h6>
                   <h6 class="text-dark"><b>Sisa Plastik</b> : <?= $td->sisa_plastik ?>
                     <?php if ($td->sisa_plastik == NULL): ?>
                       <b>-</b>
                     <?php endif; ?>
                  </h6>
                </div>
              </div>
            <?php endforeach; ?>
          <br>
          <?php if (count($omzet_user) <= 0): ?>
          <div class="alert alert alert-danger">
            Belum ada laporan penjualan hari ini
          </div>
          <?php endif; ?>
          <?php if (count($omzet_user) > 0): ?>
          <table class="table table table-sm table-bordered text-center datables" id="tabel_ido">
            <thead>
              <tr class="" style="background-color : #4D2E07; color: white;">
                <th>Pegawai</th>
                <th>Lokasi</th>
                <th>Omzet</th>
              </tr>
            </thead>
            <tbody id="pegawai">
                <?php foreach ($omzet_user as $ou){ ?>
                    <tr>
                      <td><?= $ou->user_laporan ?></td>
                      <td><?= $ou->ket_tempat ?></td>
                      <td>Rp. <?= number_format($ou->omset_menu) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>


          <br>
          <form class="" action="<?= base_url() ?>index.php/omzet/omzet_by_day" method="post">

            <input type="hidden" name="date" value="<?= $dateNow ?>">
            <button type="button" onclick="location.href='<?= base_url() ?>index.php/laporan/data_laporan';" name="button" class="btn btn-xs btn-primary" style="border-radius: 20px;">Lihat Detail Penjualan</button>
          </form>
          <br>
          <b class="text-dark">Laporan Cuaca Terkini</b>
          <br>
          <?php if (count($cuaca) > 0): ?>
            <a href="#" style="border-radius: 20px; background: white; color: #18a2c4;" class="btn btn-xs btn-primary mt-3" id="show_cuaca">Hide / Show <span class="ml-2 fa fa-arrow-right"></span> </a>
          <?php endif; ?>

          <?php if (count($cuaca) <= 0): ?>
            <div class="alert alert-danger mt-3">
              Belum ada laporan cuaca hari ini
            </div>
          <?php endif; ?>
          <?php if (count($cuaca) > 0): ?>
            <table class="table table table-sm table-bordered text-center mt-3" id="cuaca_terkini">
              <thead style="background-color : #4D2E07; color: white;">
                <th>Lokasi</th>
                <th>Cuaca</th>
                <th>Waktu</th>
              </thead>
              <tbody>
                <?php foreach ($cuaca as $c){ ?>
                  <tr>
                    <td><?= $c->nama_booth ?></td>
                    <td><?= $c->cuaca ?></td>
                    <td><?= $c->time_cuaca ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php endif; ?>

            <?php endif; ?>
          <!-- <a href="<?= base_url() ?>index.php/laporan/laporan_detail" class="btn btn-xs btn-primary mb-3 text-white" id="btn_detail"><span class="fa fa-eye"></span>&nbsp Detail</a> -->
        </div>
      </div>
    </div>
    <div class="col-lg-4 d-flex grid-margin stretch-card">
      <div class="card">
        <div class="card-header bg-success text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
            <span class="fa fa-dollar"></span>&nbsp Omzet Penjualan Per Hari
        </div>
        <div class="card-header text-primary p-4">
          <div class="row">
            <div class="col-4">
              <img src="<?= base_url() ?>assets/images/omzet.svg" alt="" style="height: 80px;">
            </div>
            <div class="col-7 ml-1">
                <h3 class="text-dark"> <span class="fa fa-info-circle"></span>&nbsp Total Omzet :</h3>
                <h2 class="text-dark">
                  <?php foreach ($omzet_semua as $os): ?>
                    Rp. <?= number_format($os->omset_menu)?>
                  <?php endforeach; ?>
                </h2>
            </div>
          </div>


        </div>
        <div class="card-body">
      <div class="table-responsive mb-2">
        <table class="table table-sm table-bordered text-center">
          <tr style="background-color : #4D2E07; color: white;">
            <th>Periode Penjualan</th>
            <th>Jumlah Pendapatan</th>
          </tr>
          <tr>
            <td>Hari ini</td>
            <td>Rp. <?= number_format($allOmzet['today']); ?></td>
          </tr>
          <tr>
            <td>Kemarin</td>
            <td>Rp. <?= number_format($allOmzet['kemarin']); ?></td>
          </tr>
          <tr>
            <td>3 Hari</td>
            <td>Rp. <?= number_format($allOmzet['3hari']); ?></td>
          </tr>
          <tr>
            <td>1 Minggu</td>
            <td>Rp. <?= number_format($allOmzet['1minggu']); ?></td>
          </tr>
          <tr>
            <td>2 Minggu</td>
            <td>Rp. <?= number_format($allOmzet['2minggu']); ?></td>
          </tr>
          <tr>
            <td>3 Minggu</td>
            <td>Rp. <?= number_format($allOmzet['3minggu']); ?></td>
          </tr>
          <tr>
            <td>1 Bulan</td>
            <td>Rp. <?= number_format($allOmzet['1bulan']); ?></td>
          </tr>
          <tr>
            <td>Semua Periode</td>
            <td>Rp. <?= number_format($allOmzet['all']); ?></td>
          </tr>
        </table>
      </div>
      <br>
      <button type="button" class="btn btn-xs btn-block btn-primary mb-3" style="border-radius: 20px;" name="button" onclick="this.disabled=true;this.innerText='harap tunggu ..'; location.href='<?= base_url() ?>index.php/omzet'">Lihat Detail Omzet</button>



        </div>
      </div>
    </div>
  </div>
  <div class="row">

    <!-- <div class="col-lg-8 d-flex grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="mb-4">
            <h4 class="text-dark"> <b><span class="fa fa-bar-chart"></span>&nbsp Grafik Penjualan</b> </h4>
            <p class="mt-2"><?php echo date('d M Y'); ?></p>
          </div>
          <h6 class="text-danger">*comingsoon</h6>
          <!-- <a href="<?= base_url() ?>index.php/laporan/laporan_detail" class="btn btn-xs btn-primary mb-3 text-white" id="btn_detail"><span class="fa fa-eye"></span>&nbsp Detail</a> -->
        </div>
      </div>
    </div>
  </div>
    <!-- <div class="row">
      <div class="col-lg-12 flex-column d-flex stretch-card">
        <div class="row">
          <div class="col-lg-6 d-flex grid-margin stretch-card">
            <div class="card bg-primary">
              <div class="card-body text-white">
                <div class="mb-4">
                  <button type="button" class="btn btn-sm btn-warning col-8" name="button"><span class="fa fa-calendar"></span>&nbsp Total Penjualan</button>
                </div>
                <?php foreach ($total as $td){ ?>
                <h3 class="text-white"><b>Terjual</b>: <?= $td->terjual ?></h3>
                <?php } ?>
                <?php foreach ($today as $td){ ?>
                  <h3 class="text-white"><b>Bonus</b>: <?= $td->bonus ?></h3>
                <?php } ?>
                <?php foreach ($today as $td){ ?>
                  <h3 class="text-white"><b>Sisa</b>: <?= $td->sisa_cup  ?> Cup , <?= $td->sisa_plastik ?> Plastik</h3>
                <?php } ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> -->
  </div>
<?php } ?>



<!-- Modal Add Booth -->
  <div class="modal fade" id="modal_add_booth" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Booth Penjualan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="#" method="post">
            <div class="form-group">
              <label for=""> <span class="fa fa-shopping-basket"></span>&nbsp Nama Booth</label>
              <input type="text" name="add_booth" value="" class="form-control" id="add_booth">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="add">Add</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Kosong Booth -->
    <div class="modal fade" id="modal_kosong_booth" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Kosongkan Booth Penjualan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="#" method="post">
              <div class="form-group">
                <label for="">&nbsp Anda yakin akan kosongkan semua booth ?</label>
                <h6 class="text-danger">* Dengan melakukan ini berarti anda akan memulai ulang semua penjualan untuk hari ini</h6>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger" id="kosong">Iya , saya yakin</button>
          </div>
        </div>
      </div>
    </div>

  <!-- Modal Edit Booth -->
    <div class="modal fade" id="modal_edit_booth" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Booth Penjualan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="#" method="post">
              <input type="hidden" name="" value="" id="edit_id">
              <div class="form-group">
                <label for=""> <span class="fa fa-shopping-basket"></span>&nbsp Nama Booth</label>
                <input type="text" name="update_booth" value="" class="form-control" id="update_booth">
              </div>
              <div class="form-group">
                <label for=""> <span class="fa fa-shopping-basket"></span>&nbsp Status Booth</label>
                <select class="form-control" name="status" id="select_status">
                  <option value="" id="status">-- pilih status --</option>
                  <option value="tutup">tutup</option>
                  <option value="sedang buka">buka</option>
                  <option value="kosong">kosong</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="update">Update</button>
          </div>
        </div>
      </div>
    </div>

<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  tampil_booth();
  $(".preloader").fadeOut(1000);
  // $('#cuaca_terkini').hide();
  // $('#tabel_booth').hide();
    $('#tabel_id').dataTable({
    "order": [[ 0, "desc" ]],
    "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],

});
  $('#show_cuaca').click(function(){
      event.preventDefault();
    $('#cuaca_terkini').toggle('slow');

  });
  $('#show_add_modal').click(function(){
    $('#modal_add_booth').modal('show');
  });
  $('#show_kosong_modal').click(function(){
    $('#modal_kosong_booth').modal('show');
  });
  $('#btn_booth').click(function(){
    $('#tabel_booth').toggle('slow');
  });
  function tampil_booth()
  {
    $.ajax({
      method: 'POST',
      url: "<?= base_url() ?>index.php/home/get_booth",
      dataType: "JSON",
      success: function(data)
      {
        var view = '';
        var i;
        for (var i = 0; i < data.length; i++) {
          view += '<tr>'+
              '<td style="font-weight:bold; color: black;">'+data[i].nama_booth+'</td>'+
              '<td>'+data[i].status_booth+'</td>'+
              '<td> <a class="btn btn-xs btn-warning update_booth" data="'+data[i].id_booth+'"><span class="fa fa-edit" style="font-weight:bold; color:white;"></span></a></td>'+
              '</tr>';
        }
        $('#tabel_booth_body').html(view);
      }
    });
  }
  $('#tabel_booth_body').on('click', '.update_booth',function(){
    var id = $(this).attr('data');
    $.ajax({
      method: 'POST',
      url: "<?= base_url() ?>index.php/home/get_booth_modal",
      dataType: "JSON",
      data: {id:id},
      success: function(data)
      {
          $.each(data, function(nama_booth, status_booth){
            $('#edit_id').val(id);
            $('[name="update_booth"]').val(data.nama_booth);
            $('[name="status_booth"]').val(data.status_booth);
            $('#modal_edit_booth').modal('show');
          });
      }
    });

  });
  $('#add').click(function(){
    var booth = $('#add_booth').val();
    $.ajax({
      method: 'POST',
      url: "<?= base_url() ?>index.php/home/add_booth",
      dataType: "JSON",
      data: {booth:booth},
      success: function(data)
      {
        $('[name = "add_booth"]').val('');
        $('#modal_add_booth').modal('hide');
        tampil_booth();
      }
    });
  });
  $('#kosong').click(function(){
    var status = 'kosong';
    $.ajax({
      method: 'POST',
      url: "<?= base_url() ?>index.php/home/kosong_booth",
      dataType: "JSON",
      data: {status:status},
      success: function(data)
      {
        $('#modal_kosong_booth').modal('hide');
        tampil_booth();
      }
    });
  });

  $('#update').click(function(){
    var id = $('#edit_id').val();
    var booth = $('#update_booth').val();
    var status = $('#select_status').val();
    $.ajax({
      method: 'POST',
      url: "<?= base_url() ?>index.php/home/update_booth",
      dataType: "JSON",
      data: {id:id,booth:booth,status:status},
      success: function(data)
      {
        $('#modal_edit_booth').modal('hide');
        tampil_booth();
      }
    });
  });


});

</script>
