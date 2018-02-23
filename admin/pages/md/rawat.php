<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" title="no title">
<link rel="stylesheet" href="../css/scroll.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";
 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Rawat
      <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Rawatan</li>
    </ol>
  </section>


<section class="box-body">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header box-header with-border" style="margin-top:10px;">
          <i class="fa fa-user-md "></i> <b>Data Rawatan</b>
        </h2>
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">
              <button class="btn btn-primary" id="tombolRawatan">
                Tambah Rawatan
              </button>
              <button class="btn btn-primary" id="tombolList">
                List Rawat
              </button>
              <button class="btn btn-primary" id="tombolSelesai">
                List Selesai
              </button>
            </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body scroll" id="list">
            <div class="inner">
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
            $query = mysqli_query($koneksi,"select * from tb_pendaftaran where keterangan='Menunggu...' order by nama asc ");
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
                   <input type="hidden" name="id" value="<?php echo $row->id_rawat; ?>">
                   <button type="button" data-toggle="tooltip"data-placement="bottom" title="Ubah Layanan" class="btn btn-warning btn-flat btn-sm" onclick="editLayanan(<?php echo $row->id_rawat; ?>)">
                     <i class="glyphicon glyphicon-edit"></i>
                   </button>
                   <button type="submit" class="btn btn-danger btn-flat btn-sm" name="batalRawat" data-toggle="tooltip" data-placement="bottom" title="Batal">
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
  <!-- /.box-body -->
  <!-- modal -->
  <div class="modal fade" id="editLayanan" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">Ubah Layanan</h4>
        </div>
        <form class="" action="" method="post">
          <input type="hidden" name="id_rawat" id="id_rawat" value="">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Layanan</label>
            <select class="form-control" name="jenis_poli" id="layanan">
              <?php
              $tampil=mysqli_query($koneksi,"select * from tb_jenis_poli");
              while($row=mysqli_fetch_array($tampil)){
                echo "<option value=$row[nama_jenis] >$row[nama_jenis]</option>";
              }
              echo "<option value='belum dipilih' selected>- pilih spesialis -</option>";
               ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" name="ubahLayanan">Simpan</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- akhir modal -->
  <!-- /.box-header -->
  <div class="box-body scroll" id="selesai" style="display:none">
    <div class="inner">
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
    $query = mysqli_query($koneksi,"select * from tb_pendaftaran where keterangan='Selesai' order by nama asc ");
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
           <input type="hidden" name="id" value="<?php echo $row->id_rawat; ?>">
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
<!-- /.box-body -->
      <div class="box-body" id="rawatan" style="display:none">
        <form class="" action="" method="post">
          <h4><b>TAMBAH DATA RAWAT</b></h4>
          <label>Cari Pasien
            <input type="text" class="form-control" name="keyword" id="keyword" required="required">
          </label>
          <button type="button" class="btn btn-success" name="cari_pasien" id="btn-search">Cari</button>
          <button type="reset" class="btn btn-warning">Hapus</button>
        </form>
      </div>
    </div>
  </div>
  <!-- /.col -->
  <!-- tampil data -->
  <div class="box-body" id="view">
  </div>

  <div class="box-body" id="pendaftaran" style="display:none">
    <form class="" action="" method="post">
      <?php
      $angka=range(0,9);
      shuffle($angka);
      $ambilangka=array_rand($angka,4);
      $angkastring=implode($ambilangka);
      $no_cm=$angkastring;
       ?>
      <input type="hidden" name="no_cm" value="<?php echo $no_cm ?>">
      <input type="hidden" name="id_pasien" id="id_pasieno" value="">
      <input type="hidden" name="nama" id="nama" value="">
      <h4><b>Pendaftaran</b></h4>
      <div class="form-group row">
        <div class="col-sm-4">
          <label>Pilih Pelayanan</label>
          <select class="form-control" name="poli">
            <?php
            $tampil=mysqli_query($koneksi,"select * from tb_jenis_poli");
            while($row=mysqli_fetch_array($tampil)){
              echo "<option value=$row[nama_jenis] >$row[nama_jenis]</option>";
            }
            echo "<option value='belum dipilih' selected>- pilih pelayanan -</option>";
            ?>
          </select>
      </div>
    </div>
      <button type="submit" class="btn btn-success" name="daftar">Proses</button>
      <button type="button" class="btn btn-warning" name="batal" onclick="ilango();">Batal</button>
    </form>
  </div>
  <!-- akhir tampil data -->
</div>
</section>
</div>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/jquery-2.1.3.min.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/bootstrap.js"></script>
<script type="text/javascript">
    $('button').tooltip();
</script>
<script type="text/javascript">
function editLayanan(id){
  $.ajax({
    type: "GET",
    url : "../backend/backend_editLayanan.php",
    data: "id="+id,
    success: function (data){
     var $response = $(data);
       $('#id_rawat').val($response.filter('#id_rawat').text());
       $('#layanan').val($response.filter('#layanan').text());
       $('#editLayanan').modal('show');
    }
  });
}
</script>
<script type="text/javascript">
function munculo(tuliso) {
  $("#pendaftaran").slideDown();
  $("#id_pasieno").val(tuliso);
}

function munculo2(tuliso) {
  $("#nama").val(tuliso);
}

function ilango(){
  $("#pendaftaran").slideUp();
}
$(document).ready(function(){
  $("#tombolList").click(function(){
      $("#rawatan").hide();
      $("#list").show();
      $("#view").hide();
      $("#pendaftaran").hide();
      $("#selesai").hide();
  });
  $("#tombolRawatan").click(function(){
      $("#rawatan").show();
      $("#list").hide();
      $("#view").show();
      $("#selesai").hide();
  });
  $("#tombolSelesai").click(function(){
      $("#rawatan").hide();
      $("#list").hide();
      $("#view").hide();
      $("#selesai").show();
  });
});
</script>
<?php
include "../backend/backend_tambahRawat.php";
include "../backend/backend_batalRawat.php";
include "../backend/backend_prosesEditLayanan.php";
?>
