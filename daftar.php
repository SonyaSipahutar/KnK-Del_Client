<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />

    <link rel="icon" type="image/png" href="img/del.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <title>Aplikasi KnKDel</title>
  </head>
  <body>
    <!-- NavBar-->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light pd-btm-0">
      <div class="container">
        <a href="login.php">
          <img src="img/del.png" alt="" width="100px" height="100px" />
        </a>
      </div>
    </nav> -->
    <!-- Akhir NavBar -->

    <!-- Form login -->
    <div class="loginform">
      <div class="loginpage">
        <a href="index.html"><center>
          <img src="img/del.png" width="100px" height="100px" alt="..." /></center>
        </a>
        <div class="card-body">
          <form action="proses_daftar.php" class="form-container" method="POST">
            <div class="mb-4">
                <label class="judulLogin" for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" aria-describedby="emailHelp" >
              </div>

              <div class="mb-4">
                <label class="judulLogin" for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
              </div>
              
              <div class="mb-4">
                <label class="judulLogin" for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" name="password">
              </div>
              
              <div class="mb-4">
                <label class="judulLogin" for="exampleInputEmail1" class="form-label">Nomor KTP</label>
                <input type="text" class="form-control" name="no_ktp" aria-describedby="emailHelp">
              </div>

              <div class="mb-4">
                <label class="judulLogin" for="exampleInputEmail1" class="form-label">Nomor Handphone</label>
                <input type="text" class="form-control" name="no_hp" aria-describedby="emailHelp">
              </div>
              <center><button class="submit" type="submit" class="btn btn-primary"><b>Daftar</b></button></center>
              <br>
              <center><i>Sudah memiliki akun?</i><a href="login.php" >Login</a></center>
            </form>
        </div>
      </div>
    </div>

    <!-- Akhir form login -->
  </body>
</html>
