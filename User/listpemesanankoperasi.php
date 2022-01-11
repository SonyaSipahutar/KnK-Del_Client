<?php
session_start();
$url="http://localhost:8094/pemesananProdukKoperasi";
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
}include "header.php";
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
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Harga Produk</th>
                                <th scope="col">Jumlah Produk</th>
                                <th scope="col">Jenis Pembayaran</th>
                                <th scope="col">Status Pembayaran <?=$id_user?></th>
                                <th colspan="3" align=center >Opsi</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                            <?php for($i=0; $i < count($myjson); $i++) {
                              if($myjson[$i]->user_id == $id_user and $myjson[$i]->status_pembayaran == "Tidak Lunas") {
                                echo "<tr><td align=center>".$myjson[$i]->tanggal_pemesanan."</td>";
                                echo "<td align=center>".$myjson[$i]->harga."</td>";
                                echo "<td align=center>".$myjson[$i]->jumlah_barang."</td>";
                                echo "<td align=center>".$myjson[$i]->jenis_pembayaran."</td>";
                                echo "<td align=center>".$myjson[$i]->status_pembayaran."</td>";
                                if($myjson[$i]->user_id == $id_user and $myjson[$i]->jenis_pembayaran == "Non-Tunai"){
                                  echo '<td align=center> <a href="bayarpesanankoperasi.php?id='.$myjson[$i]->id.'"class="btn btn-success">Bayar</a> &nbsp &nbsp ';
                                  echo '<a href="batalpesanankoperasi.php?id='.$myjson[$i]->id.'"class="btn btn-danger">Batal</a>';
                                }else{
                                  echo "<td align=center> Lakukan Pembayaran di kasir </td></tr>";
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
                            <!-- <th scope="col">ID Matkul</th> -->
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Jumlah Produk</th>
                            <th scope="col" align>Jenis Pembayaran</th>
                            <th scope="col">Status Pembayaran <?=$id_user?></th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        <?php for($i=0; $i < count($myjson); $i++) {
                          if($myjson[$i]->user_id == $id_user and $myjson[$i]->status_pembayaran == "Lunas") {
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
        <?php include "footer.php"?>