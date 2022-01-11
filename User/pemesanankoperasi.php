<?php
session_start();
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

$id_produkkoperasi = $_GET["id"];
$tanggal = date("l, M Y");

for($i=0; $i < count($myjson); $i++) {
  if($myjson[$i]->id == $id_produkkoperasi) {
    $produkoperasi_id = $myjson[$i]->id;
    $nama_produk = $myjson[$i]->namaProduk;
    $jenis_produk = $myjson[$i]->jenisProduk;
    $harga = $myjson[$i]->harga;
    break;
  }
}

?>
<?php include "header.php";?>
        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Form Pemesanan Produk Koperasi</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                            <form method="post" enctype="multipart/form-data" action="pemesanankoperasi_proses.php">
                              <div class="form-group">
                                <label>Produk koperasi (<?php echo $id_produkkoperasi?>) </label>
                                  <input type="hidden" name="user_id" class="form-control" value="<?= $id_user?>"  required >
                                  <input type="hidden" name="tanggal_pemesanan" class="form-control" value="<?= $tanggal?>"  required >
                                  <input type="hidden" name="produkkoperasi_id" class="form-control" value="<?= $id_produkkoperasi?>"  required >
                              </div>
                              <div class="form-group">
                                <label>Nama Produk : <b><?=$nama_produk?></b></label>
                              </div>
                                   <div class="form-group">
                                <label>Jenis Produk : <b><?=$jenis_produk?></b></label>
                              </div>
                              <div class="form-group">
                                      <label>Harga Produk : <b><?=$harga?></b></label>
                                      <input type="hidden" name="harga" class="form-control" value="<?=$harga?>"  required >
                              </div>
                              <div class="form-group">
                                <label>Jenis Pembayaran</label><br>
                                <select name="jenis_pembayaran" class="form-control">
                                  <option value="Tunai">Tunai</option>
                                  <option value='Non-Tunai'>Non-Tunai</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Jumlah Produk</label>
                                <input type="number" name="jumlah_barang" class="form-control" required>
                              </div>
                          
                              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                              <button type="submit" class="btn btn-primary">Beli</button>
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
        
        <?php include "footer.php";?>  