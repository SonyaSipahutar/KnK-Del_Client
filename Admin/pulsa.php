<?php
session_start();
$url="http://localhost:8031/pulsa";
$content=file_get_contents($url);
$myjson=json_decode($content);

if(!isset($_SESSION['logged_in'])){
  header('location:../login.php');
}else{
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
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
      
                          <a class="btn btn-primary" aria-current="page" href="tambah_produkpulsa.php" style="color:white">Tambah Produk</a><br><br>
                          <table class="table">
                            <thead>
                            <tr>
                              <th scope="col">ID Produk</th>
                              <th scope="col">Harga Produk</th>
                              <th scope="col">Option</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                          <?php foreach ($myjson as $json => $obj): ?>
                              <tr>
                                  <td><?php echo $obj->id; ?></td>
                                  <td><?php echo $obj->harga_pulsa; ?></td>
                                  <td>
                                    <a href="editpulsa.php?id=<?php echo $obj->id; ?>" class="btn btn-success">Edit</a>             
                                    <a href="hapuspulsa.php?id=<?php echo $obj->id; ?>" class="btn btn-danger">Hapus</a></td>             
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