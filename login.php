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
          <img src="../img/del.png" alt="" width="40%" height="10%" />
        </a>
      </div>
    </nav> -->
    <!-- Akhir NavBar -->

    <!-- Form login -->
    <div class="loginform">
      <div class="card loginpage">
        <a href="index.html"><center>
          <img src="img/del.png" width="100px" height="100px" alt="..." /></center>
        </a>
        <div class="card-body">
          <form action="proses_login.php" class="form-container" method="POST">
              <div class="mb-4">
                <label class="judulLogin" for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
              </div>
              
              <div class="mb-4">
                <label class="judulLogin" for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              
              <center><button class="submit" type="submit" class="btn btn-primary"><b>Masuk</b></button></center>
              <br><br>
            <center><i>Belum memiliki akun?</i><a href="daftar.php" >Daftar</a></center>
            </form>
        </div>
      </div>
    </div>

    <!-- Akhir form login -->
  </body>
</html>
