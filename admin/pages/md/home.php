  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<div class="pad margin no-print">
  <div class="box box-primary">
    <div class="box-header with-border">
  <h3 class="box-title">Selamat datang di sistem rekam medis puskesmas Makrayu Palembang.</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
  <!-- /.box-tools -->
  </div>
  <?php $hak=$_SESSION['posisi'];
  if ($hak=='karyawan'){ ?>
<div class="row">
  <div class="col-md-6">
    <?php
      include "../backend/koneksi.php";

      $cek_stok=mysqli_query($koneksi,"select nama_obat,stok_obat from tb_obat where stok_obat < '10'");
      ?>
    <div class="box-body">
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i> Perhatian!</h4>
        <?php
        while ($row=mysqli_fetch_object($cek_stok)) {
       ?>
        Stok obat <?php echo "$row->nama_obat"?> tersisa <?php echo "$row->stok_obat"?> <br>
      <?php } ?>
    </div>
    </div>
  </div>
</div>
<?php } ?>
  </div>
</div>
<div class="box-header with-border">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header invoice">
            <i class="fa fa-globe"></i> ITteam, Inc.
            <?php
            $tgl = date('l, d-m-Y');
             ?>
            <small class="pull-right">Date: <?php echo $tgl; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
