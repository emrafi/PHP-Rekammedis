<?php
//membuka Session
session_start();

//memeriksa apakah user sudah Login
if(isset($_SESSION['sudah_login'])){
  //jika sudah
  ?>
  <script type="text/javascript">
    window.location='../admin/index.php';
  </script>
  <?php
}else {
  //jika belum
  //memanggil koneksi.php
  include_once'koneksi.php';

  //deklarasi variabel
  $username ="";
  $password ="";
  $posisi ="";

  //memeriksa apakah tombol login sudah di klik

  if(isset($_POST['login'])){
    //jika sudah
    // die("gahsjkxhkjabscbcsvyxvvssbhak");
    //test password di database

    $cekPassword ="";

    //mengisi variabel
    $username = $_POST['username'];
    $password = $_POST['password'];

    //ambil data dari database
    $query = "SELECT * FROM tb_login WHERE username='".$username."'";

    // mengambil data dari database berdasarkan query dengan menggunakan mysqli
    // data disimpan pada variabel hasil dengan bentuk asociative array
    $hasil = mysqli_query($koneksi, $query);

    // memeriksa apakah hasil yang diterima pada variabel hasil lebih dari 0
    if(mysqli_num_rows($hasil)>0){
      //jika iya, dilakukan perulangan untuk ambil data
      while ($data=mysqli_fetch_assoc($hasil)) {
        // mengambil nilai dari variabel data dan disimpan pada variabel yang telah dideklarisakan di awal
        // parameter associative array variabel data :
        // $data['nama_kolom']
        $id_login = $data['id_login'];
        $cekPassword = $data['password'];
        $posisi = $data['posisi'];
      }
    // membuat variabel testPassword untuk menyimpan nilai password yang telah diinputkan oleh user dalam bentuk yang telah ter-enkripsi md5
    $testPassword = md5($password);
    // menguji apakah nilai variabel testPassword sama dengan nilai variabel cekPassword
    if($cekPassword == $testPassword){
      //jika iya
      //menyimpan data kedalam Session
      $_SESSION['id_login'] = $id_login;
      $_SESSION['username'] = $username;
      $_SESSION['posisi'] = $posisi;
      $_SESSION['sudah_login'] = true;

      //pesan selamat datang dokter
    if($_SESSION['posisi']=='dokter'){
      $cek= "SELECT jenis_poli from tb_dokter where username = '".$_SESSION['username']."'";
      $query=mysqli_query($koneksi,$cek);
      while ($row=mysqli_fetch_object($query)) {
        $cekPoli=$row->jenis_poli;
      }
      $_SESSION['poli']=$cekPoli;
?>
    <script type="text/javascript">
    swal({
                    title: "",
                    text: "Selamat Datang Dokter <?php echo $username ?>!",
                    type: "success",
                    confirmWarningText: "Oke"
                },
                function () {
                    window.location='../admin/index.php';
                });
    </script>
<?php
  }else {
?>
    <script type="text/javascript">
    swal({
                    title: "",
                    text: "Selamat Datang <?php echo $username ?>!",
                    type: "success",
                    confirmWarningText: "Oke"
                },
                function () {
                    window.location='../admin/index.php';
                });
    </script>
<?php
  } //else posisi dokter
}else {
  //jika tidak sesuai
  ?>
  <script type="text/javascript">
    swal("Password salah","Silahkan periksa kembali password anda","error");
  </script>
  <?php
} // else cek password
}else {
  //jika hasil kurang dari nol, peringatan
  ?>
  <script type="text/javascript">
  swal("Username tidak ditemukan","Silahkan periksa kembali username anda","error");
  </script>
  <?php
      }
  } //isset login
} //else isset sudah login
 ?>
