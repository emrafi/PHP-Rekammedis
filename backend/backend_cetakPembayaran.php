<?php
include "koneksi.php";
include "backend_autentifikasi.php";
$id = $_GET['id'];
$_SESSION['username'] = $username;
?>
<html>
  <head>
    <title>Data Transaksi Puskesmas Makrayu</title>
</head>
  <body>
    <div class="">
  <table border="0" align="center">
    <tr>
      <td>
        <img style="padding-right:2em; margin-top:-20px;"src='../images/logo-puskesmas.png'width='60'height='60'/>
      </td>
      <td style="line-height : 0px">
        <h3 align="center">PEMERINTAH KOTA PALEMBANG</h3>
        <h4 align="center">DINAS KESEHATAN</h4>
        <h4 align="center">PUKESMAS MAKRAYU</h4>
        <h5 align="center">Jl. AKBP AGUSTJIK No. 960 Kecamatan Ilir Barat II (Telp: 021567834)</h5>
      </td>
    </tr>
  </table>
</div>
<hr style="width:80%;">
<hr style="width:80%;">
<h4 align="center"><b>Data Transaksi</b></h4>
<div>
  <table border="1" align="center" style="width:80%;">
    <tr>
      <th><span class="fa fa-th-list"></span> No</th>
      <th><span class="fa fa-user"></span> Nama</th>
      <th><span class="fa fa-calendar"></span> Tanggal Pemeriksaan</th>
      <th><span class="fa fa-usd"></span> Biaya Pemeriksaan</th>
      <th><span class="fa fa-usd"></span> Biaya Obat</th>
      <th><span class="fa fa-usd"></span> Total</th>
      <th><span class="fa fa-check-square-o"></span> Status Bayar</th>
    </tr>
  <?php
      $n=1;
      $query = mysqli_query($koneksi,"SELECT tb_pasien.nama,tb_pasien.id_pasien,tb_transaksi.id_transaksi,tb_transaksi.tgl_transaksi,tb_rekam_medis.biaya,tb_resep_obat.no_rm,SUM(tb_resep_obat.total) as total2,tb_transaksi.Total,tb_transaksi.status_bayar,tb_transaksi.no_rm FROM tb_transaksi left join tb_pasien on tb_transaksi.id_pasien=tb_pasien.id_pasien left join tb_rekam_medis on tb_transaksi.no_rm=tb_rekam_medis.no_rm left join tb_resep_obat on tb_transaksi.no_rm=tb_resep_obat.no_rm group by tb_transaksi.no_rm");
      while ($row=mysqli_fetch_object($query))
      {
        if ($row->status_bayar=='Lunas') {
          $status_bayar='<span class="label label-success">'.$row->status_bayar.'</span>';
        } else {
          $status_bayar='<span class="label label-danger">'.$row->status_bayar.'</span>';
        }
  ?>
       <tr>
         <td><?php echo $n ?> </td>
         <td><?php echo "$row->nama"?></td>
         <td><?php echo "$row->tgl_transaksi"?></td>
         <td><?php echo "Rp ".number_format($row->biaya,2,',','.');?></td>
         <td><?php echo "Rp ".number_format($row->total2,2,',','.');?></td>
         <td><?php echo "Rp ".number_format($row->Total,2,',','.');?></td>
         <td><?php echo "$status_bayar"?></td>
       </tr>
       <?php
       $n= $n+1;
  }
  ?>
  </table>
<hr style="width:80%;">
<table border="0" style="width:80%;" align="center" >
  <tr>
    <td align="right">
      <?php $bulan= array("","Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
      ?>
      Makrayu, <?php echo date("j")." ".$bulan[date("n")]." ".date("Y"); ?>
    </td>
  </tr>
  <tr>
    <td style="padding-top:45px; padding-right:55px;" align="right">
      <u><?php echo $username ?></u>
    </td>
  </tr>
</table>
  </div>
</body>
</html>
<script type="text/javascript">
window.print();
</script>
