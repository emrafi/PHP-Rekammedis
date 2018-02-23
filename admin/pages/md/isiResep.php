<?php
include"../../../backend/koneksi.php";
$nama= mysqli_query($koneksi,"SELECT tb_pasien.nama from tb_transaksi inner join tb_pasien on tb_transaksi.id_pasien=tb_pasien.id_pasien where tb_transaksi.no_rm='".$_GET['no_rm']."'");
while ($baris=mysqli_fetch_object($nama)) {
  $nama_pasien=$baris->nama;
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
       <th>Nama Obat</th>
       <th>Jumlah</th>
     </tr>
     <?php
     $n=1;
     $sql= mysqli_query($koneksi,"SELECT tb_obat.nama_obat,tb_resep_obat.jumlah from tb_resep_obat inner join tb_obat on tb_obat.id_obat=tb_resep_obat.id_obat where tb_resep_obat.no_rm='".$_GET['no_rm']."'");

     while ($row=mysqli_fetch_object($sql)) {
       ?>
       <tr>
         <td><?php echo $n ?></td>
         <td><?php echo "$row->nama_obat"?></td>
         <td><?php echo "$row->jumlah"?></td>
       </tr>
       <?php
       $n= $n+1;
     }
     ?>
   </table>
 </div>
