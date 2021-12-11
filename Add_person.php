<?php
require("./connection.php");
// collecting form data and adding to the database
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $age = $_POST['age'];
    $Gender = $_POST['gender'];
    $education = $_POST['education'];
    $contact = $_POST['contact'];
    // query
    $sql = "INSERT INTO Refugee(name, country, gender, education, age, contact)
    VALUES('$name', '$country', '$Gender', '$education', '$age', '$contact')";
    $query = mysqli_query($db, $sql);

    // checking for conection and redirecting the user
    if ($query)
        header('Location: ./admin.php?status=success');
    else
        header('Location: ./admin.php?status=fail');
} else
    die("Access denied");
