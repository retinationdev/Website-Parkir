<?php 

require_once("dbConfig.php");
require_once("crud.php");

if(isset($_POST['login'])){

    $licenseNo = filter_input(INPUT_POST, 'licenseNo', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE licenseNo=:licenseNo OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":licenseNo" => $licenseNo,
        ":email" => $licenseNo
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            if ($r['role_id']==2) {
        session_start();
        $_SESSION['email']=$_POST['email'];
        header("Location:../views/home.php");       // redirect to user page
        }else{
        session_start();
        $_SESSION['email']=$_POST['email'];
        //header("Location:../admin/home.php");
        header("Location:../admin/adminHome.php");
        }
        }
    }
}
?>