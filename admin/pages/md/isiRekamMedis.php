<?php
include"../../../backend/koneksi.php";
$nama= mysqli_query($koneksi,"SELECT nama,id_pasien from tb_pasien where id_pasien='".$_GET['id_pasien']."'");
while ($baris=mysqli_fetch_object($nama)) {
  $nama_pasien=$baris->nama;
  $id=$baris->id_pasien;
}
 ?>
 <div id="isi">
   <div id="nama_pasien">
     <h2><small><?php echo $nama_pasien ?></small></h2>
   </div>
   <div>
     <br>
   </div>
   <table class="table table-bordered">
     <tr>
       <th>No</th>
       <th>Tanggal Periksa</th>
       <th>Dokter</th>
       <th>Periksa</th>
       <th>Diagnosa</th>
       <th>Tindakan</th>
     </tr>
     <?php
     $n=1;
     $sql= mysqli_query($koneksi,"SELECT tb_rekam_medis.tgl_rekam,tb_rekam_medis.periksa,tb_rekam_medis.diagnosa,tb_rekam_medis.tindakan,tb_dokter.nama from tb_rekam_medis inner join tb_dokter on tb_rekam_medis.NIP=tb_dokter.NIP where id_pasien='".$_GET['id_pasien']."'");

     while ($row=mysqli_fetch_object($sql)) {
       ?>
       <tr>
         <td><?php echo $n ?></td>
         <td><?php echo "$row->tgl_rekam"?></td>
         <td><?php echo "$row->nama"?></td>
         <td><?php echo "$row->periksa"?></td>
         <td><?php echo "$row->diagnosa"?></td>
         <td><?php echo "$row->tindakan"?></td>
       </tr>
       <?php
       $n= $n+1;
     }
     ?>
   </table>
 </div>
