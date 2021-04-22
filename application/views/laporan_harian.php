<div class="preloader">
    <div class="loading">
      <!-- <img class="img_load" src="img/logo_sticky.png" alt=""> -->
      <div id="shadow"></div>
      <div id="box"></div>
      <!-- <img class="img_load" src="img/logo_sticky_dark.png" alt=""> -->
    </div>
  </div>
<div class="content-wrapper">
  <!-- <a href="#" data-toggle="modal" data-target="#add_laporan" class="btn btn-sm col-12 mb-3" style="box-shadow: 2px 2px 2px rgba(0,0,0,0.5); color: white; border: none; background-image:  linear-gradient(to bottom right, #2cb0d1, #18a2c4);"> <span class="fa fa-plus" id="btn_start"></span>&nbsp Start Laporan</a> -->
  <div class="" id="alert">
  </div>
  <?php foreach ($laporan_unik as $u){ ?>
    <input type="hidden" name="" id="unik" value="<?= $u->id_laporan ?>">
  <?php } ?>

  <?php if ($laporan < 1){ ?>
    <div class="row">
      <?php if ($booth > 0){ ?>
        <div class="alert">
          <button type="button" name="button" class="alert alert-danger"> <span class="fa fa-check"></span> Booth Penjualan mu sudah tutup , selamat beristirahat ya ..</button>
        </div>
      <?php } ?>
      <?php if ($booth < 1): ?>
        <div class="col-sm-12 grid-margin d-flex stretch-card">
          <div class="card">
            <div class="card-header bg-success text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
                <span class="fa fa-edit"></span>&nbsp&nbsp Start Laporan Harian
            </div>
            <div class="card-body">
              <h6 class="font-weight-normal mb-2"><?php echo date('d F Y'); ?></h6>
              <!-- <h6 class="mt-2 text-danger" id="warn">* Klik Start Laporan untuk memulai</h6> -->
              <div>
                <div class="tab-content tab-no-active-fill-tab-content">
                  <form class="form-group" action="<?= base_url(); ?>index.php/laporan/add_laporan" method="post">
                    <div class="row">
                      <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                        <div class="form-group">
                          <label for="" style="color:black; font-weight:bold;">Nama Pegawai</label>
                          <input type="hidden" name="nama" value="<?= $this->session->userdata('email')?>">
                          <input type="text" name="nam" value="<?= $this->session->userdata('email')?>" class="form-control form-control-sm" readonly>
                        </div>
                      </div>
                      <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                        <div class="form-group">
                          <label for="" style="color:black; font-weight:bold;">Pilih Booth</label><span style="font-size:12px;" class="text-danger ml-2">*pastikan memilih booth penjualan dengan benar</span>
                          <!-- <h6 id="caution_booth" class="text-danger"></h6> -->
                          <div class="" id="terpilih">

                          </div>
                          <select class="form-control" name="pilih_booth" id="pilih_booth" style="border-radius: 20px;">
                            <option value="">-- Pilih --</option>
                          </select>
                          <!-- <div class="" id="konfirmasi_place">
                            <button type="button" name="button" class="btn btn-xs btn-danger mt-2" id="konfirmasi">Konfirmasi</button>
                          </div> -->
                          <div class="" id="cancel_place">
                            <button type="button" name="button" class="btn btn-xs btn-primary mt-2" id="canceli">Pilih Ulang</button>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="form-group">
                      <label  style="color:black; font-weight:bold;">Menu yang disediakan :</label>
                      <br>
                    <select id="paket" name="paket[]" class="form-control" multiple="multiple" required style="width: 100%; border-color:  blue;">
                        <option value="">-- Select Menu--</option>
                        <?php foreach ($menu as $m){ ?>
                          <option value="<?= $m['id_menu']?>"><?= $m['nama_menu']?> <span style="font-size:10px;">(Rp. <?= number_format($m['harga_menu'])?>)</span></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-xs btn-primary text-center col-12" style="border-radius: 20px;">Start Penjualan &nbsp<span class="fa fa-arrow-right" id="btn_start"></span></button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>

  <?php } ?>
  <?php if ($laporan > 0){ ?>
    <div class="alert alert-warning" id="al">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="fa fa-bell"></span>&nbsp&nbsp Selamat datang kembali <b> <?= $this->session->userdata('email') ?> </b> !!
        </div>
    <div id="tombol">
      <!-- <a href="#" id="lapor_cuaca" class="btn btn-xs btn-info mb-3" style="color: white; border: none; background-image:  linear-gradient(to bottom right, #2cb0d1, #18a2c4);">  Laporan Cuaca ?</a> -->
      <div id="sub_tombol" class="mb-3">
        <p>Bagaimana cuaca sekitar mu ?</p>
        <!-- <h6 class="text-danger">* Klik untuk laporan cuaca</h6> -->
       <a id="btnc" data="cerah" href="#" class="btn btn-xs btn-light btnc mt-2 ml-1" style="width: 18%; color: black; border: none; background-image:  linear-gradient(to bottom right, #ffffff, #ffffff);"> <span><img style="height: 20px;" src="<?= base_url(); ?>/assets/images/cuaca/1.png"></span>&nbsp Cerah &nbsp&nbsp&nbsp&nbsp&nbsp</a>
        <a id="btnc" data="cerah berawan" href="#" class="btn btn-xs btn-light btnc mt-2 ml-1" style="width: 18%; color: black; border: none; background-image:  linear-gradient(to bottom right, #ffffff, #ffffff);"><span><img style="height: 20px;" src="<?= base_url(); ?>/assets/images/cuaca/2.png"></span>&nbsp Cerah Berawan</a>
        <a id="btnc" data="cerah mendung" href="#" class="btn btn-xs btn-light btnc mt-2 ml-1" style="width: 18%; color: black; border: none; background-image:  linear-gradient(to bottom right, #ffffff, #ffffff);"><span><img style="height: 20px;" src="<?= base_url(); ?>/assets/images/cuaca/3.png"></span>&nbsp Cerah Mendung</a>
        <a id="btnc" data="gerimis" href="#" class="btn btn-xs btn-light btnc mt-2 ml-1" style="width: 18%; color: black; border: none; background-image:  linear-gradient(to bottom right, #ffffff, #ffffff);"><span><img style="height: 20px;" src="<?= base_url(); ?>/assets/images/cuaca/4.png"></span>&nbsp Gerimis &nbsp&nbsp&nbsp&nbsp&nbsp</a>
        <a id="btnc" data="hujan" href="#" class="btn btn-xs btn-light btnc mt-2 ml-1" style="width: 18%; color: black; border: none; background-image:  linear-gradient(to bottom right, #ffffff, #ffffff);"><span><img style="height: 20px;" src="<?= base_url(); ?>/assets/images/cuaca/5.png"></span>&nbsp Hujan &nbsp&nbsp&nbsp&nbsp&nbsp</a>
        <br>
        <br>
        <a href="#" id="new_menu" class="btn btn-xs btn-primary col-4" style="border-radius: 20px; box-shadow: 2px 2px 2px rgba(0,0,0,0.5);"><span class="fa fa-plus"></span>&nbsp Menu Baru</a>

      </div>
    </div>

    <div class="row" id="konten">
      <div class="col-sm-12 grid-margin d-flex stretch-card">
        <div class="card">
          <div class="card-header text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
              <span class="fa fa-edit"></span>&nbsp&nbsp Laporan Penjualan
          </div>
          <div class="card-body">

            <h6 class="font-weight-normal mb-2"><?php echo date('d F Y'); ?></h6>
            <a href="#" style="border-radius: 20px; background: white; color: black;" class="btn btn-xs btn-primary"  id="btn_toggle_laporan"> <span class="fa fa-arrow-right"></span> </a>
            <div>
              <div class="tab-content tab-no-active-fill-tab-content">
                <div class="table-responsive">
                  <table class="table table-bordered text-center table-sm" id="tabel_laporan">
                    <thead>
                      <tr class="" style="background-color : #4D2E07; color: white;">
                        <th>Menu</th>
                        <th>Terjual</th>
                        <th>Bonus</th>
                      </tr>
                    </thead>
                    <tbody id="tabel_jual">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" id="konten_2">
      <div class="col-sm-12 grid-margin d-flex stretch-card">
        <div class="card">
          <div class="card-header text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
              <span class="fa fa-edit"></span>&nbsp&nbsp Laporan Sisa
          </div>
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h4 class="card-title mb-2"> </h4>
            </div>
            <h6 class="font-weight-normal mb-2"><?php echo date('d F Y'); ?></h6>
            <!-- <h6 class="mt-2 text-danger" id="warn">* Klik Start Laporan untuk memulai</h6> -->
            <div>
              <a href="#" style="border-radius: 20px; background: white; color: black;" class="btn btn-xs btn-primary"  id="btn_toggle_sisa"> <span class="fa fa-arrow-right"></span> </a>
              <div class="tab-content tab-no-active-fill-tab-content">
                <div class="table-responsive">
                  <table class="table table-bordered table-sm text-center" id="tabel_sisa">
                    <thead>
                      <tr class="" style="background-color : #4D2E07; color: white;">
                        <th class="">Menu</th>
                        <th class="">Sisa</th>

                      </tr>
                    </thead>
                    <tbody id="sisa">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 grid-margin d-flex stretch-card">
        <div class="card">
          <div class="card-header text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
               Catatan Penjualan
          </div>
          <div class="card-body">

            <div>
              <div class="tab-content tab-no-active-fill-tab-content">
                <div id="tombol_2" class="mt-2">
                  <form class="" action="" method="post">
                    <div class="form-group">
                      <h6 class="text-danger">* Note Penjualan</h6>

                      <?php foreach ($note as $n){ ?>
                        <textarea name="name" rows="8" cols="80" class="form-control" name="note" id="note"><?= $n->notepad ?></textarea>
                      <?php } ?>
                      <a href="#" id="notes" class="btn btn-xs btn-primary col-4 mt-2" style="border-radius: 20px; background: white; color: black;"><span class="fa fa-check"></span>&nbsp&nbsp Save Notes</a>
                    </div>
                  </form>
                  <a href="#" id="tutup_toko" class="btn btn-sm btn-danger mb-3 col-12" style="color: white; border: none; border-radius: 20px;">  Tutup Booth Penjualan</a>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  <?php } ?>






</div>
<!-- Modal Priority -->
  <div class="modal fade" id="edit_sisa" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Sisa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="#" method="post">
            <div class="form-group">
              <label for="">Sisa Berapa Cup ?</label>
              <input type="text" name="cup" value="" class="form-control" id="edit_cup">
            </div>
            <div class="form-group">
              <label for="">Sisa Berapa Plastik ?</label>
              <input type="text" name="plastik" value="" class="form-control" id="edit_plastik">
              <input type="hidden" name="id_sisa" value="" class="form-control" id="edit_id">
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

  <!-- Modal Yakin -->
    <div class="modal fade" id="yakin" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Booth</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="#" method="post">
              <div class="form-group">
                <label for="">Anda yakin memilih booth ini?</label>
                <!-- <input type="text" name="id_booth" value="" class="form-control" id="id_booth"> -->
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="konfirmasi_btn">Confirm</button>
          </div>
        </div>
      </div>
    </div>




      <!-- Modal Tutup -->
        <div class="modal fade" id="tutup_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Penutupan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="#" method="post">
                  <div class="form-group">
                    <label for="">Anda yakin akan menutup booth penjualan sekarang ?</label>
                    <input type="hidden" name="" value="" id="id_laporan_tutup">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="tutup_btn">Iya , saya mau tutup</button>
              </div>
            </div>
          </div>
        </div>

 <!-- modal sukses -->
 <div class="modal fade" id="sukses" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Cuaca berhasil di laporkan , silahkan kembali bekerja  <br>
      Semangat Yaaa !!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Siap , laksanakan</button>
      </div>
    </div>
  </div>
</div>

<!-- modal addmenu -->
<div class="modal fade" id="new_menu_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLongTitle">Tambah Menu Penjualan Hari ini</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <div class="form-group">
         <label>Pilih Menu :</label>
         <br>
       <select id="paket" name="paket[]" class="form-control" multiple="multiple" required style="width: 100%;">
           <option value="">-- Select Menu--</option>
           <?php foreach ($menu as $m){ ?>
             <option value="<?= $m['id_menu']?>"><?= $m['nama_menu']?></option>
           <?php } ?>
       </select>
       </div>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-danger" id="new_menu_btn"><span class="fa fa-plus"></span>&nbsp Tambah</button>
     </div>
   </div>
 </div>
</div>


<!-- modal minusmenu -->
<div class="modal fade" id="minus_menu_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLongTitle">Hapus Menu Penjualan Hari ini</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <div class="form-group">
         <label>Pilih Menu :</label>
         <br>
       <select id="paket" name="paket[]" class="form-control" multiple="multiple" required style="width: 100%;">
           <option value="">-- Select Menu--</option>
           <?php foreach ($menu as $m){ ?>
             <option value="<?= $m['id_menu']?>"><?= $m['nama_menu']?></option>
           <?php } ?>
       </select>
       </div>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-danger" id="new_menu_btn"><span class="fa fa-plus"></span>&nbsp Tambah</button>
     </div>
   </div>
 </div>
</div>








<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".preloader").fadeOut(1000);
$('#tabel_laporan').hide();
$('#tabel_sisa').hide();
$('#cancel_place').hide();

