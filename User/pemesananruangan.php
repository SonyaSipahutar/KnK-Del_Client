<?php
session_start();
$url = "https://localhost:8243/ruangan/1/ruangan";
include "../token.php";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Accept: application/json",
        "Authorization:  Bearer curl -X GET ". $tokenruangan
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    $myjson=json_decode($resp);
if (!isset($_SESSION['logged_in'])) {
    header('location:../login.php');
} else {
    $id_user = $_SESSION['id'];
    $nama_lengkap = $_SESSION['nama_lengkap'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $no_ktp = $_SESSION['no_ktp'];
    $no_hp = $_SESSION['no_hp'];
    $saldo = $_SESSION['saldo'];
}

$id_ruangan = $_GET["id"];
$tanggal = date("l, M Y");

for ($i = 0; $i < count($myjson); $i++) {
    if ($myjson[$i]->id == $id_ruangan) {
        $ruangan_id = $myjson[$i]->id;
        $nama_ruangan=$myjson[$i]->nama_ruangan;
        $lokasi = $myjson[$i]->lokasi;
        $status = $myjson[$i]->status;
        break;
    }
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
                        <h4 class="card-title">Form Pemesanan Ruangan</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                          <form method="post" enctype="multipart/form-data" action="pemesananruangan_proses.php">
                            <div class="form-group">
                                <label>Ruangan (<?php echo $ruangan_id ?>) </label>
                                <input type="hidden" name="user_id" class="form-control" value="<?= $id_user ?>" required>
                                <input type="hidden" name="tanggal_pemesanan" class="form-control" value="<?= $tanggal ?>" required>
                                <input type="hidden" name="ruangan_id" class="form-control" value="<?= $ruangan_id ?>" required>
                                <input type="hidden" name="nama_lengkap" class="form-control" value="<?= $nama_lengkap ?>" required>
                                <input type="hidden" name="email" class="form-control" value="<?= $email ?>" required>
                                <input type="hidden" name="no_ktp" class="form-control" value="<?= $no_ktp ?>" required>
                                <input type="hidden" name="no_hp" class="form-control" value="<?= $no_hp ?>" required>

                            </div>
                            <div class="form-group">
                                <label>Nama Ruangan : <b><?= $nama_ruangan ?></b></label>
                            </div>
                            <div class="form-group">
                                <label>Lokasi : <b><?= $lokasi ?></b></label>
                            </div>
                            <div class="form-group">
                                <label>Status : <b><?= $status ?></b></label>
                            </div>

                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                            <button type="submit" class="btn btn-primary">Booking</button>
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

    
    <?php include "footer.php"; ?>
