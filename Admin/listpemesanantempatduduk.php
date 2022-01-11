<?php
session_start();
$url = "https://localhost:8243/pesankursi/1/pemesanantempatduduk";
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
                        <h4 class="card-title">Pemesanan Tempat Duduk</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <hr><br>
    
                          <table class="table">
                          <thead>
                          <tr>
                               <!-- <th scope="col">ID Matkul</th> -->
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Tempat Duduk</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">No Hp</th>
                            </tr>
                          </thead>
                            
                          <tbody>
                          <?php foreach ($myjson as $obj) : ?>
                                <tr>
                                    <td><?php echo $obj->tanggal_pemesanan; ?></td>
                                    <td><?php echo $obj->id; ?></td>
                                    <td><?php echo $obj->nama_lengkap; ?></td>
                                    <td><?php echo $obj->no_hp; ?></td>
                                    <td>
                                        <a href="hapuslisttempatduduk.php?id=<?php echo $obj->id; ?>" class="btn btn-danger">Hapus</a>
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

