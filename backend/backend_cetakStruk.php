<?php
include "koneksi.php";
include "backend_autentifikasi.php";
$id = $_GET['id'];
$_SESSION['username'] = $username;
?>
<html>
  <head>
    <title>Kwitansi Pembayaran Puskesmas Makrayu</title>
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
<h4 align="center"><b>Kwitansi Pembayaran</b></h4>
<div>
<?php
$sql2= mysqli_query($koneksi,"Select tb_dokter.nama,tb_dokter.jenis_poli from tb_dokter inner join tb_rekam_medis on tb_dokter.NIP=tb_rekam_medis.NIP where tb_rekam_medis.no_rm='$id'");
$hasil2= mysqli_fetch_assoc($sql2);

$query = mysqli_query($koneksi,"SELECT tb_pasien.nama,tb_pasien.id_pasien,tb_transaksi.id_transaksi,tb_transaksi.tgl_transaksi,tb_rekam_medis.biaya,tb_resep_obat.no_rm,SUM(tb_resep_obat.total) as total2,tb_transaksi.Total,tb_transaksi.status_bayar,tb_transaksi.no_rm FROM tb_transaksi left join tb_pasien on tb_transaksi.id_pasien=tb_pasien.id_pasien left join tb_rekam_medis on tb_transaksi.no_rm=tb_rekam_medis.no_rm left join tb_resep_obat on tb_transaksi.no_rm=tb_resep_obat.no_rm  where tb_transaksi.no_rm='$id' group by tb_transaksi.no_rm");
$hasil3=mysqli_fetch_object($query);

$angka=range(0,9);
shuffle($angka);
$ambilangka=array_rand($angka,6);
$angkastring=implode($ambilangka);
$no_kwitansi=$angkastring;
?>
<div class="">
<table border="0" align="center" style="line-height : 35px; margin-left:170px;" width="80%">
  <tr>
    <td>No. Kwitansi</td>
    <td>: <?php echo $no_kwitansi; ?></td>
    <td>Klinik</td>
    <td>: <?php echo $hasil2['jenis_poli']; ?></td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>: <?php echo $hasil3->tgl_transaksi; ?></td>
    <td>Dokter</td>
    <td>: <?php echo $hasil2['nama']; ?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>: <?php echo $hasil3->nama; ?></td>
    <td>Status</td>
    <td>: <?php echo $hasil3->status_bayar; ?></td>
  </tr>
  </table>
  <hr style="width:80%">
  <table border="0" align="center" style="line-height : 35px" width="70%">
    <tr>
      <td>
        <b>Uraian</b>
      </td>
      <td align="right" style="padding-right:30px;">
        <b>Tarif</b>
      </td>
    </tr>
    <tr>
      <td>
        Biaya Perawatan
      </td>
      <td align="right">
        <?php echo "Rp ".number_format($hasil3->biaya,2,',','.');?>
      </td>
    </tr>
    <tr>
      <td>
        Biaya Obat
      </td>
      <td align="right">
        <?php echo "Rp ".number_format($hasil3->total2,2,',','.');?>
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td align="right">
        <b>Total &nbsp &nbsp &nbsp <?php  echo "Rp ".number_format($hasil3->Total,2,',','.');?></b>
      </td>
    </tr>
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
  <h4 align="center"><b>--Terimakasih dan semoga lekas sembuh--</b></h4>
  </div>
</body>
</div>
</html>
<script type="text/javascript">
window.print();
</script>
