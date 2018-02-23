<?php
include "koneksi.php";
include "backend_autentifikasi.php";
$id = $_GET['id'];
$_SESSION['username'] = $username;
function rupiahkan($value)
{
  $nilai = "Rp ".number_format($value,2,',','.');
  return $nilai;
}

?>
<html>
  <head>
    <title>Data Obat Puskesmas Makrayu</title>
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
<h4 align="center"><b>Data Persediaan Obat</b></h4>
<div>
<table border="1" align="center" style="width:80%;">
  <thead>
    <tr>
      <th><span class="fa fa-th-list"></span> No</th>
      <th><span class="fa fa-bars"></span> Nama Obat</th>
      <th><span class="fa fa-bars"></span> Jenis</th>
      <th><span class="fa fa-bars"></span> Kategori</th>
      <th><span class="fa fa-usd"></span> Harga</th>
      <th><span class="fa fa-cubes"></span> Stok</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $n=1;
    $query = mysqli_query($koneksi,"select * from tb_obat order by nama_obat asc ");
    while ($row=mysqli_fetch_object($query))
    {
      ?>
      <tr>
        <td> <?php echo $n ?> </td>
        <td><?php echo "$row->nama_obat"?></td>
        <td><?php echo "$row->kategori_obat"?></td>
        <td><?php echo "$row->jenis_obat"?></td>
        <td id="harga_obat_tampil"><?php echo rupiahkan($row->harga_obat)?></td>
        <td><?php echo "$row->stok_obat"?></td>
      </tr>
      <?php
      $n= $n+1;
    }
    ?>
  </tbody>
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
