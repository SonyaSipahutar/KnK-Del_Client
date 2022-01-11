<?php 
session_start();


if(!isset($_SESSION['logged_in'])){
  header('location:../login.php');
}else{
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
}

$id = 100;
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
                        <h4 class="card-title">Tambah Produk Kantin</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                            <form method="post" enctype="multipart/form-data" action="tambah_prosesprodukkantin.php">
								<input type="hidden" name="id" class="form-control" value=<?=$id?> required>
								<div class="form-group">
									<label>Nama Produk</label>
									<input type="text" name="nama_produk" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Jenis Produk</label>
									<select name="jenis_produk" class="form-control">
										<option value="Makanan">Makanan</option>
										<option value='Minuman'>Minuman</option>
									</select>
								</div>
								<div class="form-group">
									<label>Harga Produk</label>
									<input type="number" name="harga" class="form-control" required>
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
     <?php include "footer.php";?>