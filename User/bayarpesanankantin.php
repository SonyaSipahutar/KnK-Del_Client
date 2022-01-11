<?php
session_start();
if (isset($_GET["id"])) {
  $idPesanan=$_GET["id"];
  $url="https://localhost:8243/pemesanan/1/pemesanankantin/".$idPesanan;
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
	$myjson=json_decode($resp,true);
}
$idPesanan=$_GET["id"];

$total_pembayaran = $myjson["jumlah_barang"] * $myjson["harga"];

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
                        <h4 class="card-title">Bayar Pesanan</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                            <form method="post" enctype="multipart/form-data" action="bayarpesanankantin_proses.php">
                            <div class="form-group">
                              <!-- hidden untuk tabel users -->
                              <input type="text" value="<?=$id_user?>" class="form-control" name="id_user">
                              <input type="text" value="<?=$nama_lengkap?>" class="form-control" name="nama_lengkap">
                              <input type="text" value="<?=$email?>" class="form-control" name="email">
                              <input type="text" value="<?=$password?>" class="form-control" name="password">
                              <input type="text" value="<?=$no_ktp?>" class="form-control" name="no_ktp">
                              <input type="text" value="<?=$no_hp?>" class="form-control" name="no_hp">
                              <input type="text" value="<?=$saldo?>" class="form-control" name="saldo">
                              <!-- hidden untuk tabel pemesanan -->
                              <input type="text" value="<?=$myjson["id"]?>" class="form-control" name="id">
                              <input type="text" value="<?=$myjson["produkkantin_id"]?>" class="form-control" name="produkkantin_id">
                              <input type="text" value="<?=$id_user?>" class="form-control" name="user_id">
                            </div>
                              <div class="form-group">
                                <label>Tangal Pemesanan: </label>
                                <b><label><?=$myjson["tanggal_pemesanan"]?></label></b>
                                <input type="hidden" value="<?= $myjson["tanggal_pemesanan"] ?>" class="form-control" name="tanggal_pemesanan">
                              <div class="form-group">
                                <label>Harga Produk: </label>
                                <b><label><?=$myjson["harga"]?></label></b>
                                <input type="hidden" value="<?= $myjson["harga"] ?>" class="form-control" name="harga">
                              </div>
                              </div>
                              <div class="form-group">
                                <label>Jumlah Barang: </label>
                                <b><label><?=$myjson["jumlah_barang"]?></label></b>
                                <input type="hidden" value="<?= $myjson["jumlah_barang"] ?>" class="form-control" name="jumlah_barang">
                              </div>
                              <div class="form-group">
                                <label>Jenis Pembayaran: </label>
                                <b><label><?=$myjson["jenis_pembayaran"]?></label></b>
                                <input type="hidden" value="<?= $myjson["jenis_pembayaran"] ?>" class="form-control" name="jenis_pembayaran">
                              </div>
                              <div class="form-group">
                                <label>Status Pembayaran: </label>
                                <b><label><?=$myjson["status_pembayaran"]?></label></b>
                                <input type="hidden" value="Lunas" class="form-control" name="status_pembayaran">
                              </div>
                              <div class="form-group">
                                <label>Total Pembayaran: </label>
                                <b><label><?=$total_pembayaran?></label></b>
                                <input type="hidden" value="<?= $total_pembayaran ?>" class="form-control" name="total_pembayaran">
                              </div>
                            
                            <button type="submit" class="btn btn-success">Bayar</button>
                          </form>
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