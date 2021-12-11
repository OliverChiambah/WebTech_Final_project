<?php
include("./connection.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $country = $_POST['edit_country'];
    $gender = $_POST['edit_gender'];
    $education = $_POST['edit_education'];
    $age = $_POST['edit_age'];
    $contact = $_POST['edit_contact'];


    // query
    $sql = "UPDATE refugee SET name='$name', country='$country', gender='$gender', education='$education', age='$age', contact='$contact' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./admin.php?update=success');
    else
        header('Location: ./admin.php?update=fail');
} else
    die("Access Denied!");
