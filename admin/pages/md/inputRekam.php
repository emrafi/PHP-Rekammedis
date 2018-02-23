<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";
 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Proses Rekam Medis
      <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="?m=prosesRekam">Data Rawatan</a></li>
      <li class="active">Proses Rekam Medis</li>
    </ol>
  </section>


<section class="invoice">
<!-- title row -->
<?php
$id_pasien = $_GET['id'];
$sql1 = "SELECT no_rm FROM tb_rekam_medis where id_pasien='$id_pasien' and tgl_rekam = current_date()";
$cariNo = mysqli_query($koneksi,$sql1);
while ($row=mysqli_fetch_object($cariNo)) {
  $no_rm = $row->no_rm;
}
 ?>
 <?php
 $query="SELECT no_cm from tb_pendaftaran where id_pasien = '$id_pasien'";
 $cek=mysqli_query($koneksi,$query);
 while ($baris=mysqli_fetch_object($cek)) {
   $no_cm = $baris->no_cm;
 }
   ?>
<div class="row">
<div class="col-xs-12">
<h2 class="page-header">
  <i class="fa "></i> Daftar Riwayat Perawatan dan Pemeriksaan Pasien
</h2>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">

      <button class="btn btn-primary" id="tombol_periksa">
        Periksa (Anamnesis)
      </button>
      <button class="btn btn-primary" id="tombol_diagnosa">
        Diagnosa
      </button>
      <button class="btn btn-primary" id="tombol_tindakan">
        Tindakan
      </button>
      <button class="btn btn-primary" id="tombol_resep">
        Resep Obat
      </button>
      <button class="btn btn-primary" id="tombol_riwayat">
        Riwayat
      </button>
      <form class="" action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id_pasien ?>">
        <input type="hidden" name="no_rm" value="<?php echo $no_rm ?>">
        <input type="hidden" name="no_cm" value="<?php echo $no_cm?>">
        <button class="btn btn-primary" name="selesai" type="submit">
          Selesai
        </button>
      </form>
    </h3>
  </div>
<div class="box-header with-border">
 <h4 style="margin-top:0px;"><b>Informasi data rawat no. CM <?php echo ": $no_cm"?>  </b><small></small></h4>

