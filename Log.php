<?php
session_start();
if (isset($_SESSION["UserName"])) {
    header("location:index.php");
    exit();
}
include('includes/connect.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $stmt = $conn->prepare("SELECT * FROM usermaster WHERE UserName=? AND
Password=? AND UserType=?");
    $stmt->bind_param(
        "sss", $_POST["UserName"], $_POST["Password"],
        $_POST["UserType"]
    );
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && mysqli_num_rows($result) > 0) {
        $User_data = mysqli_fetch_assoc($result);
        $_SESSION['UserName'] = $User_data['UserName'];
        $_SESSION['UserType'] = $User_data['UserType'];
        $_SESSION['DeptID'] = $User_data['DeptID'];
        $_SESSION['UserMasterID'] = $User_data['UserMasterID'];
        header("location:index.php");
        exit();
    } else {
        echo "<script>alert('Please enter correct login credentials.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl- col-lg-8 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block "></div>
                            <div class="col-lg-6">
                                <div class="p-7">
                                    <div class="text-center">
                                        <br>
                                        <h1 class="h4 text-gray-900 mb-2"><b>Leave Management System </b></h1>

                                        <hr>
                                    </div>


                                    <form method="POST" class="user">
                                        <div class="form-group">
                                            <input type="Text" name="UserName" class="form-control"
                                                aria-describedby="emailHelp" placeholder="Enter Name" required>
                                        </div><br>
                                        <div class="form-group">
                                            <input type="password" name="Password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password" required="">
                                        </div><br>
                                        <div class="form-group">
                                            <select name="UserType" class="form-control" id="UserType" required="">
                                                <option>-----User Type-----</option>
                                                <option>Admin</option>
                                                <option>ESTA</option>
                                                <option>Department User</option>
                                            </select>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-block" name="login">Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="log.php"></a>
                                    </div>
                                </div>
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Design & Develop By Student Of Computer Dept, G.P. Dahod </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    <link rel="stylesheet" type="text/css" href="login9.css">
        <div style="float: right;"></div>

                <div style="float: center;"></div>
                <div class="dropdown">
                    <div class="dropdown-item">
                        <div class="dropdown-menu" align="right" style="display: inline-flex;" style="float: center">

                            <body>

                                <div class="box lg-5  mr-5 ml-5" style="float: center">

                                    <img src="img/Ansh.jpg" height="270px" width="250px" style=" border-radius: 25px;">
                                    <div class="box-content">
                                        <div class="content">
                                            <ul class="social">
                                                <li><a href="mailto: meghaniansh942005@gmail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
  <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
</svg></a></li>
                                            </ul>
                                            <h3 class="title">Ansh</h3>
                                            <span class="post">Web Designer</span>
                                            <pre> <b> meghaniansh942005@gmail.com </b> </pre><br> <br> 
                                        </div>
                                    </div>

                                </div>
                                <div class="box lg-5  mr-5 ml-5" style="float: center">

                                    <img src="" height="270px" width="250px" style=" border-radius: 25px;">
                                    <div class="box-content">
                                        <div class="content">
                                            <ul class="social">
                                                <li><a href="mailto: meghaniansh942005@gmail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
  <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
</svg></a></li>
                                            </ul>
                                            <h3 class="title">ARPIT</h3>
                                            <span class="post">Web Designer</span>
                                            <pre> <b>bariyabariyaarpitk@gmail.com</b> </pre>
                                        </div>

                                    </div>

                                </div>
                                 <div class="box lg-5  mr-5 ml-5" style="float: center">

                                    <img src="img/IMG20220710114428_01.jpg" height="270px" width="250px" style=" border-radius: 25px;">
                                    <div class="box-content">
                                        <div class="content">
                                            <ul class="social">
                                                <li><a href="mailto: meghaniansh942005@gmail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
  <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
</svg></a></li>
                                            </ul>
                                            <h3 class="title">Mansi Parmar</h3>
                                            <span class="post">Web Designer</span>
                                            <pre> <b></b> </pre>
                                        </div>
                                    </div>

                                </div>


                            </body>

                        </div>


            </li>

        </ul>

       


        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>