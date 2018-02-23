<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<link rel="stylesheet" href="../css/scroll.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";
 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengambilan Obat
      <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Pengambilan Obat</li>
    </ol>
  </section>


<section class="box-body scroll">
<!-- title row -->
<div class="row">
<div class="col-xs-12">
  <h2 class="page-header box-header with-border">
    <i class="fa fa-medkit"></i><b>Informasi Data Pengambilan Obat</b>
  </h2>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">
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
          <th><span class="fa fa-medkit"></span> Kode Resep</th>
          <th><span class="fa fa-check-square-o"></span> Status Bayar</th>
          <th><span class="fa fa-check-square-o"></span> Status Pengambilan</th>
          <th><span class="fa fa-cogs"></span> Opsi</th>
        </tr>
    <?php
      $n=1;
      $query = mysqli_query($koneksi,"SELECT tb_pasien.nama,tb_pasien.id_pasien,tb_transaksi.tgl_transaksi,tb_transaksi.id_transaksi,tb_transaksi.status_bayar,tb_resep_obat.kode_resep,tb_resep_obat.status,tb_resep_obat.no_rm from tb_transaksi left join tb_pasien on tb_transaksi.id_pasien=tb_pasien.id_pasien left join tb_resep_obat on tb_transaksi.no_rm=tb_resep_obat.no_rm group by tb_transaksi.no_rm");
      while ($row=mysqli_fetch_object($query))
      {
        if ($row->status_bayar=='Lunas') {
            $status_bayar='<span class="label label-default">'.$row->status_bayar.'</span>';
          }
          else {
            $status_bayar='<span class="label label-warning">'.$row->status_bayar.'</span>';
        }

        if ($row->status=='Diambil') {
          $status='<span class="label label-success">'.$row->status.'</span>';
        }else if ($row->status=='Belum Diambil') {
            $status='<span class="label label-danger">'.$row->status.'</span>';
        } else {
          $status='<span class="label label-warning">'.$row->status.'</span>';
        }
  ?>
           <tr>
             <td><?php echo $n ?> </td>
             <td><?php echo "$row->nama"?></td>
             <td><?php echo "$row->tgl_transaksi"?></td>
             <td><?php echo "$row->kode_resep"?></td>
             <td><?php echo "$status_bayar"?></td>
             <td><?php echo "$status"?>
             <td>
               <form class="" action="" method="post">
                 <input type="hidden" name="id_transaksi" value="<?php echo $row->id_transaksi; ?>">
                 <input type="hidden" name="id_pasien" value="<?php echo $row->id_pasien; ?>">
                 <button type="submit" name="ambil" class="btn btn-default btn-flat btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ambil Obat">
                   <i class="fa fa-handshake-o"></i>
                 </button>
                 <button type="button" class="btn btn-warning btn-flat btn-sm" data-toggle="tooltip" data-placement="top" title="Info Resep" onclick="tampilResep('<?php echo $row->no_rm; ?>')">
                 <i class="fa fa-medkit"></i>
                 </button>
                 <!-- <button type="submit" class="btn btn-danger btn-flat btn-sm" name="hapus">
                   <i class="glyphicon glyphicon-remove"></i>
                 </button> -->
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
<div class="modal fade" id="resep" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Data Obat Pasien</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive" id="isi">
          <!-- ini ajax -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <!-- <form class="" action="" method="post">
          <button type="submit"class="btn btn-default"><span class="glyphicon glyphicon-print" name="cetak_rekam" target="blank_"></span> Cetak</button>
        </form> -->
      </div>
    </div>
  </div>
</div>
</div>
</section>
</div>
<script src="../js/sweetalert.min.js"> </script>
<script src="../js/jquery-2.1.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script type="text/javascript">
    $('button').tooltip();
    function tampilResep(id) {
      $.ajax({
        url : "pages/md/isiResep.php?no_rm="+id,
        success: function (data) {
          var $respon = $(data);
          $('#isi').html($respon.html());
          $('#resep').modal('show');
        }
      });
    }
</script>
<?php
include "../backend/backend_ambilObat.php";
 ?>
