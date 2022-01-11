<?php
session_start();
$url="http://localhost:8031/pulsa";
$content=file_get_contents($url);
$myjson=json_decode($content);

if(!isset($_SESSION['logged_in'])){
  header('location:../login.php');
}else{
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
}
include "header.php";
?>

        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Pulsa</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                            <form method="post" enctype="multipart/form-data" action="tambah_proses.php">
                              <div class="form-group">
                                <!-- <label>ID Pulsa</label> -->
                                <input type="hidden" name="id" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Harga Pulsa</label>
                                <input type="text" name="harga_pulsa" class="form-control" required>
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
        <?php include "footer.php"?>