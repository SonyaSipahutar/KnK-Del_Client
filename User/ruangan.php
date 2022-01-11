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
                        <h4 class="card-title">Ruangan</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <hr><br>
      
                         
                          <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID Ruangan</th>
                                    <th scope="col">Nama Ruangan</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($myjson as $json => $obj) : ?>
                                    <tr>
                                        <td><?php echo $obj->id; ?></td>
                                        <td><?php echo $obj->nama_ruangan; ?></td>
                                        <td><?php echo $obj->lokasi; ?></td>
                                        <td><?php echo $obj->status; ?></td>
                                        <td>
                                        <a href="pemesananruangan.php?id=<?php echo $obj->id; ?>" class="btn btn-success">Booking</a>
                                        </td>
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


<?php include "footer.php"; ?>

