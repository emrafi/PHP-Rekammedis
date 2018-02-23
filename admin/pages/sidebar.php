<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="dist/img/profile2-512.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $username ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <?php $hak=$_SESSION['posisi'];?>

    <li>
      <a href="?m=beranda">
        <i class="fa fa-dashboard"></i> <span>Beranda</span>
      </a>
    </li>

    <?php if ($hak=='admin'){?>
      <li>
        <a href="?m=dataObat">
          <i class="fa fa-medkit"></i> <span>Data Obat</span>
        </a>
      </li>

      <li>
        <a href="?m=dataDokter">
          <i class="fa fa-user-md"></i> <span>Data Dokter</span>
        </a>
      </li>

      <li>
        <a href="?m=dataKaryawan">
          <i class="fa fa-user"></i> <span>Data Karyawan</span>
        </a>
      </li>

      <li>
        <a href="?m=akun">
          <i class="fa fa-users"></i> <span>Akun</span>
        </a>
      </li>

  <?php }else if ($hak=='karyawan') { ?>
    <li>
      <a href="?m=dataObat">
        <i class="fa fa-medkit"></i> <span>Data Obat</span>
      </a>
    </li>

    <li>
      <a href="?m=dataPasien">
        <i class="fa fa-user-plus"></i> <span>Data Pasien</span>
      </a>
    </li>

    <li>
      <a href="?m=rawat">
        <i class="fa fa-ambulance"></i> <span>Rawat</span>
      </a>
    </li>

    <li>
      <a href="?m=pembayaran">
        <i class="fa fa-money"></i> <span>Pembayaran</span>
      </a>
    </li>

    <li>
      <a href="?m=pengambilanObat">
        <i class="fa fa-handshake-o"></i> <span>Pengambilan Obat</span>
      </a>
    </li>

<?php }else if ($hak=='dokter') { ?>
  <li>
    <a href="?m=rekamMedis">
      <i class="fa fa-th-list"></i> <span>Rekam Medis</span>
    </a>
  </li>

  <li>
    <a href="?m=prosesRekam">
      <i class="fa fa-list"></i> <span>Data Rawatan</span>
    </a>
  </li>
<?php }else{ ?>
  <li>
    <a href="?m=dataObat">
      <i class="fa fa-medkit"></i> <span>Data Obat</span>
    </a>
  </li>

  <li>
    <a href="?m=pembayaran">
      <i class="fa fa-usd"></i> <span>Data Transaksi</span>
    </a>
  </li>
<?php } ?>
</section>
