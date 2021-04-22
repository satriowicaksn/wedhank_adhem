<div>

</div>

<div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <h1 class="text-center text-warning" style="font-size: 90px;">
        <span class="fa fa-warning"></span>
      </h1>
      <br>
      <h3 class="text-center">Laporan sudah dibuat , harap klik satu kali saja !!</h3>
      </div>
      <div class="modal-footer">
      <a href="<?= base_url('index.php/laporan/laporan_harian') ?>" class="btn btn-sm btn-danger">OKE</a>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
$('#warning').modal('show');
});
</script>
