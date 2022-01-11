<?php
session_start();
$url="https://localhost:8243/kantin/1/produkkantin";

include "../token.php";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Accept: application/json",
    "Authorization:  Bearer curl -X GET ". $tokenprodukkantin
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resp = curl_exec($curl);
curl_close($curl);
$myjson=json_decode($resp);
if(!isset($_SESSION['logged_in'])){
  header('location:../login.php');
}else{
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
} include "header.php";
?>


        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Produk Kantin</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <hr><br>
      
                          <a class="btn btn-primary" aria-current="page" href="tambah_produkkantin.php" style="color:white">Tambah Produk</a><br><br>
                          <table class="table">
                            <thead>
                            <tr>
                              <th scope="col">ID Produk</th>
                              <th scope="col">Nama Produk</th>
                              <th scope="col">Harga Produk</th>
                              <th scope="col">Jenis Produk</th>
                              <th scope="col">Option</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                          <?php foreach ($myjson as $json => $obj): ?>
                              <tr>
                                  <td><?php echo $obj->id; ?></td>
                                  <td><?php echo $obj->nama_produk; ?></td>
                                  <td><?php echo $obj->harga; ?></td>
                                  <td><?php echo $obj->jenis_produk; ?></td>
                                  <td>
                                    <a href="editprodukkantin.php?id=<?php echo $obj->id; ?>" class="btn btn-success">Edit</a>             
                                    <a href="hapusprodukkantin.php?id=<?php echo $obj->id; ?>" class="btn btn-danger">Hapus</a></td>             
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
        <?php include "footer.php";?>