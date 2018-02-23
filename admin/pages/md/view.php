<div>
<table class="table table-bordered table-striped">
  <tr>
    <th><span class="fa fa-th-list"></span> No</th>
    <th><span class="fa fa-user"></span> Nama Pasien</th>
    <th><span class="fa fa-calendar"></span> Tanggal Lahir</th>
    <th><span class="fa fa-venus-mars"></span> Jenis Kelamin</th>
    <th><span class="fa fa-briefcase"></span> Pekerjaan</th>
    <th><span class="fa fa-map-marker"></span> Alamat</th>
    <th><span class="fa fa-cogs"></span> Opsi</th>
  </tr>

  <?php
  $koneksi = mysqli_connect('localhost','root','root','db_rm');
  if (isset($keyword)) {
    $parameter = '%'.$keyword.'%';
    $n=1;
    $query = mysqli_query($koneksi,"select id_pasien,nama,tgl_lahir,jk,pekerjaan,alamat from tb_pasien where nama like '$parameter'");
    while ($row=mysqli_fetch_object($query))
    {
      ?>

      <tr>
        <td> <?php echo $n ?> </td>
        <td><?php echo "$row->nama"?></td>
        <td><?php echo "$row->tgl_lahir"?></td>
        <td><?php echo "$row->jk"?></td>
        <td><?php echo "$row->pekerjaan"?></td>
        <td><?php echo "$row->alamat"?></td>
        <td>
          <form class="" action="" method="">
          <button name="seleksi" id="daftar" class="btn btn-success btn-flat btn-sm" type="button" title="Daftar" onclick="munculo('<?php echo $row->id_pasien; ?>');
          mencari('<?php echo "$row->nama"?>'); munculo2 ('<?php echo $row->nama; ?>')" >
          <i class="glyphicon glyphicon-plus"></i>
          </button>
        </form>
      </td>
    </tr>
    <?php
    $n= $n+1;
  }
} ?>
</table>
</div>
<script src="../../../js/jquery-2.1.3.min.js"></script>
<script src="../../../js/bootstrap.js"></script>
<script type="text/javascript">
    $('button').tooltip();
</script>
