<?php
session_start();
if (isset($_GET["id"])) {
  $idPesanan=$_GET["id"];
  $url="http://localhost:8031/pemesananPulsa/".$idPesanan;
  $content=file_get_contents($url);
  $myjson=json_decode($content,true);
}
$idPesanan=$_GET["id"];

$total_pembayaran = $myjson["harga"];

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
?>
<?php include "header.php"; ?>
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
                          <form method="post" enctype="multipart/form-data" action="bayarpesananpulsa_proses.php">
                              <div class="form-group">
                                <!-- hidden untuk tabel users -->
                                <input type="hidden" value="<?=$id_user?>" class="form-control" name="id_user">
                                <input type="hidden" value="<?=$nama_lengkap?>" class="form-control" name="nama_lengkap">
                                <input type="hidden" value="<?=$email?>" class="form-control" name="$email">
                                <input type="hidden" value="<?=$password?>" class="form-control" name="password">
                                <input type="hidden" value="<?=$no_ktp?>" class="form-control" name="no_ktp">
                                <input type="hidden" value="<?=$no_hp?>" class="form-control" name="no_hp">
                                <input type="hidden" value="<?=$saldo?>" class="form-control" name="saldo">
                                <!-- hidden untuk tabel pemesanan -->
                                <input type="hidden" value="<?=$myjson["id"]?>" class="form-control" name="id">
                                <input type="hidden" value="<?=$myjson["produkpulsa_id"]?>" class="form-control" name="produkpulsa_id">
                                <input type="hidden" value="<?=$id_user?>" class="form-control" name="user_id">
                              </div>
                              <div class="form-group">
                                <label>Tangal Pemesanan: </label>
                                <b><label><?=$myjson["tanggal_pemesanan"]?></label></b>
                                <input type="hidden" value="<?= $myjson["tanggal_pemesanan"] ?>" class="form-control" name="tanggal_pemesanan">
                              <div class="form-group">
                                <label>Harga Pulsa: </label>
                                <b><label><?=$myjson["harga"]?></label></b>
                                <input type="hidden" value="<?= $myjson["harga"] ?>" class="form-control" name="harga">
                              </div>
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
        <footer></footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="./assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  </body>
</html>