tampil_menu();
tampil_sisa();
tampil_booth();
$('#new_menu').click(function(){
  event.preventDefault();
  $('#new_menu_modal').modal('show');
});
$('#new_menu_btn').click(function(){
  var laporan = $('#unik').val();
  var menu = $('#paket').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/laporan/add_new_menu",
    dataType: "JSON",
    data: {laporan:laporan,menu:menu},
    success: function(data)
    {
      tampil_menu();
      tampil_sisa();
      $('#new_menu_modal').modal('hide');
    }

  });
  console.log(menu);
});
$('#note').click(function(){
  event.preventDefault();
    $('#notes').show(800);
});
$('#notes').click(function(){
  event.preventDefault();
  var id = $('#unik').val();
  var note = $('#note').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/laporan/add_notes",
    dataType: "JSON",
    data: {id:id,note:note},
    success: function(data)
    {
      $('#notes').hide(1000);
    }
  });
});

$('#sub_tombol').on('click', '.btnc', function(){
    var laporan = $(this).attr('data');
    var id = $('#id_laporan_tutup').val();
    $.ajax({
      method: 'POST',
      url: "<?= base_url() ?>index.php/laporan/lapor_cuaca",
      dataType: "JSON",
      data: {laporan:laporan,id:id},
      success: function(data)
      {
        // $('#sub_tombol').hide(1000);
        $('#sukses').modal('show');
        console.log(id);
      }
    });
});
$('#tutup_toko').click(function(){
  $('#tutup_modal').modal('show');
});
$('#tutup_btn').click(function(){
  var id = $('#id_laporan_tutup').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/laporan/tutup",
    dataType: "JSON",
    data: {id:id},
    success: function(data)
    {
      var alert = '<button type="button" name="button" class="alert alert-danger"> <span class="fa fa-check"></span> Booth penjualan anda telah ditutup , selamat beristirahat dan hati hati di jalan ya ..</button>';
      $('#alert').html(alert);
      $('#konten').hide(1000);
      $('#konten_2').hide(1000);
      $('#tombol').hide(1000);
      $('#tombol_2').hide(1000);
      $('#tutup_modal').modal('hide');
    }
  });
});
$('#konfirmasi').click(function(){
  $('#yakin').modal('show');
});
$('#konfirmasi_btn').click(function(){
  $('#yakin').modal('hide');
  var booth = $('#pilih_booth').val();
  var pilih = '';
  var btn = '<button type="button" name="button" class="btn btn-xs btn-primary mt-2" id="canceli">Pilih Ulang</button>';
  pilih = "<h6> <span class='fa fa-check'></span> Booth telah dipilih</h6>";
  $('#terpilih').html(pilih);
  $('#terpilih').show();
  $('#pilih_booth').hide(1000);
  $('#cancel_place').show();
  $('#konfirmasi_place').hide();
});
$('#cancel_place').click(function(){
  $('#konfirmasi_place').show();
  $('#terpilih').hide();
  $('#cancel_place').hide();
  $('#pilih_booth').show(1000);
});

