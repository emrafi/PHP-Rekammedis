<?php
include "koneksi.php";
$id = $_GET['id'];
?>
<html>
  <head>
  <style type="text/css">
    .head
    {
    margin-left:18em;
    margin-top:4em;
    margin-right:18em;
    padding-left:18pt;
    padding-top:15pt;
    background:orange;
    height:5em;
    border-radius:25px 25px 0px 0px;
    }
    #body
    {
    padding-left:18pt;
    padding-top:18pt;
    margin-left:18em;
    margin-right:18em;
    padding-left:18pt;
    background:skyblue;
    height:15em;
    border-radius:0px 0px 25px 25px;
    }
</style>
</head>
  <body>
    <div class="head">
  <table border="0" align="center">
    <tr>
      <td>
        <img style='padding-right:2em'src='../images/logo-puskesmas.png'width='60'height='60'/>
      </td>
      <td style="line-height : 0px">
        <h3 align="center">PEMERINTAH KOTA PALEMBANG</h4>
        <h4 align="center">DINAS KESEHATAN</h5>
        <h4 align="center"> <small>PUKESMAS MAKRAYU</small> </h5>
      </td>
    </tr>
  </table>
</div>
<div id="body">
<?php
$sql = "SELECT * FROM tb_pasien where id_pasien = $id";
$run=mysqli_query($koneksi,$sql);
$hasil = mysqli_fetch_assoc($run);
?>
<div class="">
<table border="0" padding-left="65px" style="line-height : 35px" width="370px">
  <tr>
    <td>Nama</td>
    <td>: <?php echo $hasil['nama']; ?></td>
  </tr>
  <tr>
    <td>Tanggal Lahir</td>
    <td>: <?php echo $hasil['tgl_lahir']; ?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>: <?php echo $hasil['jk']; ?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>: <?php echo $hasil['alamat']; ?></td>
  </tr>
  </table>
  <h4 align="center"><b>--Kartu harus dibawa ketika berobat--</b></h4>
  </div>
</body>
<script type="text/javascript">
window.print();
</script>
</div>
</html>
