<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
      <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" title="no title">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
      <style media="screen">
        .logo{
          display: flex;
          flex-direction: column;
          justify-content: center;
          position: absolute;
          background: transparent;
          width: 75%;
          height: 100vh;
          color: white;
          text-shadow: 0 0 3px green;
        }
        .logo img{
          margin: 2em auto;
          width: 150px;
        }
        .logo h1{
          margin: 0.3em auto;
          font-size: 28pt;
        }
        .logo h2{
          color: rgb(205, 200, 255) ;
          margin: 0.3em auto;
          font-size: 12pt;
        }
        .cont{
          background: transparent !important;
        }
        .login{
          background: linear-gradient(to bottom, #4CAF50 0%, rgb(31, 33, 53) 100%) !important;
        }
        body{
          background-image: url('../images/gradient-abstract-hd-wallpaper-2560x1600-4249.jpg') !important;
          background-size: cover;
        }
      </style>
      <script src="../js/sweetalert.min.js" charset="utf-8"></script>
</head>
<body>

  <div class="logo">
    <img src="../images/logo-puskesmas.png" alt="" />
    <h1>REKAM MEDIS ONLINE</h1>
    <h1>PUSKESMAS MAKRAYU PALEMBANG</h1>
    <h2>Copyright &copy; 2017 All Rights Reserved.</h2>
    <?php include '../backend/backend_login.php'; ?>
  </div>
  <div class="cont">
  <div class="demo">
    <div class="login">
      <div class="login__check"></div>
      <form class="" action="" method="post">
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input name="username" type="text" class="login__input name" placeholder="Username" required="true" id="username">
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input name="password" type="password" class="login__input pass" placeholder="Password" required="true" id="password">
        </div>
        <button type="submit" class="login__submit" name="login" id="login">Sign in</button>
        <!-- <p class="login__signup">Forgot Password? &nbsp;<a>Reset</a></p> -->
      </div>
    </form>
    </div>
  </div>
</div>

<script src="../js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
$(function(){
  $(":input:first").focus();
});
</script>
</body>
</html>
