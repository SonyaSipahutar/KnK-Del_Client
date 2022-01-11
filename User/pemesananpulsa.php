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

$produkpulsa = $_GET["id"];
$tanggal = date("l, M Y");

for($i=0; $i < count($myjson); $i++) {
  if($myjson[$i]->id == $produkpulsa) {
    $produkpulsa_id = $myjson[$i]->id;
    $harga_pulsa = $myjson[$i]->harga_pulsa;
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
                        <h4 class="card-title">Pulsa</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                          <form method="post" enctype="multipart/form-data" action="pemesananpulsa_proses.php">
                              <div class="form-group">
                                <label>Pulsa (<?php echo $produkpulsa_id?>) </label>
                                  <input type="hidden" name="user_id" class="form-control" value="<?= $id_user?>"  required >
                                  <input type="hidden" name="tanggal_pemesanan" class="form-control" value="<?= $tanggal?>"  required >
                                  <input type="hidden" name="produkpulsa_id" class="form-control" value="<?= $produkpulsa_id?>"  required >
                              </div>
                              <!-- <div class="form-group">
                                <label>Harga Pulsa : <b><?=$harga_pulsa?></b></label>
                              </div>
                                   <div class="form-group">
                                <label>Jenis Produk : <b><?=$jenis_produk?></b></label>
                              </div> -->
                              <div class="form-group">
                                      <label>Harga Produk : <b><?=$harga_pulsa?></b></label>
                                      <input type="hidden" name="harga" class="form-control" value="<?=$harga_pulsa?>"  required >
                              </div>
                              <div class="form-group">
                                <label>Jenis Pembayaran</label><br>
                                <select name="jenis_pembayaran" class="form-control">
                                  <option value="Tunai">Tunai</option>
                                  <option value='Non-Tunai'>Non-Tunai</option>
                                </select>
                              </div>
                              <br>
                              <br>
                              <!-- <div class="form-group">
                                <label>Jumlah Produk</label>
                                <input type="number" name="jumlah_barang" class="form-control" required>
                              </div> -->
                          
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