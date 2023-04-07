<?php
require_once('../models/db_con.php');

if(isset($_POST['id'])){
    $id =  $_POST['id'];
    $user_result = mysqli_query($db, "SELECT * FROM users WHERE id = '$id'");
    $result = mysqli_fetch_array($user_result);
    //$result = mysqli_fetch_array($data);
    // foreach ($user_result as $row){
    //     $data = $row;
    // }
    echo json_encode($result);

} /*else {
        return false;
    }*