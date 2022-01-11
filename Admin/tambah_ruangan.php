<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('location:../login.php');
} else {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
}

$id = 100;
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
                        <h4 class="card-title">Tambah Ruangan</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                          <form method="post" enctype="multipart/form-data" action="tambah_prosesruangan.php">
                            <input type="hidden" name="id" class="form-control" value=<?= $id ?> required>
                            <div class="form-group">
                                <label>Nama Ruangan</label>
                                <input type="text" name="nama_ruangan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" required>
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
