<?php

require_once('../models/db_con.php');


if (isset($_POST['id'])) {

    $id = $_POST['id'];

    //mysqli_query($db, "DELETE FROM users WHERE id = '$id'");
    $result = mysqli_query($db, "DELETE FROM users WHERE id = '$id'");

    if ($result) {
        echo json_encode(array("statusCode"=>200));
        // return true;
    } 
    else {
        return false;
        // echo json_encode(array("statusCode"=>201));
    }
}