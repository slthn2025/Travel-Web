<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location:Admin/AdminDashboard/DaftarPenumpang.php");
  exit;
}
$conn = mysqli_connect("localhost", "root", "", "travel");

if (isset($_POST['submit'])) {
  $username = $_POST['Username'];
  $password = $_POST['password'];
  $sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

  if (mysqli_num_rows($sql) === 1) {
    $row = mysqli_fetch_assoc($sql);
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;
      header('Location:Admin/AdminDashboard/DaftarPenumpang.php');
    } else {
      echo "<script>
            alert('Password atau Username yang anda Masukan Salah!!');
         </script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Login Admin</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(img/Bus.jpg);
        height: 108vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-white rounded shadow-5-strong p-5" method="post" action="">
                <h1 style="margin-bottom: 50px;">Login My Travel Admin</h1>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form1Example1" name="username">Username</label>
                  <input type="text" name="Username" id="Username" class="form-control" required>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form1Example2" nama="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->

                  </div>

                  <div class="col text-center">
                    <!-- Simple link -->
                    <a href="register.php">Register</a>
                  </div>
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/script.js"></script>
</body>

</html>