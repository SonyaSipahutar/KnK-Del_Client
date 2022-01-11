<?php
session_start();
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $url = "https://localhost:8243/pesankursi/1/pemesanantempatduduk/".$id;
    include "../token.php";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
        $headers = array(
            "Accept: application/json",
            "Authorization:  Bearer curl -X GET ". $tokenpesantempatduduk
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
        $resp = curl_exec($curl);
        curl_close($curl);
        $myjson=json_decode($resp,true);
}


if (!isset($_SESSION['logged_in'])) {
    header('location:../login.php');
} else {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
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
                        <h4 class="card-title">Form Edit Pesanan Tempat Duduk</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                            <form method="post" enctype="multipart/form-data" action="edit_proseslisttempatduduk.php">
                                <input type="hidden" name="id" class="form-control" value=<?= $id ?> required>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" value=<?= $myjson["lokasi"] ?>>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="number" name="status" class="form-control" value=<?= $myjson["status"] ?>>
                                </div>
                                            
                              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
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