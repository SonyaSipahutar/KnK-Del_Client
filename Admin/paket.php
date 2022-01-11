<?php 
    session_start();
    $url = "https://localhost:8243/pengiriman/1/pengiriman/ambilSemua";

    include "../token.php";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Accept: application/json",
        "Authorization:  Bearer curl -X GET ". $tokenpaket
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    $myjson=json_decode($resp);
  
    if(!isset($_SESSION['logged_in'])){
        header('location:../login.php');
    }else{
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
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
                        <h4 class="card-title">Data Paket</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <hr><br>
    
                          <table class="table">
                          <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Tujuan</th>
                            <th>Alamat Pengirim</th>
                            <th>Nomor Telepon Penerima</th>
                            <th>Deskripsi Paket</th>
                            <th>Harga Pengiriman</th>
                            <th>Status Pengiriman</th>  
                            <th>Aksi</th>    
                            </tr>
                          </thead>
                            
                          <tbody>
                          <?php foreach ($myjson as $obj):
              
                                if($obj->status_pengiriman!=2){?>
                                    <tr>
                                    <td><?php echo $obj->id;?></td>
                                    <td><?php echo $obj->nama_Lengkap;?></td>
                                    <td><?php echo $obj->alamat_tujuan;?></td>
                                    <td><?php echo $obj->alamat_pengirim;?></td>
                                    <td><?php echo $obj->nomor_hp_penerima;?></td>
                                    <td><?php echo $obj->deskripsi_paket;?></td>
                                    <td><?php echo $obj->harga_pengiriman;?></td>
                                    <td><?php if($obj->status_pengiriman==0){
                                            echo "Paket Belum Diserahkan";
                                        }else if($obj->status_pengiriman==1){
                                            echo "Dikirim";
                                        }else{
                                            echo "Diterima";
                                        }
                                    
                                        ?>
                                    </td>
                                    <td><?php if($obj->status_pengiriman==0){
                                            echo '<a href="pengiriman_proses.php?id='.$obj->id.'"class="btn btn-success">Dikirim</a>';
                                        }else if($obj->status_pengiriman==1){
                                            echo '<a href="sampai_proses.php?id='.$obj->id.'"class="btn btn-info">Diterima</a>';
                                        }else{
                                            echo '<center>-</center>';
                                        }
                                    
                                        ?>
                                    </td>
                                </tr>
                            <?php }
                            endforeach?>
                          </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Data Paket Diterima</h4>
                      </div>
                      <div class="card-body">
                        <div class="table table">
                          <hr><br>
    
                          <table class="table">
                          <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Tujuan</th>
                            <th>Alamat Pengirim</th>
                            <th>Nomor Telepon Penerima</th>
                            <th>Deskripsi Paket</th>
                            <th>Harga Pengiriman</th>   
                            </tr>
                          </thead>
                            
                          <tbody>
                          <?php foreach ($myjson as $obj):
                                if($obj->status_pengiriman==2){?>
                                    <tr>
                                    <td><?php echo $obj->id;?></td>
                                    <td><?php echo $obj->nama_Lengkap;?></td>
                                    <td><?php echo $obj->alamat_tujuan;?></td>
                                    <td><?php echo $obj->alamat_pengirim;?></td>
                                    <td><?php echo $obj->nomor_hp_penerima;?></td>
                                    <td><?php echo $obj->deskripsi_paket;?></td>
                                    <td><?php echo $obj->harga_pengiriman;?></td>
                                    
                                </tr>
                            <?php }
                            endforeach?>
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

        

<?php include "footer.php";?>
