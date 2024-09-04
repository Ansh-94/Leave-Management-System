<?php

/*session_start();
If(empty($_SESSION['AdminID']))
{
header("Location:frmlogin.php");
exit();
}*/
include('includes/header.php');
include('includes/navbar.php');
include('includes/connect.php');
?>

<?php
if ($_SESSION['UserType'] == 'ESTA') {


    $FacultyLeaveAllocationID = "";
    $FacultyName = "";
    $LeaveType = "";
    $Date = "";
    $Year = "";
    $DeptName = "";
    $message = "";

    $stmt = "SELECT FacultyLeaveAllocationID,FacultyName,LeaveType,Date,DeptName FROM (((facultyleaveallocation INNER JOIN facultyinfo ON facultyleaveallocation.FacultyInfoID=facultyinfo.FacultyInfoID)INNER JOIN typeofleave ON facultyleaveallocation.TypeOfLeaveID=typeofleave.TypeOfLeaveID)INNER JOIN departmentmaster ON facultyleaveallocation.DeptID=departmentmaster.DeptID)";
    $result = $conn->query($stmt);

    //$Date=$_POST["Date"];

    //echo $stmt1="Select * from facultyleaveallocation where Date=$Date";
    //$result1 = $conn->query($stmt1);

    if (isset($_POST['btndelete'])) {
        $stmt = "Select * from facultyleaveallocation where FacultyLeaveAllocationID=" . $_POST["FacultyLeaveAllocationID"];
        $result = $conn->query($stmt);

    }

    ?>
    <html id="AB">
    <form method="post" action="">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Faculty Information </h1>

                    </div>
                    <?php
                    if (isset($_GET['message'])) {
                        ?>
                        <script>confirm("are you sure you want to delete?")</script>

                        <div class='alert alert-danger'>
                            <?php echo $_GET['message']; ?>
                        </div>

                        <?php
                    } else {
                        echo "";
                    }
                    ?>

                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href='FacultyLeaveAllocation.php' class="btn btn-info">Add New FacultyLeaveAllocation</a>

                            <input type="date" name="Date" onchange="reload()" style="float: right" maxlength="10" id="DATE"
                                placeholder="Date" value="<?php if (isset($_POST['date1'])) {
                                    echo $_POST['date1'];
                                } ?>">
                            <label for="UserType" class="form-label" style="font-size: 20px; float:right;">Leave Date: <div
                                    id="loader" class="spinner-border text-success" style="display: none;">
                                    <span class="sr-only">loading....</span>
                                </div></label>
                        </div>
                        <script type="text/javascript" src="js/jquery.js"></script>
                        <script>
                            function reload() {

                                var v1 = document.getElementById('DATE').value;

                                $.ajax({
                                    url: 'FacultyLeaveAllocation1.php',
                                    type: 'POST',
                                    data: { date1: v1 },
                                    beforeSend: function () {
                                        $('#loader').show();
                                    },
                                    success: function (data) {
                                        $('#AB').html(data);
                                    },
                                    complete: function () {
                                        $('#loader').hide();
                                    }
                                });
                            }
                        </script>

                        <div class="card-body">
                            <?php

                            if ($result->num_rows > 0) {
                                ?>

                                <div class="table-responsive">

                                    <table class="table table-bordered" id="dataTable" s width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>DepartmentName</th>
                                                <th>Faculty Name</th>
                                                <th>Leave Type</th>
                                                <th>Date</th>



                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>DepartmentName</th>
                                                <th>Faculty Name</th>
                                                <th>Leave Type</th>
                                                <th>Date</th>






                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
                                            //echo $_COOKIE['Selected'];
                                    
                                            if (isset($_POST['date1'])) {
                                                while ($row = $result->fetch_assoc()) {
                                                    //echo $Date = $_POST['Date'];
                                                    //$Date = date('Y-m-d');
                                    
                                                    $Date = $_POST['date1'];
                                                    if ($row['Date'] === $Date) {


                                                        echo "<tr>";
                                                        echo "<td>" . $row['DeptName'] . "</td>";
                                                        echo "<td>" . $row['FacultyName'] . "</td>";
                                                        echo "<td>" . $row['LeaveType'] . "</td>";
                                                        echo "<td>" . $row['Date'] . "</td>";



                                                        echo "<td><a href='FacultyLeaveAllocat1.php?FacultyLeaveAllocationID=" . $row["FacultyLeaveAllocationID"] . "' class='btn btn-info'>Edit</a></td>";
                                                        echo "<td><a href='DelFacultyLeaveAllocat.php?FacultyLeaveAllocationID=" . $row["FacultyLeaveAllocationID"] . "' class='btn btn-danger' id='delete' onclick='delete()'>Delete</a>
                                             <input type='hidden' value='" . $row["FacultyLeaveAllocationID"] . "' name='FacultyLeaveAllocationID' id='FacultyLeaveAllocationID' /> 
                                            </td>";
                                                        echo "</tr>";
                                                    }
                                                }

                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                    <script>

                                        function delete ()
                                        {
                                            var v1 = document.getElementById('FacultyLeaveAllocationID').value;
                                            //document.write(v1);
                                            //v1 = $DeptID;
                                            self.location = 'DelFacultyLeaveAllocat.php?FacultyLeaveAllocationID=' + v1;
                                        }
                                    </script>
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
        <!-- End of Main Content -->
    </form>
    <?php
} else {



    $FacultyLeaveAllocationID = "";
    $FacultyName = "";
    $LeaveType = "";
    $Date = "";
    $Year = "";
    $DeptName = "";
    $message = "";

    $stmt = "SELECT FacultyLeaveAllocationID,FacultyName,LeaveType,Date,DeptName FROM (((facultyleaveallocation INNER JOIN facultyinfo ON facultyleaveallocation.FacultyInfoID=facultyinfo.FacultyInfoID)INNER JOIN typeofleave ON facultyleaveallocation.TypeOfLeaveID=typeofleave.TypeOfLeaveID)INNER JOIN departmentmaster ON facultyleaveallocation.DeptID=departmentmaster.DeptID)";
    $result = $conn->query($stmt);

    $stmt1 = "Select * from departmentmaster where DeptID=" . $_SESSION['DeptID'];
    $result1 = $conn->query($stmt1);

    if (isset($_POST['btndelete'])) {
        $stmt = "Select * from facultyleaveallocation where FacultyLeaveAllocationID=" . $_POST["FacultyLeaveAllocationID"];
        $result = $conn->query($stmt);

    }

    ?>
    <html id="a1">
    <form method="post" action="">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Faculty Information </h1>

                    </div>
                    <?php
                    if (isset($_GET['message'])) {
                        ?>
                        <script>confirm("are you sure you want to delete?")</script>

                        <div class='alert alert-danger'>
                            <?php echo $_GET['message']; ?>
                        </div>

                        <?php
                    } else {
                        echo "";
                    }
                    ?>

                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href='FacultyLeaveAllocation.php' class="btn btn-info">Add New FacultyLeaveAllocation</a>
                            <input type="date" name="Date" onchange="reload()" style="float: right"
                                value="<?php if (isset($_COOKIE['Selected'])) {
                                    echo $_COOKIE['Selected'];
                                } ?> "
                                maxlength="10" id="Date" placeholder="Date">
                            <label for="UserType" class="form-label" style="font-size: 20px; float:right;">Leave
                                Date:</label>
                        </div>
                        <!--                         <script type="text/javascript" src="js/jquery.js"></script>
                        <script>
                            $(document).ready(function() {
                            $('#Date').change(function() {
                                var date = $(this).val();

                                $.ajax({
                                    url: 'FacultyLeaveAllocation1.php',
                                    type: 'GET',
                                    data: {date: date},
                                    success: function(data) {
                                        $('#a1').html(data);
                                    }
                                 });
                            });
                        });
                        </script> -->
                        <?php
                        //     if(isset($_GET['date'])){
                        // echo $_GET['date'];
                        //     }
                        ?>
                        <script>
                            function reload() {
                                var v1 = document.getElementById('Date').value;
                                document.cookie = "Selected=" + v1;
                                //v1 = $DeptID;
                                self.location = 'FacultyLeaveAllocation1.php';
                            }
                        </script>
                        <div class="card-body">
                            <?php

                            if ($result->num_rows > 0) {
                                ?>

                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>DepartmentName</th>
                                                <th>Faculty Name</th>
                                                <th>Leave Type</th>
                                                <th>Date</th>




                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>DepartmentName</th>
                                                <th>Faculty Name</th>
                                                <th>Leave Type</th>
                                                <th>Date</th>






                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            //echo $_COOKIE['Selected'];
                                            $User_data = mysqli_fetch_assoc($result1);
                                            if (isset($_COOKIE['Selected'])) {
                                                while ($row = $result->fetch_assoc()) {
                                                    //echo $Date = $_POST['Date'];
                                                    //$Date = date('Y-m-d');
                                    
                                                    $Date = $_COOKIE['Selected'];
                                                    if ($row['Date'] === $Date && $User_data['DeptName'] === $row['DeptName']) {


                                                        echo "<tr>";
                                                        echo "<td>" . $row['DeptName'] . "</td>";
                                                        echo "<td>" . $row['FacultyName'] . "</td>";
                                                        echo "<td>" . $row['LeaveType'] . "</td>";
                                                        echo "<td>" . $row['Date'] . "</td>";



                                                        echo "<td><a href='FacultyLeaveAllocat1.php?FacultyLeaveAllocationID=" . $row["FacultyLeaveAllocationID"] . "' class='btn btn-info'>Edit</a></td>";
                                                        echo "<td><a href='DelFacultyLeaveAllocat.php?FacultyLeaveAllocationID=" . $row["FacultyLeaveAllocationID"] . "' class='btn btn-danger' id='delete' onclick='delete()'>Delete</a>
                                             <input type='hidden' value='" . $row["FacultyLeaveAllocationID"] . "' name='FacultyLeaveAllocationID' id='FacultyLeaveAllocationID' /> 
                                            </td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                unset($_COOKIE['Selected']);
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                    <script>

                                        function delete ()
                                        {
                                            var v1 = document.getElementById('FacultyLeaveAllocationID').value;
                                            //document.write(v1);
                                            //v1 = $DeptID;
                                            self.location = 'DelFacultyLeaveAllocat.php?FacultyLeaveAllocationID=' + v1;
                                        }
                                    </script>
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
        <!-- End of Main Content -->
    </form>

    </html>
    <?php
}
?>

<?php
include('includes/scripts.php');
include('includes/footer.php');

?>