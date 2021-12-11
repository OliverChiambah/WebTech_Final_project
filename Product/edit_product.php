<?php
include("../connection.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id = $_POST['edit_id'];
    $Pname = $_POST['edit_Pname'];
    $origin = $_POST['edit_origin'];
    $date = $_POST['edit_date'];
    $quantity = $_POST['edit_quantity'];


    // query
    $sql = "UPDATE Product SET Pname='$Pname', origin='$origin', date='$date', quantity='$quantity' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./products.php?update=success');
    else
        header('Location: ./products.php?update=fail');
} else
    die("Access Denied!");
