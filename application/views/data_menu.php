<div class="content-wrapper">
  <!-- <a href="#" data-toggle="modal" data-target="#add_laporan" class="btn btn-sm col-12 mb-3" style="box-shadow: 2px 2px 2px rgba(0,0,0,0.8); color: white; border: none; background-image:  linear-gradient(to bottom right, #2cb0d1, #18a2c4);"> <span class="fa fa-plus" id="btn_start"></span>&nbsp Start Laporan</a> -->
    <div class="row">
      <div class="col-sm-12 grid-margin d-flex stretch-card">
        <div class="card">
          <div class="card-header text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
               <span class="fa fa-glass"></span>&nbsp Data Menu
          </div>
          <div class="card-body">
            <div id="alert">

            </div>
            <a href="#" class="btn btn-sm btn-primary btn-block" id="btn_add"> <span class="fa fa-plus"></span>&nbsp Tambah Menu</a>
            <!-- <h6 class="mt-2 text-danger" id="warn">* Klik Start Laporan untuk memulai</h6> -->
            <div>
              <div class="tab-content tab-no-active-fill-tab-content">
                <div class="table-responsive">
                  <table class="table table table-sm table-bordered text-center" id="tabel_sisa">
                    <thead>
                      <tr class="" style="background-color : #4D2E07; color: white;">
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="menu" style="color: black;">

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
<!-- Modal Add -->
  <div class="modal fade" id="modal_add" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="#" method="post">
            <div class="form-group">
              <label for=""> <span class="fa fa-glass"></span>&nbsp Nama Menu</label>
              <input type="text" name="add_menu" value="" class="form-control" id="add_menu">
            </div>
            <div class="form-group">
              <label for=""> <span class="fa fa-money"></span>&nbsp Harga</label>
              <input type="number" name="add_harga" value="" class="form-control" id="add_harga">
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

  <!-- Modal Edit -->
    <div class="modal fade" id="modal_edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="#" method="post">
              <input type="hidden" name="id_menu" value="" class="form-control" id="edit_id">
              <div class="form-group">
                <label for=""> <span class="fa fa-glass"></span>&nbsp Nama Menu</label>
                <input type="text" name="update_menu" value="" class="form-control" id="update_menu">
              </div>
              <div class="form-group">
                <label for=""> <span class="fa fa-money"></span>&nbsp Harga</label>
                <input type="number" name="update_harga" value="" class="form-control" id="update_harga">
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

    <!-- Modal Delete -->
      <div class="modal fade" id="modal_delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Hapus Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="#" method="post">
                <input type="hidden" name="id_menu" value="" class="form-control" id="delete_id">
                <label for="">Hapus menu ini ?</label>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="delete">Delete</button>
            </div>
          </div>
        </div>
      </div>









<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
tampil_pegawai();
$('#btn_add').click(function(){
  $('#modal_add').modal("show");
  $('[name="add_menu"]').val('');
  $('[name="add_harga"]').val('');


});
$('#add').click(function(){
  var menu = $('#add_menu').val();
  var harga = $('#add_harga').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/menu/add_menu",
    dataType: "JSON",
    data: {menu:menu,harga:harga},
    success: function(data)
    {
      $('#modal_add').modal("hide");
      tampil_pegawai();

    }
  });

});
function tampil_pegawai()
{
  $.ajax({
    method: 'get',
    url: "<?= base_url() ?>index.php/menu/get_menu",
    dataType: "JSON",
    success: function(data){
      var view = '';
      var i;
      for (var i = 0; i < data.length; i++) {
        view += '<tr>'+
            '<td>'+data[i].nama_menu+'</td>'+
            '<td>Rp. '+data[i].harga_menu+' </td>'+
            '<td> <a class="btn btn-xs btn-primary text-white update_menu" data="'+data[i].id_menu+'"><span class="fa fa-edit mr-2"></span>Edit</a> <a class="btn btn-xs btn-danger text-white delete_menu" data="'+data[i].id_menu+'"><span class="fa fa-trash mr-2"></span>Hapus</a> </td>'+
            '</tr>';
      }
      $('#menu').html(view);
    }
  });
}
$('#menu').on('click','.update_menu',function(){
  var id = $(this).attr('data');
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/menu/get_menu_modal",
    dataType: "JSON",
    data: {id:id},
    success: function(data)
    {
      // console.log(data);
      $.each(data,function(nama_menu, harga_menu){
        $('[name="update_menu"]').val(data.nama_menu);
        $('[name="update_harga"]').val(data.harga_menu);
        $('[name="id_menu"]').val(id);
        $('#modal_edit').modal('show');
      });
    }
  });
});

$('#menu').on('click','.delete_menu',function(){
  var id = $(this).attr('data');
  $('#delete_id').val(id);
  $('#modal_delete').modal('show');
});
$('#delete').click(function(){
  var id = $('#delete_id').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/menu/delete_menu",
    dataType: "JSON",
    data: {id:id},
    success: function()
    {
      $('#modal_delete').modal('hide');
      tampil_pegawai();
    }
  });
});

$('#update').click(function(){
  var id = $('#edit_id').val();
  var menu = $('#update_menu').val();
  var harga = $('#update_harga').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/menu/update_menu",
    dataType: "JSON",
    data: {id:id, menu:menu, harga:harga},
    success: function(data)
    {
      $('#modal_edit').modal('hide');
        tampil_pegawai();
    }
  });
});



});

</script>
