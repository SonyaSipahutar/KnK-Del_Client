<?php
session_start();
$url = "https://localhost:8243/pesanruangan/1/pemesananruangan";
include "../token.php";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Accept: application/json",
    "Authorization:  Bearer curl -X GET ". $tokenpesanruangan
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
                        <h4 class="card-title">Pemesanan Ruangan</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <hr><br>
    
                          <table class="table">
                          <thead>
                          <tr>
                                <!-- <th scope="col">ID Matkul</th> -->
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">No Hp</th>

                            </tr>
                          </thead>
                            
                          <tbody>
                          <?php foreach ($myjson as $json => $obj) : ?>
                                <tr>
                                    <td><?php echo $obj->tanggal_pemesanan; ?></td>
                                    <td><?php echo $obj->ruangan_id; ?></td>
                                    <td><?php echo $obj->nama_lengkap; ?></td>
                                    <td><?php echo $obj->no_hp; ?></td>
                                    <td>
                                        <a href="hapuslistruangan.php?id=<?php echo $obj->id; ?>" class="btn btn-danger">Hapus</a>
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
