<?php
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
 ?>
 <h2 align="center">Laporan Penjualan</h2>
 <p align="center" style="color:red;">Di export tanggal : <?php echo date('d M Y'); ?> </p>
 <p align="center">
   Laporan Per :
   <?php foreach ($a_export as $a): ?>
     <?php if ($a->hari == 'Mon'): ?>
       <td>
         Senin , <?= $a->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($a->hari == 'Tue'): ?>
       <td>
         Selasa , <?= $a->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($a->hari == 'Wed'): ?>
       <td>
         Rabu , <?= $a->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($a->hari == 'Thu'): ?>
       <td>
         Kamis , <?= $a->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($a->hari == 'Fri'): ?>
       <td>
         Jum'at , <?= $a->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($a->hari == 'Sat'): ?>
       <td>
         Sabtu , <?= $a->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($a->hari == 'Sun'): ?>
       <td>
         Minggu , <?= $a->tgl ?>
       </td>
     <?php endif; ?>
   <?php endforeach; ?>
  &nbsp  - &nbsp
   <?php foreach ($b_export as $b): ?>
     <?php if ($b->hari == 'Mon'): ?>
       <td>
         Senin , <?= $b->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($b->hari == 'Tue'): ?>
       <td>
         Selasa , <?= $b->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($b->hari == 'Wed'): ?>
       <td>
         Rabu , <?= $b->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($b->hari == 'Thu'): ?>
       <td>
         Kamis , <?= $b->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($b->hari == 'Fri'): ?>
       <td>
         Jum'at , <?= $b->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($b->hari == 'Sat'): ?>
       <td>
         Sabtu , <?= $b->tgl ?>
       </td>
     <?php endif; ?>
     <?php if ($b->hari == 'Sun'): ?>
       <td>
         Minggu , <?= $b->tgl ?>
       </td>
     <?php endif; ?>
   <?php endforeach; ?>
 </p>
 <?php foreach ($rekap_pelapor as $rp): ?>
   <table>
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
   <table class="table table-sm table-bordered text-center" border="1" align="center">
     <thead align="center">
       <tr style="background-color : #4D2E07; color: white;">
         <th colspan="2">Menu</th>
         <th colspan="2">Terjual</th>
         <th colspan="2">Bonus</th>
         <th colspan="2">Sisa</th>
         <th colspan="2">Harga</th>
         <th colspan="2">Omzet</th>
       </tr>
     </thead>
     <?php foreach ($rekap as $r): ?>
       <?php if ($r->id_laporan == $rp->id_laporan): ?>
       <tbody align="center">
         <tr>
           <td colspan="2" align="center"><?= $r->nama_menu ?></td>
           <td colspan="2" align="center"><?= $r->terjual ?></td>
           <td colspan="2" align="center"><?= $r->bonus ?></td>
           <td colspan="2" align="center"><?= $r->sisa_cup ?> Cup, <?= $r->sisa_plastik ?> Plastik</td>
           <td colspan="2" align="center">Rp. <?= number_format($r->harga_menu) ?></td>
           <td colspan="2" align="center">Rp. <?= number_format($r->omset_menu) ?></td>
         </tr>
       </tbody>
       <?php endif; ?>
     <?php endforeach; ?>
     <tbody align="center">
       <tr class="" style="background: red; color: white;">
         <td colspan="2" align="center">Total</td>
         <td colspan="2" align="center"><?= $rp->terjual ?></td>
         <td colspan="2" align="center"><?= $rp->bonus ?></td>
         <td colspan="2" align="center"><?= $rp->sisa_cup ?> Cup , <?= $rp->sisa_plastik ?> Plastik</td>
         <td colspan="2" align="center"></td>
         <td colspan="2" align="center">Rp. <?= number_format($rp->omset_menu) ?></td>
       </tr>
       <tr>
         <td colspan="4"  align="center"> <b>* Note  </b></td>
         <td colspan="8"  align="center"><?= $rp->notepad ?></td>
       </tr>
     </tbody>
   </table>
   <br>

   <br>
 <?php endforeach; ?>
