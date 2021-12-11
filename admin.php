<?php include("./connection.php");
require("checklogin.php");
$user_data = check_login($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CharityLife Foundation</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./CRUD css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important; background-color:grey;">
        <div class="container-fluid container">
            <a class="nav-link btn btn-primary ms-md-4 text-white" href="./Index.php">Logout</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" aria-current="page" href="./admin.php">Home</a>
                    </li>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="./Product/products.php">Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form Add a refugee to the database -->
        <div class="card mb-5">

            <!-- insert data -->
            <div class="card-body">
                <h3 class="text-center">Adding and deleting refugees from the database</h3>
                <p class="card-text text-center">Refugees who arrived at the camp need to provide the following information for the organization's official to enter into the databse and refugees who choose to leave the organization will have their names deleted from the database</p>

                <!-- display message Success inserted -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'success')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Success!</strong> Data has been successfully added to the database!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Failed to insert!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="Add_person.php" method="POST">

                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g Ngong Oliver" required>
                    </div>
                    <div class="col-md-4">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" class="form-control" placeholder="e.g Cameroon" required>
                    </div>

                    <div class="col-md-4">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" name="age" class="form-control" placeholder="e.g 19 years" required>
                    </div>

                    <div class="col-md-4">
                        <label for="tittle" class="form-label">gender</label>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="gender">Male</label>
                                <input class="form-check-input" type="radio" name="gender" value="Male">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="gender">Female</label>
                                <input class="form-check-input" type="radio" name="gender" value="Female">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="gender">Other</label>
                                <input class="form-check-input" type="radio" name="gender" value="Other">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="education" class="form-label">Level of education</label>
                        <input type="text" name="education" class="form-control" placeholder="e.g High School" required>
                    </div>

                    <div class="col-md-6">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" class=" form-control" placeholder="e.g 02239875304" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="insert"><i class="fa fa-plus"></i><span class="ms-2">Add Data</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">My Refugee List</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Show entry</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Find something..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!--handling delete-->
        <?php if (isset($_GET['delete'])) : ?>
            <?php
            if ($_GET['delete'] == 'success')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Success!</strong> deleted succesfully!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Failed to delete!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- Handling edit -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'success')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Success!</strong> Edited succesfully!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Could not update!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- Display table -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>Id Number</th>";
            echo "<th scope='col'>Name</th>";
            echo "<th scope='col'>Country</th>";
            echo "<th scope='col'>Gender</th>";
            echo "<th scope='col'>Education</th>";
            echo "<th scope='col'>Age</th>";
            echo "<th scope='col'>Contact</th>";
            echo "<th scope='col' class='text-center'>Option</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";


            $limit = 10;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $page_awal = ($page > 1) ? ($page * $limit) - $limit : 0;

            $previous = $page - 1;
            $next = $page + 1;

            $data = mysqli_query($db, "SELECT * FROM Refugee");
            $results = mysqli_num_rows($data);
            $total_page = ceil($results / $limit);

            $data_mhs = mysqli_query($db, "SELECT * FROM Refugee LIMIT $page_awal, $limit");
            $no = $page_awal + 1;




            while ($Refugee = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $Refugee['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $Refugee['name'] . "</td>";
                echo "<td>" . $Refugee['country'] . "</td>";
                echo "<td>" . $Refugee['gender'] . "</td>";
                echo "<td>" . $Refugee['education'] . "</td>";
                echo "<td>" . $Refugee['age'] . "</td>";
                echo "<td>" . $Refugee['contact'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol delete
                echo "
                            <!-- Button trigger  -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($results == 0) {
                echo "<p class='text-center'>No data to display</p>";
            } else {
                echo "<p>Total $results entry</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($page > 1) ? "href='?page=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_page; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($page < $total_page) ? "href='?page=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!--  Edit page-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Edit record</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM Refugee";
                    $query = mysqli_query($db, $sql);
                    $Refugee = mysqli_fetch_array($query);
                    ?>

                    <form action='edit_person.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_name" class="form-label">name</label>
                                <input type="text" name="edit_name" id="edit_name" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_country" class="form-label">country</label>
                                <input type="text" name="edit_country" id="edit_country" class="form-control" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_age" class="form-label">age</label>
                                <input class="form-select" name="edit_age" id="edit_age">

                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_gender" class="form-label">gender</label>
                                <div class="col-md-12" id="gender">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="gender">
                                            <input class="form-check-input" type="radio" name="edit_gender" value="Male" id="cowok">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="gender">
                                            <input class="form-check-input" type="radio" name="edit_gender" value="Female" id="cewek">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="gender">
                                            <input class="form-check-input" type="radio" name="edit_gender" value="other" id="cewek">Other</label>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 mb-3">
                                <label for="edit_education" class="form-label">Level of Education</label>
                                <input type="text" name="edit_education" class="form-control" id="edit_education" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_contact" class="form-label">Contact</label>
                                <input type="text" name="edit_contact" id="edit_contact" class=" form-control" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Update</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!--  Delete page-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Konfirmasi</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='delete_person.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>Are you sure you want to delete this data?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>delete</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#edit_name').val(data[2]);
                $('#edit_country').val(data[3]);
                $('#gender').val(data[4]);
                // jenis kelamin checked
                if (data[4] == "gender") {
                    $("#cowok").prop("checked", true);
                } else {
                    $("#cewek").prop("checked", true);
                }

                $('#edit_education').val(data[5]);
                $('#edit_age').val(data[6]);
                $('#edit_contact').val(data[7]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>