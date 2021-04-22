<?php
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
 ?>
 <h2 align="center">Laporan Penjualan</h2>
 <p align="center" style="color:red;">Di export  : <?php echo date('d/m/Y H:i'); ?> </p>
 <?php foreach ($pelapor as $p){ ?>
   <table>
     <tr>
      <td> <b>Nama : <?= $p->user_laporan ?></b>  </td>
     </tr>
     <tr>
       <td> <b>Booth : <?= $p->nama_booth ?></b> </td>
     </tr>
     <tr>
      <td> <b>Tanggal : <?= $p->tanggal ?></b> </td>
     </tr>

   </table>
<br>
<table border="1">
  <tr>
    <td align="center" style="background-color: #ffc43b;" rowspan="1" colspan="3">Nama Menu</td>
    <td align="center" style="background-color: #ffc43b;" rowspan="1" colspan="3">Terjual</td>
    <td align="center" style="background-color: #ffc43b;" rowspan="1" colspan="3">Bonus</td>
    <td align="center" style="background-color: #ffc43b;" rowspan="1" colspan="3">Sisa</td>
  </tr>
  <?php foreach ($laporan as $l){ ?>
    <?php if ($l->id_laporan == $p->id_laporan){ ?>
      <tr>
        <td align="center" colspan="3"><?= $l->nama_menu ?></td>
        <td align="center" colspan="3"><?= $l->terjual ?></td>
        <td align="center" colspan="3"><?= $l->bonus ?></td>
        <td align="center" colspan="3"><?= $l->sisa_cup ?> Cup , <?= $l->sisa_plastik ?> Plastik</td>
        <!-- <td colspan="4" style="background-color: #ffc43b;"></td> -->
      </tr>
    <?php } ?>
  <?php } ?>
  <tr>
    <td colspan="3" align="center"><b>Note Penjualan : </b></td>
    <td colspan="9" align="center"> <?= $p->notepad ?></td>
  </tr>
</table>

 <br>
 <?php } ?>
