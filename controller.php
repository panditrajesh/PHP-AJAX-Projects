<?php

require 'connection.php';

if ($_POST['mode'] == 'add') {
    //not working
    // if (empty(trim($_POST["firstname"]) || trim($_POST["lastname"]) || trim($_POST["mobile"]) || trim($_POST["email"]))) {
    //     echo json_encode(['status' => 0, 'message' => 'All Fields are mandetory']);
    //     exit;
    // }
    //if the form fields are not empty. it will execute the query

    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $email = $_POST['email'] ?? '';
    $sql = "INSERT INTO `contact_details` (`firstname`, `lastname`, `mobile`, `email`) VALUES ('$firstname', '$lastname', '$mobile', '$email')";
    $query = mysqli_query($conn, $sql);
    echo json_encode(['status' => 1, 'message' => 'Contact Saved Successfully']);
    exit;
} else if ($_POST['mode'] == 'view') {
    $id = $_POST['id'] ?? '';
    $sql = "SELECT * FROM `contact_details` WHERE `id` = '$id'";
    $query = mysqli_query($conn, $sql);
    echo json_encode(['status' => 1, 'message' => '', 'data' => $query->fetch_array(MYSQLI_ASSOC)]);
    exit;
} else if ($_POST['mode'] == 'delete') {
    $id = $_POST['id'] ?? '';
    $sql = "DELETE FROM `contact_details` WHERE `id` = '$id'";
    $query = mysqli_query($conn, $sql);
    echo json_encode(["status" => 1, "message" => "Data Deleted Successfully"]);
    exit;
} else if ($_POST['mode'] == 'edit') {
    $id = $_POST['id'] ?? '';
    $sql = "SELECT * FROM `contact_details` WHERE `id` = '$id'";
    $query = mysqli_query($conn, $sql);
    echo json_encode(['status' => 1, 'message' => '', 'data' => $query->fetch_array(MYSQLI_ASSOC)]);
    exit;
} else if ($_POST['mode'] == 'update') {
    $id = $_POST['id'] ?? '';
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $email = $_POST['email'] ?? '';
    $sql = "UPDATE `contact_details` SET `firstname`='$firstname',`lastname`='$lastname',`mobile`='$mobile',`email`='$email' WHERE `id` = '$id'";
    $query = mysqli_query($conn, $sql);
    exit;
}