<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";
$cekpoli=mysqli_query($koneksi,"SELECT jenis_poli from tb_dokter where username='".$_SESSION['username']."'");
while ($row=mysqli_fetch_object($cekpoli)) {
  $Poli=$row->jenis_poli;
}
 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Daftar Rawatan
      <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daftar Rawatan</li>
    </ol>
  </section>


<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa "></i> Informasi Data Perawatan Poliklinik (<?php echo $Poli; ?>)
      </h2>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">
            <button class="btn btn-primary" id="tombolList">
              List Rawat
            </button>
            <button class="btn btn-primary" id="tombolSelesai">
              List Selesai
            </button>
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="list">
          <table class="table table-bordered table-striped">
            <tr>
              <th><span class="fa fa-th-list"></span> No</th>
              <th><span class="fa fa-th-list"></span> No. CM</th>
              <th><span class="fa fa-user"></span> Nama Pasien</th>
              <th><span class="fa fa-calendar"></span> Tanggal</th>
              <th><span class="fa fa-clock-o"></span> Waktu</th>
              <th><span class="fa fa-refresh"></span> Proses</th>
              <th><span class="fa fa-usd"></span> Biaya</th>
              <th><span class="fa fa-check-square-o"></span> Status</th>
              <th><span class="fa fa-hourglass-half"></span> Keterangan</th>
              <th><span class="fa fa-cogs"></span> Opsi</th>
            </tr>

      <?php
      $n=1;
      $query = mysqli_query($koneksi,"select * from tb_pendaftaran where proses = '".$_SESSION['poli']."' and keterangan = 'Menunggu...'");
      while ($row=mysqli_fetch_object($query))
      {
       ?>
       <tr>
         <td><?php echo $n ?></td>
         <td><?php echo "$row->no_cm"?></td>
         <td><?php echo "$row->nama"?></td>
         <td><?php echo "$row->tanggal"?></td>
         <td><?php echo "$row->waktu"?></td>
         <td><?php echo "$row->proses"?></td>
         <td><?php echo "Rp ".number_format($row->biaya,2,',','.');?></td>
         <td><span class="label label-success"><?php echo "$row->status"?></span></td>
         <td><span class="label label-warning"><?php echo "$row->keterangan"?></span></td>
         <td>
           <form class="" action="" method="post">
             <input type="hidden" name="id_rawat" value="<?php echo $row->id_rawat; ?>">
             <input type="hidden" name="id_pasien" value="<?php echo $row->id_pasien; ?>">

             <button name="rekam" class="btn btn-default btn-flat btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="Proses">
               <i class="glyphicon glyphicon-eye-open"></i>
             </button>

             <button type="submit" class="btn btn-danger btn-flat btn-sm" name="hapus">
               <i class="glyphicon glyphicon-remove"></i>
             </button>
           </form>
        </td>
       </tr>
       <?php
       $n= $n+1;
  }
  ?>
  </table>
  </div>
  <!-- /.box-header -->
  <div class="box-body" id="selesai" style="display:none">
    <table class="table table-bordered table-striped">
      <tr>
        <th><span class="fa fa-th-list"></span> No</th>
        <th><span class="fa fa-th-list"></span> No. CM</th>
        <th><span class="fa fa-user"></span> Nama Pasien</th>
        <th><span class="fa fa-calendar"></span> Tanggal</th>
        <th><span class="fa fa-clock-o"></span> Waktu</th>
        <th><span class="fa fa-refresh"></span> Proses</th>
        <th><span class="fa fa-usd"></span> Biaya</th>
        <th><span class="fa fa-check-square-o"></span> Status</th>
        <th><span class="fa fa-hourglass-half"></span> Keterangan</th>
        <th><span class="fa fa-cogs"></span> Opsi</th>
      </tr>

<?php
$n=1;
$query = mysqli_query($koneksi,"select * from tb_pendaftaran where proses = '".$_SESSION['poli']."' and keterangan = 'selesai'");
while ($row=mysqli_fetch_object($query))
{
 ?>
 <tr>
   <td><?php echo $n ?></td>
   <td><?php echo "$row->no_cm"?></td>
   <td><?php echo "$row->nama"?></td>
   <td><?php echo "$row->tanggal"?></td>
   <td><?php echo "$row->waktu"?></td>
   <td><?php echo "$row->proses"?></td>
   <td><?php echo "Rp ".number_format($row->biaya,2,',','.');?></td>
   <td><span class="label label-success"><?php echo "$row->status"?></span></td>
   <td><span class="label label-success"><?php echo "$row->keterangan"?></span></td>
   <td>
     <form class="" action="" method="post">
       <input type="hidden" name="id_rawat" value="<?php echo $row->id_rawat; ?>">
       <input type="hidden" name="id_pasien" value="<?php echo $row->id_pasien; ?>">

       <!-- <button name="rekam" class="btn btn-default btn-flat btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="Proses">
         <i class="glyphicon glyphicon-eye-open"></i>
       </button> -->

       <button type="submit" class="btn btn-danger btn-flat btn-sm" name="hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus">
         <i class="glyphicon glyphicon-remove"></i>
       </button>
     </form>
  </td>
 </tr>
 <?php
 $n= $n+1;
}
?>
</table>
</div>
  </div>
  </div>
  </div>
  </section>
  </div>
  <script src="../js/sweetalert.min.js"></script>
  <script src="../js/jquery-2.1.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script type="text/javascript">
    $('button').tooltip();
  </script>
  <script type="text/javascript">

  $(document).ready(function(){
    $("#tombolList").click(function(){
      $("#list").show();
      $("#selesai").hide();
    });
    $("#tombolSelesai").click(function(){
      $("#selesai").show();
      $("#list").hide();
    });
  });
  </script>
  <?php include_once '../backend/backend_inputRm.php'; ?>