$('#btn_toggle_laporan').click(function() {
    event.preventDefault();
    $('#tabel_laporan').toggle("slow");
  });
  $('#btn_toggle_sisa').click(function() {
      event.preventDefault();
      $('#tabel_sisa').toggle("slow");
    });
    function tampil_menu()
    {
      $.ajax({
        method: 'GET',
        url: "<?= base_url() ?>index.php/laporan/get_laporan",
        dataType: "JSON",
        success: function(data){
          var view = '';
          var i;
          var lapor = '';
          for (var i = 0; i < data.length; i++) {
            view += '<tr>'+
                '<td>'+data[i].nama_menu+'</td>'+
                '<td>'+data[i].terjual+' <br><br> <a style="border-radius:30px;" class="btn btn-xs btn-primary text-light add_laku" data="'+data[i].id+'"><span class="fa fa-plus"></span></a> </td>'+
                '<td>'+data[i].bonus+' <br><br> <a style="border-radius:30px;" class="btn btn-xs btn-danger text-light add_bonus" data="'+data[i].id+'"><span class="fa fa-plus"></span></a> </td>'+
                '</tr>';
            lapor = data[i].id_laporan;
            booth = data[i].id_booth;
          }
          $('#tabel_jual').html(view);
          $('#id_laporan').val(lapor);
          $('#id_laporan_tutup').val(booth);
        }
      });
    }
    function tampil_sisa()
    {
      $.ajax({
        method: 'POST',
        url: "<?= base_url() ?>index.php/laporan/get_laporan",
        dataType: "JSON",
        success: function(data){
          var view = '';
          var i;
          for (var i = 0; i < data.length; i++) {
            view += '<tr>'+
                '<td>'+data[i].nama_menu+'</td>'+
                '<td>Cup : '+data[i].sisa_cup+' Plastik : '+data[i].sisa_plastik+' <br><br> <a style="border-radius: 20px; background: white; " class="btn btn-xs btn-primary text-dark update_sisa" data="'+data[i].id+'"><span class="fa fa-edit"></span>Edit</a></td>'+
                '</tr>';
          }
          $('#sisa').html(view);
        }
      });
    }
    function tampil_booth()
    {
      $.ajax({
        method: 'GET',
        url: "<?= base_url() ?>index.php/home/get_booth_kosong",
        dataType: "JSON",
        success: function(data){
          var option = '';
          var i;
          for (var i = 0; i < data.length; i++) {
            option += "<option value="+data[i].id_booth+">"+data[i].nama_booth+"</option>";
          }
          $('#pilih_booth').html(option);
        }
      });
    }

    $("#paket").select2({
    placeholder: "Pilih 1 atau beberapa menu"
                    });


    $('#tabel_jual').on('click','.add_laku',function(){
      var id = $(this).attr('data');
      var idl = $('#unik').val();
      $.ajax({
        method: 'POST',
        url: "<?= base_url(); ?>index.php/laporan/plus",
        dataType: "JSON",
        data: {id:id,idl:idl},
        success: function(data){

          console.log(idl);
          tampil_menu();
        }
      });
    });
    $('#tabel_jual').on('click','.add_bonus',function(){
      var id = $(this).attr('data');
      var idl = $('#unik').val();
      $.ajax({
        method: 'POST',
        url: "<?= base_url(); ?>index.php/laporan/bonus",
        dataType: "JSON",
        data: {id:id,idl:idl},
        success: function(data){
          console.log(idl);
          tampil_menu();
        }
      });
    });
    $('#sisa').on('click','.update_sisa',function(){
      var id = $(this).attr('data');
      $.ajax({
        method: 'POST',
        url: "<?= base_url() ?>index.php/laporan/get_sisa_modal",
        dataType: "JSON",
        data: {id:id},
        success: function(data)
        {
          $.each(data,function(sisa_cup, sisa_plastik){
            $('[name="cup"]').val(data.sisa_cup);
            $('[name="plastik"]').val(data.sisa_plastik);
            $('[name="id_sisa"]').val(id)
            $('#edit_sisa').modal('show');
          });
        }
      });
    });

    $('#update').click(function(){
      var cup = $('#edit_cup').val();
      var plastik = $('#edit_plastik').val();
      var id = $('#edit_id').val();
      $.ajax({
        method: 'POST',
        url: "<?= base_url() ?>index.php/laporan/update_sisa",
        dataType: "JSON",
        data: {cup:cup,plastik:plastik,id:id},
        success: function(data)
        {
            $('#edit_sisa').modal("hide");
            tampil_sisa();
        }
      });

    });

});
</script>
