<?php
include('config.php');

if($_POST['submit']){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pin = $_POST['pin'];
    if(($name != NULL) && ($email != NULL) && ($pin != NULL)){
        $sql = "SELECT * FROM user WHERE email = ?";
        $stm = $dbcon->prepare($sql);
        $stm->execute([$email]);
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

        if(count($rows) < 1){
            echo "Data Is Insertble";
            InsetData($name, $email, $pin);
        }else{
        header("location: index.php?msg=Sorry! Recorde Already Exist.&msgtype=danger");
        // echo "Sorry! recorde Is already exist";
        }


    }else{
        header("location: index.php?msg=fill out all this fields&msgtype=warinig");
    }
}else{
    header("location: /");
}




function InsetData($name, $email, $pin){
    include('config.php');

    $sql = "INSERT INTO user (name, email, pin) VALUE (?, ?, ?)";
    $stm = $dbcon->prepare($sql);
    $mysql = $stm->execute([$name, $email, $pin]);
    if ($mysql) {
        header("location: index.php?msg=Data Insert Successful!&msgtype=success");
    } else {
        header("location: index.php?msg=Unable To Submit Your Data.&msgtype=warning");

        // echo "Somthing wrong!";
    }
    
}

?>