<?php
include "../backend/koneksi.php";
$sql=mysqli_query($koneksi,"select * from tb_obat");
$hitung=mysqli_num_rows($sql);

$sql1=mysqli_query($koneksi,"select * from tb_dokter");
$hitung1=mysqli_num_rows($sql1);

$sql2=mysqli_query($koneksi,"select * from tb_login");
$hitung2=mysqli_num_rows($sql2);

$sql3=mysqli_query($koneksi,"select * from tb_karyawan");
$hitung3=mysqli_num_rows($sql3);

$sql4=mysqli_query($koneksi,"select * from tb_pendaftaran where keterangan='Menunggu...'");
$hitung4=mysqli_num_rows($sql4);

$sql5=mysqli_query($koneksi,"select * from tb_pasien");
$hitung5=mysqli_num_rows($sql5);

$sql6=mysqli_query($koneksi,"select * from tb_transaksi where status_bayar='Belum Lunas'");
$hitung6=mysqli_num_rows($sql6);

$sql7=mysqli_query($koneksi,"select * from tb_resep_obat where status='Belum Diambil' group by no_rm");
$hitung7=mysqli_num_rows($sql7);

$sql9=mysqli_query($koneksi,"select * from tb_rekam_medis");
$hitung9=mysqli_num_rows($sql9);

$sql10=mysqli_query($koneksi,"select * from tb_pendaftaran where tanggal=CURDATE()");
$hitung10=mysqli_num_rows($sql10);

 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Beranda
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Beranda</li>
    </ol>
  </section>

<?php $hak=$_SESSION['posisi'];?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">

  <?php if ($hak=='karyawan'){ ?>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $hitung5;  ?></h3>

          <p>Jumlah Pasien</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="?m=dataPasien" class="small-box-footer">Lihat data pasien <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $hitung4; ?></h3>

          <p>Jumlah Pendaftar</p>
        </div>
        <div class="icon">
          <i class="fa fa-user-plus"></i>
        </div>
        <a href="?m=rawat" class="small-box-footer">Lihat data rawatan <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $hitung6; ?></h3>

          <p>Jumlah Tagihan</p>
        </div>
        <div class="icon">
          <i class="fa fa-money"></i>
        </div>
        <a href="?m=pembayaran" class="small-box-footer">Lihat data pembayaran <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $hitung7; ?></h3>

          <p>Pengambilan Obat</p>
        </div>
        <div class="icon">
          <i class="fa fa-medkit"></i>
        </div>
        <a href="?m=pengambilanObat" class="small-box-footer">Lihat data pengambilan obat <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

<?php }else if ($hak=='dokter'){
  $cek= "SELECT jenis_poli from tb_dokter where username = '".$_SESSION['username']."'";
  $query=mysqli_query($koneksi,$cek);
  while ($row=mysqli_fetch_object($query)) {
    $cekPoli=$row->jenis_poli;
  }
  $_SESSION['poli']=$cekPoli;

  $rawat1=mysqli_query($koneksi,"select * from tb_pendaftaran where proses = '".$_SESSION['poli']."' and keterangan='Menunggu...'");
  $hitung8=mysqli_num_rows($rawat1);
  ?>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $hitung9; ?></h3>

        <p>Jumlah Pasien</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="?m=rekamMedis" class="small-box-footer">Lihat data pasien <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $hitung8; ?></h3>

        <p>Jumlah Pendaftar</p>
      </div>
      <div class="icon">
        <i class="fa fa-user-plus"></i>
      </div>
      <a href="?m=prosesRekam" class="small-box-footer">Lihat data rawatan <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <?php }else if ($hak=='kepala') { ?>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $hitung10; ?></h3>

          <p>Jumlah Kunjungan</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fa "></i></a>
      </div>
    </div>

  <?php }else { ?>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $hitung;  ?></h3>

          <p>Jumlah Obat</p>
        </div>
        <div class="icon">
          <i class="fa fa-medkit"></i>
        </div>
        <a href="?m=dataObat" class="small-box-footer">Lihat data obat <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $hitung1; ?><sup style="font-size: 20px"></sup></h3>

          <p>Jumlah Dokter</p>
        </div>
        <div class="icon">
          <i class="fa fa-user-md"></i>
        </div>
        <a href="?m=dataDokter" class="small-box-footer">Lihat data dokter <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $hitung2 ?></h3>

          <p>Jumlah akun</p>
        </div>
        <div class="icon">
          <i class="fa fa-vcard-o"></i>
        </div>
        <a href="?m=akun" class="small-box-footer">Lihat data akun <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $hitung3 ?></h3>

          <p>Jumlah Karyawan</p>
        </div>
        <div class="icon">
        <i class="fa fa-users"></i>
        </div>
        <a href="?m=dataKaryawan" class="small-box-footer">Lihat data karyawan <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->

<?php } ?>


</div>
</section>
</div>
