<?php
session_start();

$email=$_POST["email"];
$password=$_POST["password"];
$url="https://localhost:8243/user/1/users";

include "token.php";
$emailAdmin = "admin@admin.com";
$passwordAdmin = "admin";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
    "Accept: application/json",
    "Authorization:  Bearer curl -X GET ". $tokenuser
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$myjson=json_decode($resp);

if(isset($_POST['email']) && isset($_POST['password'])) {
    for($i=0; $i < count($myjson); $i++) {
        if($myjson[$i]->email == $email) {
            if($myjson[$i]->password == $password) {
                $success = TRUE;
                $_SESSION['id'] = $myjson[$i]->id;
                $_SESSION['nama_lengkap'] = $myjson[$i]->nama_lengkap;
                $_SESSION['email'] = $myjson[$i]->email;
                $_SESSION['password'] = $myjson[$i]->password;
                $_SESSION['no_ktp'] = $myjson[$i]->no_ktp;
                $_SESSION['no_hp'] = $myjson[$i]->no_hp;
                $_SESSION['saldo'] = $myjson[$i]->saldo;
                $_SESSION['logged_in'] = TRUE;
                header('location:User/produkkantin.php');
                break;
            }else{
                $success = FALSE;
                header('location:login.php');
            }
        }elseif($emailAdmin == $email && $passwordAdmin==$password){
            $success = TRUE;
            $_SESSION['email'] = $emailAdmin;
            $_SESSION['password'] = $passwordAdmin;
            $_SESSION['logged_in'] = TRUE;
            header('location:Admin/produkkantin.php');
            break;
        }
        else {
            $success = FALSE;
            header('location:login.php');
        }
    }
}else {
    echo "Harap isi semua kolom yang tersedia";
}

// if($success == TRUE){
//     header('Location: User/produkkantin.php');
// }elseif($success == FALSE){
//     header('Location: login.php');
// }else{
//     header('Location: login.php');
// }

    // if(!empty($myjson->value)){
    //     foreach ($myjson as $data){
    //         if(($data->email == $email) and ($data->password == $password)){
    //             // $_SESSION["id"]=$data->id;
    //             // $_SESSION["email"]=$data->email;
    //             // $_SESSION["nama"]=$data->nama;
    //             // $_SESSION["password"]=$data->password;
    //             // $_SESSION["no_ktp"]=$data->no_ktp;
    //             // $_SESSION["no_hp"]=$data->no_hp;
    //             $_SESSION["logged_in"]=true;
    //             header('Location: User/produkkantin.php');  
    //         }
    //     }
    // }else{
    //     header('Location: login.php');
    // }
    


// $emailAsli = $myjson->value->userEmail;
// $passAsli = $myjson->value->userPassword;
// $nama=$myjson->value->userName;
// if(!empty($myjson->value)){
//     if($password==$passAsli){
//         $_SESSION["nama_lengkap"]=$nama;
//         $_SESSION["email"]=$emailAsli;
//         $_SESSION["logged_in"]=true;
//         if($emailAsli=="admin@gmail.com"){
//             header('Location: Admin/index.php');
//         }
//         else{
//             header('Location: Consumer/index.php');
//         }
        
//     }
//     else{
//         header('Location: Login.php');
//     }
// }
// else{
//     header('Location: Login.php');
// }
?>