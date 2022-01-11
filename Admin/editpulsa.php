<?php 
session_start();
if (isset($_GET["id"])) {
  $id = (int) $_GET["id"];
  $url="http://localhost:8031/pulsa/".$id;
  $content=file_get_contents($url);
  $myjson=json_decode($content,true);
}


if(!isset($_SESSION['logged_in'])){
  header('location:../login.php');
}else{
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
                        <h4 class="card-title">Pulsa</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                            <form method="post" enctype="multipart/form-data" action="editpulsa_proses.php">
                                <input type="hidden" name="id" class="form-control" value=<?=$id?> required>
                              <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="number" name="harga_pulsa" class="form-control" value=<?=$myjson["harga_pulsa"]?>>
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
