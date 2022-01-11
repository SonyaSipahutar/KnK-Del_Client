
<?php 
session_start();

if(!isset($_SESSION['logged_in'])){
    header('location:../login.php');
  }else{
    $id_user = $_SESSION['id'];
    $nama_lengkap = $_SESSION['nama_lengkap'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $no_ktp = $_SESSION['no_ktp'];
    $no_hp = $_SESSION['no_hp'];
    $saldo = $_SESSION['saldo'];
  }

?>
<?php include "header.php";?>
<div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Tambah Paket</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <table class="table">
                          <form method="post" action="proses_tambah_paket.php" enctype="multipart/form-data">
                            <div class="mb-12">
                                <input type="hidden" name="id">
                                <label for="nama_Lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_Lengkap" class="form-control" id="nama_Lengkap">
                            </div>
                            <div class="mb-12">
                                <label for="alamat_tujuan" class="form-label">Alamat Tujuan</label>
                                <input type="text" name="alamat_tujuan" class="form-control" id="alamat_tujuan" >
                            </div>
                            <div class="mb-12">
                                <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
                                <input type="text" name="alamat_pengirim" class="form-control" id="alamat_pengirim">
                            </div>
                            <div class="mb-12">
                                <label for="nomor_hp_penerima" class="form-label">Nomor Telepon Penerima</label>
                                <input type="text" name="nomor_hp_penerima" class="form-control" id="nomor_hp_penerima">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_paket" class="form-label">Deskripsi Paket</label>
                                <input type="text" name="deskripsi_paket" class="form-control" id="deskripsi_paket">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="harga_pengiriman" id="harga_pengiriman">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="status_pembayaran" value=0 id="status_pengiriman">
                                <input type="hidden" name="user_id" value="<?= $id_user?>" >
                            </div>
                            <div style="margin-top:10px">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
