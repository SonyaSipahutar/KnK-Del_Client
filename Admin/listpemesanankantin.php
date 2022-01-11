<?php
session_start();
$url="https://localhost:8243/pemesanan/1/pemesanankantin";
include "../token.php";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Accept: application/json",
    "Authorization:  Bearer curl -X GET ". $tokenpesankantin
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
}else{$email = $_SESSION['email'];
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
                        <h4 class="card-title">Belum Lunas</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                            <thead>
                              <tr>
                                <!-- <th scope="col">ID Matkul</th> -->
                                <th scope="col">ID Pemesanan</th>
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Harga Produk</th>
                                <th scope="col">Jumlah Produk</th>
                                <th scope="col">Jenis Pembayaran</th>
                                <th scope="col">Status Pembayaran</th>
                                <th colspan="3" align=center  >Opsi</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                            <?php for($i=0; $i < count($myjson); $i++) {
                              if($myjson[$i]->status_pembayaran == "Tidak Lunas") {
                                echo "<tr><td align=center>".$myjson[$i]->id."</td>";
                                echo "<td align=center>".$myjson[$i]->tanggal_pemesanan."</td>";
                                echo "<td align=center>".$myjson[$i]->harga."</td>";
                                echo "<td align=center>".$myjson[$i]->jumlah_barang."</td>";
                                echo "<td align=center>".$myjson[$i]->jenis_pembayaran."</td>";
                                echo "<td align=center>".$myjson[$i]->status_pembayaran."</td>";
                                if($myjson[$i]->jenis_pembayaran != "Non-Tunai"){
                                  echo '<td align=center> <a href="bayarpesanankantin.php?id='.$myjson[$i]->id.'"class="btn btn-success">Lunas</a>';
                                  echo '<a href="batalpesanankantin.php?id='.$myjson[$i]->id.'"class="btn btn-danger">Batal</a>';
                                }else{
                                  echo "<td align=center> Menunggu Pembayaran </td></tr>";
                                }
                              }
                            }?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="card-header">
                        <h4 class="card-title">Lunas</h4>
                      </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Jumlah Produk</th>
                            <th scope="col" align>Jenis Pembayaran</th>
                            <th scope="col">Status Pembayaran</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        <?php for($i=0; $i < count($myjson); $i++) {
                          if($myjson[$i]->status_pembayaran == "Lunas") {
                            echo "<tr><td align=center>".$myjson[$i]->tanggal_pemesanan."</td>";
                            echo "<td align=center>".$myjson[$i]->harga."</td>";
                            echo "<td align=center>".$myjson[$i]->jumlah_barang."</td>";
                            echo "<td align=center>".$myjson[$i]->jenis_pembayaran."</td>";
                            echo "<td align=center>".$myjson[$i]->status_pembayaran."</td>";
                          }
                        }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include "footer.php";?>