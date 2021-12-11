<?php
include("../connection.php");

if (isset($_POST['deletedata'])) {
    // ambil id dari query string
    $id = $_POST['delete_id'];

    // query delete
    $sql = "DELETE FROM Product
     WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // apa query berhasil didelete?
    if ($query) {
        header('Location: ./products.php?delete=success');
    } else
        die('Location: ./products.php?delete=fail');
} else
    die("Access Denied!");
