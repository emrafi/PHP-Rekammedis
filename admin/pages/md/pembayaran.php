<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<link rel="stylesheet" href="../css/scroll.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";

 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pembayaran
      <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Tagihan</li>
    </ol>
  </section>


<section class="box-body scroll">
<!-- title row -->
<div class="row">
<div class="col-xs-12">
  <h2 class="page-header box-header with-border">
    <i class="fa fa-credit-card"></i><b>Informasi Data Tagihan Pembayaran</b>
  </h2>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">
        <a name="cetak" href="../backend/backend_cetakPembayaran.php" target="_blank" class="btn btn-default">
          <i class="fa fa-print"></i>
          Cetak
        </a>
      </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="inner">
      <table class="table table-bordered table-striped">
        <tr>
          <th><span class="fa fa-th-list"></span> No</th>
          <th><span class="fa fa-user"></span> Nama</th>
          <th><span class="fa fa-calendar"></span> Tanggal Pemeriksaan</th>
          <th><span class="fa fa-usd"></span> Biaya Pemeriksaan</th>
          <th><span class="fa fa-usd"></span> Biaya Obat</th>
          <th><span class="fa fa-usd"></span> Total</th>
          <th><span class="fa fa-check-square-o"></span> Status Bayar</th>
          <th><span class="fa fa-cogs"></span> Opsi</th>
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
             <td>
               <form class="" action="" method="post">
                 <input type="hidden" name="id_transaksi" value="<?php echo $row->id_transaksi; ?>">
                 <input type="hidden" name="id_pasien" value="<?php echo $row->id_pasien; ?>">
                 <button type="submit" name="bayar" class="btn btn-default btn-flat btn-sm" data-toggle="tooltip" data-placement="bottom" title="Bayar">
                   <i class="fa fa-money"></i>
                 </button>
                 <a name="cetak" data-toggle="tooltip" data-placement="top" title="Cetak Struk" href="../backend/backend_cetakStruk.php?id=<?php echo $row->no_rm; ?>" target="_blank" class="btn btn-primary btn-flat btn-sm">
                   <i class="fa fa-file-o"></i>
                 </a>
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
<!-- /.box-body -->
  </div>
</div>
<!-- /.col -->
</div>
</section>
</div>
<script src="../js/sweetalert.min.js"> </script>
<script src="../js/jquery-2.1.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script type="text/javascript">
    $('button').tooltip();
    $('a').tooltip();
</script>
<?php
include "../backend/backend_bayar.php";
 ?>
