<!doctype html>
<?php

include('includes/header.php');
include('includes/navbar.php');
include('includes/connect.php');
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        var loadFile = function (event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        function isNumber(e) {
            e = e || window.event;
            var charCode = e.which ? e.which : e.keyCode;
            return /\d/.test(String.fromCharCode(charCode));
        };
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">
    <title>Leave Mgmt - GPDahod</title>


    <?php
    $SrNo = "";
    $FacultyLeaveAllocationID = "";
    $FacultyInfoID = "";
    $FacultyName = "";
    $LeaveType = "";
    $TypeOfLeaveID = "";
    $DeptID = "";
    $YearID = "";
    $btn = "Submit";
    $message = "";
    ?>
</head>

<body>

    <form method="post" action="" enctype="multipart/form-data">
        <div class="container" style="color:black;">



            <h4 class="display-6"><svg xmlns="http://www.w3.org/2000/svg" width="25 " height="25" fill="currentColor"
                    class="bi bi-person-lines-fill" viewBox="0 0 14 14">
                    <path
                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />

                </svg> Report</h4>
            <a href="Report3.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm
         " style="float: right; margin-top:20px"><i class="fas fa-download fa-sm text-white-50"></i> Generate
                Report</a>
            <hr style="border-top: 1px solid black" ; />

            <br />
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="DeptName" class="form-label"> Department Name <sup
                                style="color:red; font-size: 15px" ;>*</sup>:</label>

                        <?php
                        $query = "Select * from departmentmaster";
                        $result = mysqli_query($conn, $query);

                        ?>
                        <select id="S1" name="DeptName" onchange="reload()" class="form-control"
                            value=" <?php echo $DeptID; ?>">
                            <option value="">----Department Name----</option>
                            <?php
                            while ($data = mysqli_fetch_array($result)) {
                                if ($data[0] == $_COOKIE['DeptID']) {
                                    echo "<option value='$data[0]' selected> $data[1] </option>";
                                } else {
                                    echo "<option value='$data[0]'> $data[1] </option>";
                                }
                                $DeptID = $data[0];
                            }

                            ?>
                        </select>
                        <script>


                            function reload() {
                                var v1 = document.getElementById('S1').value;
                                document.cookie = "DeptID=" + v1;
                                //v1 = $DeptID;
                                self.location = 'Report2.php';

                            }
                        </script>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="FacultyName" class="form-label">Faculty Name<sup style="color:red; font-size: 15px"
                                ;>*</sup>:</label>

                        <?php
                        if (isset($_COOKIE['DeptID'])) {


                            //$query = "SELECT facultyinfo.FacultyName,facultyinfo.FacultyInfoID FROM facultyleaveallocation INNER JOIN facultyinfo ON facultyleaveallocation.FacultyInfoID=facultyinfo.FacultyInfoID WHERE facultyleaveallocation.DeptID=1";
                            $query = " SELECT * FROM facultyinfo where DeptID=" . $_COOKIE['DeptID'];
                            $result1 = mysqli_query($conn, $query);
                        }

                        ?>
                        <select name="FacultyName" id="SS" onchange="reld()" required="" class="form-control"
                            value="<?php echo $FacultyInfoID; ?>">
                            <option value="">-----Faculty Name-----</option>

                            <?php
                            while ($data = mysqli_fetch_array($result1)) {
                                if ($data[0] == $_COOKIE['FacultyInfoID']) {
                                    echo "<option value='$data[0]' selected> $data[1] </option>";
                                } else {
                                    echo "<option value='$data[0]'> $data[1] </option>";
                                }
                            }

                            ?>
                        </select>
                        <script>

                            function reld() {
                                var v1 = document.getElementById('SS').value;
                                document.cookie = "FacultyInfoID=" + v1;
                                //v1 = $DeptID;
                                self.location = 'Report2.php';

                            }
                        </script>
                    </div>
                </div>

                <div class="col-sm-6 ">
                    <div class="form-group">
                        <label for="Date" class="form-label">Date<sup style="color:red; font-size: 15px"
                                ;>*</sup>:</label>
                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="Date"
                            maxlength="10" id="Date" placeholder="Date" onchange="re()">

                        </select>
                        <script>
                            function re() {
                                var v1 = document.getElementById('Date').value;
                                document.cookie = "Sel=" + v1;
                                //v1 = $DeptID;
                                self.location = 'Report2.php';
                            }
                        </script>

                    </div>
                </div>
            </div>


            <br>
            <br>


            <br>

            <br>

            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Faculty Information </h1>

                        </div>


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <?php

                                if ($result->num_rows > 0) {

                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Sr_NO</th>
                                                    <th>Leave Date</th>
                                                    <th>Leave Type</th>
                                                    <th>Total</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $FID = $_COOKIE['FacultyInfoID'];

                                                $i = 1;
                                                $query = "SELECT TL.LeaveType,Date, COUNT(*) Total FROM facultyleaveallocation as FA,typeofleave as TL WHERE FA.TypeOfLeaveID=TL.TypeOfLeaveID AND FacultyInfoID=$FID GROUP  BY LeaveType,Date WITH ROLLUP ";

                                                $result = mysqli_query($conn, $query);
                                                while ($row = $result->fetch_assoc()) {


                                                    // $q="SELECT LeaveType,count(*) as Duplicates FROM facultyleaveallocation GROUP BY LeaveType ORDER BY Duplicates";
                                                    //echo "<td>".$row['Duplicates'] . "</td>";
                                            
                                                    if ($row['Date'] == "") {

                                                        echo "<tr>";
                                                        echo "<td>" . $i++ . "</td>";
                                                        echo "<td colspan=2 text-align='center'> Total </td>";

                                                        echo "<td>" . $row['Total'] . "</td>";
                                                    } else {
                                                        echo "<tr>";
                                                        echo "<td>" . $i++ . "</td>";
                                                        echo "<td>" . $row['Date'] . "</td>";
                                                        echo "<td>" . $row['LeaveType'] . "</td>";
                                                        echo "<td>" . $row['Total'] . "</td>";

                                                    }






                                                    echo "</tr>";
                                                }




                                                ?>




                                            </tbody>

                                        </table>
                                    </div>

                                    <?php
                                } else {
                                    echo "<center><h2 style='color:red' >No Faculty Record found</h2></center>";
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>

            </div>




    </form>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <?php
    include('includes/footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
</body>

</html>