<?php
$sql= "SELECT * from tb_pasien where id_pasien = '$id_pasien'";
$hasil = mysqli_query($koneksi,$sql);
while ($row=mysqli_fetch_object($hasil)) {
?>
  <div class="row">
    <div class="col-md-6">
      <table style="font-size:16px">
        <tr>
          <td>
            Nama
          </td>
          <td style="padding:8px">
            <?php echo ": $row->nama"?>
          </td>
        </tr>
        <tr>
          <td>
            Jenis Kelamin
          </td>
          <td style="padding:8px">
            <?php echo ": $row->jk"?>
          </td>
        </tr>
        <tr>
          <td>
            Tanggal Lahir
          </td>
          <td style="padding:8px">
            <?php echo ": $row->tgl_lahir"?>
          </td>
        </tr>
        </table>
    </div>

    <div class="col-md-6">
      <table style="font-size:16px">
          <tr>
            <td>
              Agama
            </td>
            <td style="padding:8px">
              <?php echo ": $row->agama"?>
            </td>
          </tr>
          <tr>
            <td>
              Pekerjaan
            </td>
            <td style="padding:8px">
              <?php echo ": $row->pekerjaan"?>
            </td>
          </tr>
          <tr>
            <td>
              Alamat
            </td>
            <td style="padding:8px">
              <?php echo ": $row->alamat"?>
            </td>
          </tr>
        </table>
    </div>
  </div>
<?php } ?>
</div>

  <!-- /.box-header -->
  <div class="box-body" id="riwayat">
    <table class="table table-bordered table-striped">
      <tr>
        <th><span class="fa fa-calendar"></span> Tanggal Rawat</th>
        <th><span class="fa fa-clock-o"></span> Pukul</th>
        <th><span class="fa fa-stethoscope"></span> Periksa</th>
        <th><span class="fa fa-heartbeat"></span> Diagnosa</th>
        <th><span class="fa fa-user-md"></span> Tindakan</th>
        <th><span class="fa fa-usd"></span> Biaya</th>
      </tr>

      <?php
      $query = mysqli_query($koneksi,"SELECT tgl_rekam,jam,periksa,diagnosa,tindakan,biaya from tb_rekam_medis where id_pasien ='$id_pasien' and tgl_rekam=current_date()");
      while ($data=mysqli_fetch_object($query))
      {
       ?>
       <tr>
         <td><?php echo "$data->tgl_rekam"?></td>
         <td><?php echo "$data->jam"?></td>
         <td><?php echo "$data->periksa"?></td>
         <td><?php echo "$data->diagnosa"?></td>
         <td><?php echo "$data->tindakan"?></td>
         <td><?php echo "Rp ".number_format($data->biaya,2,',','.');?></td>
       </tr>
      <?php } ?>
    </table>
    </div>

    <div class="box-body" id="rm" style="display:none">
      <table class="table table-bordered table-striped">
        <tr>
          <th><span class="fa fa-calendar"></span> Tanggal Rawat</th>
          <th><span class="fa fa-clock-o"></span> Pukul</th>
          <th><span class="fa fa-stethoscope"></span> Periksa</th>
          <th><span class="fa fa-heartbeat"></span> Diagnosa</th>
          <th><span class="fa fa-user-md"></span> Tindakan</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi,"SELECT tgl_rekam,jam,periksa,diagnosa,tindakan from tb_rekam_medis where id_pasien ='$id_pasien'");
        while ($data=mysqli_fetch_object($query))
        {
         ?>
         <tr>
           <td><?php echo "$data->tgl_rekam"?></td>
           <td><?php echo "$data->jam"?></td>
           <td><?php echo "$data->periksa"?></td>
           <td><?php echo "$data->diagnosa"?></td>
           <td><?php echo "$data->tindakan"?></td>
         </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>

<!-- form periksa -->
<div class="form-group" id="periksa" style="display:none">
<form class="" action="" method="post">
  <table>
    <tr>
      <td>
        <h5><b>Uraian Periksa &emsp;&emsp;:</b></h5>
      </td>
      <td>
        <textarea name="periksa" rows="6" cols="30" class="form-control" autofocus="autofocus"></textarea>
      </td>
    </tr>
    <tr>
      <td><br></td>
    </tr>
    <tr>
      <td>
        <h5><b>Tambahan Biaya &emsp;:</b></h5>
      </td>
      <td>
        <div class="input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" name="biaya_periksa" value="" class="form-control" onkeyup="formatangka(this);">
      </div>
      </td>
    </tr>
    <tr>
      <td><br></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="hidden" name="id_pasien" value="<?php echo $id_pasien ?>">
        <button type="submit" class="btn btn-success" name="submit_periksa">Submit</button>
        <button type="reset" class="btn btn-warning">Hapus</button>
      </td>
      <td></td>
    </tr>
  </table>
</form>
</div>
<!-- akhir form periksa -->

<!-- form diagnosa -->
<div class="form-group" id="diagnosa" style="display:none">
<form class="" action="" method="post">
  <table>
    <tr>
      <td>
        <h5><b>Uraian Diagnosa &emsp;&emsp;:</b></h5>
      </td>
      <td>
        <textarea name="diagnosa" rows="6" cols="30" class="form-control"  autofocus="autofocus"></textarea>
      </td>
    </tr>
    <tr>
      <td><br></td>
    </tr>
    <tr>
      <td>
        <h5><b>Tambahan Biaya &emsp;&emsp;:</b></h5>
      </td>
      <td>
        <div class="input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" name="biaya_diagnosa" value="" class="form-control" onkeyup="formatangka(this);">
      </div>
      </td>
    </tr>
    <tr>
      <td><br></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="hidden" name="id_pasien" value="<?php echo $id_pasien ?>">
        <button type="submit" class="btn btn-success" name="submit_diagnosa">Submit</button>
        <button type="reset" class="btn btn-warning">Hapus</button>
      </td>
      <td></td>
    </tr>
  </table>
</form>
</div>
<!-- akhir form diagnosa -->
<!-- form tindakan -->
<div class="form-group" id="tindakan" style="display:none">
<form class="" action="" method="post">
  <table>
    <tr>
      <td>
        <h5><b>Uraian Tindakan &emsp;&emsp;:</b></h5>
      </td>
      <td>
        <textarea name="tindakan" rows="6" cols="30" class="form-control"  autofocus="autofocus"></textarea>
      </td>
    </tr>
    <tr>
      <td><br></td>
    </tr>
    <tr>
      <td>
        <h5><b>Tambahan Biaya &emsp;&emsp;:</b></h5>
      </td>
      <td>
        <div class="input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" name="biaya_tindakan" value="" class="form-control" onkeyup="formatangka(this);">
      </div>
      </td>
    </tr>
    <tr>
      <td><br></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="hidden" name="id_pasien" value="<?php echo $id_pasien ?>">
        <button type="submit" class="btn btn-success" name="submit_tindakan">Submit</button>
        <button type="reset" class="btn btn-warning">Hapus</button>
      </td>
      <td></td>
    </tr>
  </table>
</form>
</div>
<!-- akhir form tindakan -->
<!-- /.box-header -->
<div class="box-body" id="resep_obat" style="display:none">
  <button class="btn btn-default" data-toggle="modal" data-target="#tabel_obat" data-toggle="tooltip" title="Tambah Obat" data-placement="right">
    <i class="fa fa-cart-plus"></i>
  </button><br><br>
<table class="table table-bordered table-striped">
  <tr>
    <th><span class="fa fa-th-list"></span> No</th>
    <th><span class="fa fa-medkit"></span> Nama Obat</th>
    <th><span class="fa fa-usd"></span> Harga</th>
    <th><span class="fa fa-cubes"></span> Jumlah Tersedia</th>
    <th><span class="fa fa-cart-arrow-down"></span> Jumlah Ambil</th>
    <th><span class="fa fa-usd"></span> Biaya</th>
    <th><span class="fa fa-cogs"></span> Opsi</th>
  </tr>

<?php
  $n=1;
  $sql = mysqli_query($koneksi,"SELECT nama_obat,harga_obat,stok_obat,jumlah,total from tb_obat inner join tb_resep_obat on tb_resep_obat.id_obat=tb_obat.id_obat where tb_resep_obat.no_rm = '$no_rm'");
  while ($row=mysqli_fetch_object($sql))
  {
   ?>
   <tr>
     <td> <?php echo $n ?> </td>
     <td><?php echo "$row->nama_obat"?></td>
     <td><?php echo "Rp ".number_format($row->harga_obat,2,',','.');?></td>
     <td><?php echo "$row->stok_obat"?></td>
     <td><?php echo "$row->jumlah"?></td>
     <td><?php echo "Rp ".number_format($row->total,2,',','.');?></td>
     <td>
       <form class="" action="" method="post">
         <input type="hidden" name="id_pasien" value="<?php echo $id_pasien ?>">

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
  <!-- akhir body -->
  <!-- modal tabel obat -->
  <div class="modal fade" id="tabel_obat" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">Daftar obat</h4>
        </div>
        <form class="" action="" method="post">
          <input type="hidden" name="id_pasien" value="<?php echo $id_pasien ?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nama obat</label>
            <select class="form-control" name="nama_obat" id="nama_obat">
              <option value="null">- Pilih obat -</option>
              <?php
              $tampil=mysqli_query($koneksi,"select * from tb_obat");
              while($row=mysqli_fetch_array($tampil)){
                echo "<option value='$row[id_obat]'>$row[nama_obat]</option>";
              }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Jumlah</label>
            <input type="number" name="jumlah_obat" value="" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" name="tambah_resep" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- akhir modal -->
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
  $("#tombol_periksa").click(function(){
      $("#periksa").show();
      $("#diagnosa").hide();
      $("#tindakan").hide();
      $("#riwayat").show();
      $("#rm").hide();

  });
  $("#tombol_diagnosa").click(function(){
      $("#diagnosa").show();
      $("#periksa").hide();
      $("#tindakan").hide();
      $("#riwayat").show();
      $("#rm").hide();
  });
  $("#tombol_tindakan").click(function(){
      $("#tindakan").show();
      $("#periksa").hide();
      $("#diagnosa").hide();
      $("#riwayat").show();
      $("#rm").hide();
  });
  $("#tombol_resep").click(function(){
      $("#resep_obat").show();
      $("#periksa").hide();
      $("#diagnosa").hide();
      $("#tindakan").hide();
      $("#riwayat").hide();
      $("#rm").hide();
  });
  $("#tombol_riwayat").click(function(){
      $("#resep_obat").hide();
      $("#periksa").hide();
      $("#diagnosa").hide();
      $("#tindakan").hide();
      $("#riwayat").hide();
      $("#rm").show();
});
});
</script>
<script type="text/javascript">
function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}
</script>
<?php
include "../backend/backend_inputPeriksa.php";
include "../backend/backend_inputDiagnosa.php";
include "../backend/backend_inputTindakan.php";
include "../backend/backend_tambahResep.php";
include "../backend/backend_selesaiRm.php";
?>
