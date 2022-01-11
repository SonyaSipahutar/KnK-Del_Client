<?php
session_start();
if($_SESSION["logged_in"]==false){
    header('Location: ../login.php');
}
$url="https://localhost:8243/koperasi/1/produkKoperasi";
include "../token.php";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Accept: application/json",
    "Authorization:  Bearer curl -X GET ". $tokenprodukkoperasi
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
                        <h4 class="card-title">Produk Koperasi</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Jenis Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach ($myjson as $json => $obj): ?>
                                <tr>
                                    <td><?php echo $obj->namaProduk; ?></td>
                                    <td><?php echo $obj->jenisProduk; ?></td>
                                    <td><?php echo $obj->harga; ?></td>
                                    <td><a href="pemesanankoperasi.php?id=<?php echo $obj->id; ?>" class="btn btn-success">Pesan</a></td>                
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
        <footer></footer>
      </div>
    </div>
    <?php include "footer.php"?>
