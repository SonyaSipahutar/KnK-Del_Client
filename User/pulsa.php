<?php
session_start();
$url="http://localhost:8031/pulsa";
$content=file_get_contents($url);
$myjson=json_decode($content);

if(!isset($_SESSION['logged_in'])){
  header('location:../login.php');
}else{
  $id_user = $_SESSION['id'];
  $nama_lengkap = $_SESSION['nama_lengkap'];
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
  $no_ktp = $_SESSION['no_ktp'];
  $no_hp = $_SESSION['no_hp'];
  $saldo = $_SESSION['saldo'];
}
include "header.php";
?>
        
        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Pulsa</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <hr><br>
      
                         
                          <table class="table">
                            <thead>
                            <tr>
                              <th scope="col">ID Produk</th>
                              <th scope="col">Harga Produk</th>
                              <th scope="col">Option</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                          <?php foreach ($myjson as $obj): ?>
                              <tr>
                                  <td><?php echo $obj->id; ?></td>
                                  <td><?php echo $obj->harga_pulsa; ?>
                                  <td><a href="pemesananpulsa.php?id=<?php echo $obj->id; ?>" class="btn btn-success">Pesan</a></td>
                                </tr>
                            <?php endforeach; ?>
                          </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include "footer.php"?>