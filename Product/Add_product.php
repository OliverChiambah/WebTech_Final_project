<?php
include("../connection.php");

// collecting form data and adding to the database
if (isset($_POST['insert'])) {
    $Pname = $_POST['Pname'];
    $date = $_POST['date'];
    $origin = $_POST['origin'];
    $quantity = $_POST['quantity'];
    // query
    $sql = "INSERT INTO Product(Pname, origin, date, quantity)
    VALUES('$Pname', '$origin', '$date', '$quantity')";
    $query = mysqli_query($db, $sql);

    // checking for conection and redirecting the user
    if ($query)
        header('Location: ./products.php?status=success');
    else
        header('Location: ./products.php?status=fail');
} else
    die("Access denied!");
