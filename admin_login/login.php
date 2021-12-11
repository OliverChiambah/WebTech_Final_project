<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CharityLife Foundation</title>
</head>

<body>
  <div class="container">
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <h1>Login</h1>
          <form method="POST">
            <?php
            include("../connection.php");

            if (isset($_POST['Login'])) {
              //Collecting the input that was posted
              $user_name = $_POST["Email"];
              $password = $_POST["Password"];

              if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
                //read from database

                $query = "SELECT * FROM admin where email = '$user_name' limit 1 ";
                $result = mysqli_query($db, $query);

                if ($result) {
                  if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
                    if ($user_data['password'] === $password) {
                      $_SESSION['id'] = $user_data['id'];
                      header("Location: ../admin.php");
                      die;
                    }
                  }
                }
                echo '<h6 style = "color:red;">' . "Invalid email or password provided" . "</h6>";
              }
            }
            ?>
            <div class="input-boxes">
              <div class="txt_field">
                <input type="text" name="Email" id="username" required>
                <span></span>
                <label for="username">Email</label>
              </div>
              <div class="txt_field">
                <input type="password" name="Password" id="Password" required>
                <span></span>
                <label for="Password">Password</label>
              </div>
              <input type="submit" name="Login" value="Login">
              <div class="sign_up">
                <div class="login_text"> Not an admin? <label for="flip"> <a href="../Index.php"> Return to the main page</label></a> </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>