<?php
session_start();
$url="http://localhost:8031/pemesananPulsa";
$content=file_get_contents($url);
$myjson=json_decode($content);

if(!isset($_SESSION['logged_in'])){
  header('location:../login.php');
}else{$email = $_SESSION['email'];
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
                                <th scope="col">Jenis Pembayaran</th>
                                <th scope="col">Status Pembayaran </th>
                                <th colspan="3" align=center >Opsi</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                            <?php for($i=0; $i < count($myjson); $i++) {
                              if( $myjson[$i]->status_pembayaran == "Tidak Lunas") {
                                echo "<tr><td align=center>".$myjson[$i]->tanggal_pemesanan."</td>";
                                echo "<td align=center>".$myjson[$i]->harga."</td>";
                                echo "<td align=center>".$myjson[$i]->jenis_pembayaran."</td>";
                                echo "<td align=center>".$myjson[$i]->status_pembayaran."</td>";
                                if($myjson[$i]->jenis_pembayaran == "Non-Tunai"){
                                  echo '<td align=center> <a href="bayarpesananpulsa.php?id='.$myjson[$i]->id.'"class="btn btn-success">Lunas</a> &nbsp &nbsp ';
                                  //echo '<a href="batalpesananpulsa.php?id='.$myjson[$i]->id.'"class="btn btn-danger">Batal</a>';
                                }else{
                                  echo "<td align=center> Menunggu Pembayaran </td></tr>";
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
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col" align>Jenis Pembayaran</th>
                            <th scope="col">Status Pembayaran</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        <?php for($i=0; $i < count($myjson); $i++) {
                          if($myjson[$i]->status_pembayaran == "Lunas") {
                            echo "<tr><td align=center>".$myjson[$i]->tanggal_pemesanan."</td>";
                            echo "<td align=center>".$myjson[$i]->harga."</td>";
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
