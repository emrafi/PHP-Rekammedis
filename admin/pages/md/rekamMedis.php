<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<link rel="stylesheet" href="../css/scroll.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";
 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Riwayat Pemeriksaan Pasien
      <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Pemeriksaan Pasien</li>
    </ol>
  </section>


<section class="box-body scroll">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header box-header with-border">
          <i class="fa fa-stethoscope "></i><b>Data Pemeriksaan Pasien</b>
        </h2>
        <div class="box">
          <div class="box-header with-border">
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="inner">
            <table class="table table-bordered table-striped">
              <tr>
                <th><span class="fa fa-th-list"></span> No</th>
                <th><span class="fa fa-user"></span> Nama</th>
                <th><span class="fa fa-calendar"></span> Tanggal lahir</th>
                <th><span class="fa fa-child"></span> Umur</th>
                <th><span class="fa fa-venus-mars"></span> Jenis Kelamin</th>
                <th><span class="fa fa-heart"></span> Agama</th>
                <th><span class="fa fa-briefcase"></span> Pekerjaan</th>
                <th><span class="fa fa-graduation-cap"></span> Pendidikan</th>
                <th><span class="fa fa-map-marker"></span> Alamat</th>
                <th><span class="fa fa-cogs"></span> Opsi</th>
              </tr>

      <?php
            $n=1;
            $query = mysqli_query($koneksi,"select * from tb_pasien order by nama asc ");
            while ($row=mysqli_fetch_object($query))
            {
             ?>
      <?php
      // cari umur
      $tgl_lahir =date_format(date_create($row->tgl_lahir), 'Y');
      $sekarang = date('Y');
      $usia = $sekarang - $tgl_lahir;
        ?>
             <tr>
               <td> <?php echo $n ?> </td>
               <td><?php echo "$row->nama"?></td>
               <td><?php echo "$row->tgl_lahir"?></td>
               <td><?php echo  $usia?> Tahun</td>
               <td><?php echo "$row->jk"?></td>
               <td><?php echo "$row->agama"?></td>
               <td><?php echo "$row->pekerjaan"?></td>
               <td><?php echo "$row->pendidikan"?></td>
               <td><?php echo "$row->alamat"?></td>
               <td>
                 <button type="button" class="btn btn-default btn-flat btn-sm" onclick="tampilRekam('<?php echo $row->id_pasien; ?>')" title="Detail" data-toggle="tooltip" data-placement="right">
                   <i class="fa fa-info-circle"></i>
                 </button>
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

    <div class="modal fade" id="rekam" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Data Pemeriksaan Pasien</h4>
          </div>
          <div class="modal-body">
            <div class="table-responsive" id="isi">
              <!-- ini ajax -->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>
  </section>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/jquery-2.1.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script type="text/javascript">
    $('button').tooltip();
    function tampilRekam(id) {
      $.ajax({
        url : "pages/md/isiRekamMedis.php?id_pasien="+id,
        success: function (data) {
          var $respon = $(data);
          $('#isi').html($respon.html());
          $('#rekam').modal('show');
        }
      });
    }
</script>
<?php
include "../backend/backend_cetakRekmed.php";
 ?>
