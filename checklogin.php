<?php
session_start();
require("connection.php");
function check_login($db)
{

    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $query = "SELECT * from admin where id = '$id' limit 1";

        $result = mysqli_query($db, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    // redirect to login
    header("location: ./Index.php");
    die;
}
