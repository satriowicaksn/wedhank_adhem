<div class="content-wrapper">
  <!-- <a href="#" data-toggle="modal" data-target="#add_laporan" class="btn btn-sm col-12 mb-3" style="box-shadow: 2px 2px 2px rgba(0,0,0,0.8); color: white; border: none; background-image:  linear-gradient(to bottom right, #2cb0d1, #18a2c4);"> <span class="fa fa-plus" id="btn_start"></span>&nbsp Start Laporan</a> -->
    <div class="row">
      <div class="col-sm-12 grid-margin d-flex stretch-card">
        <div class="card">
          <div class="card-header text-white" style="background-image:  linear-gradient(to bottom right, #A97B4C, #A97B4C);">
              <span class="fa fa-users"></span>&nbsp&nbsp  Data Pegawai Es Kopi Klasik
          </div>
          <div class="card-body">

            <a href="#" class="btn btn-sm btn-primary btn-block" id="btn_add"> <span class="fa fa-plus"></span>&nbsp Tambah Pegawai</a>
            <!-- <h6 class="mt-2 text-danger" id="warn">* Klik Start Laporan untuk memulai</h6> -->
            <div>
              <div class="tab-content tab-no-active-fill-tab-content">
                <div class="table-responsive">
                  <table class="table table table-sm table-bordered text-center datables" id="tabel_sisa">
                    <thead>
                      <tr class="" style="background-color : #4D2E07; color: white;">
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="pegawai" style="color: black;">

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
          <h5 class="modal-title" id="staticBackdropLabel">Tambah user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="#" method="post">
            <div class="form-group">
              <label for=""> <span class="fa fa-user"></span>&nbsp Username</label>
              <input type="text" name="username" value="" class="form-control" id="add_username">
            </div>
            <div class="form-group">
              <label for=""> <span class="fa fa-key"></span>&nbsp Password</label>
              <input type="password" name="password" value="" class="form-control" id="add_password">
            </div>
            <div class="form-group">
              <label for=""> <span class="fa fa-address-card-o"></span>&nbsp Pilih Role</label>
              <select class="form-control" name="role" id="add_role">
                <option value="1">Admin</option>
                <option value="2">Pegawai</option>
              </select>
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
            <h5 class="modal-title" id="staticBackdropLabel">Edit Pegawai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="#" method="post">
              <input type="hidden" name="id_user" value="" class="form-control" id="edit_id">
              <div class="form-group">
                <label for=""> <span class="fa fa-user"></span>&nbsp Username</label>
                <input type="text" name="username" value="" class="form-control" id="update_username">
              </div>
              <div class="form-group">
                <label for=""> <span class="fa fa-key"></span>&nbsp Password</label>
                <input type="password" name="password" value="" class="form-control" id="update_password">
              </div>
              <div class="form-group">
                <label for=""> <span class="fa fa-address-card-o"></span>&nbsp Pilih Role</label>
                <select class="form-control" name="role" id="update_role">
                  <option value="2">Pegawai</option>
                  <option value="1">Admin</option>
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

    <!-- Modal Delete -->
      <div class="modal fade" id="modal_delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Hapus Pegawai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="#" method="post">
                <input type="hidden" name="id_user" value="" class="form-control" id="delete_id">
                <label for="">Hapus data pegawai ?</label>
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
  $('[name="username"]').val('');
  $('[name="password"]').val('');
  $('[name="role"]').val('');

});
$('#add').click(function(){
  var username = $('#add_username').val();
  var password = $('#add_password').val();
  var role = $('#add_role').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/pegawai/add_pegawai",
    dataType: "JSON",
    data: {username:username,password:password,role:role},
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
    method: 'ajax',
    url: "<?= base_url() ?>index.php/pegawai/get_pegawai",
    dataType: "JSON",
    success: function(data){
      var view = '';
      var i;
      for (var i = 0; i < data.length; i++) {
        view += '<tr>'+
            '<td>'+data[i].username+'</td>'+
            '<td>'+data[i].role+'</td>'+
            '<td> <a class="btn btn-xs btn-primary text-white update_pegawai" data="'+data[i].id_user+'"><span class="fa fa-edit mr-2"></span>Edit</a> <a class="btn btn-xs btn-danger text-white delete_pegawai" data="'+data[i].id_user+'"><span class="fa fa-trash mr-2"></span>Hapus</a> </td>'+
            '</tr>';
      }
      $('#pegawai').html(view);
    }
  });
}
$('#pegawai').on('click','.update_pegawai',function(){
  var id = $(this).attr('data');
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/pegawai/get_pegawai_modal",
    dataType: "JSON",
    data: {id:id},
    success: function(data)
    {
      $.each(data,function(username, password, role){
        $('[name="username"]').val(data.username);
        $('[name="password"]').val(data.password);
        $('[name="role"]').val(data.role);
        $('[name="id_user"]').val(id);
        $('#modal_edit').modal('show');
      });
    }
  });
});

$('#pegawai').on('click','.delete_pegawai',function(){
  var id = $(this).attr('data');
  $('#delete_id').val(id);
  $('#modal_delete').modal('show');
});
$('#delete').click(function(){
  var id = $('#delete_id').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/pegawai/delete_pegawai",
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
  var username = $('#update_username').val();
  var password = $('#update_password').val();
  var role = $('#update_role').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/pegawai/update_pegawai",
    dataType: "JSON",
    data: {id:id, username:username, password:password, role:role},
    success: function(data)
    {
      $('#modal_edit').modal('hide');
        tampil_pegawai();
    }
  });
});



});

</script>
