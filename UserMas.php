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
$UserMasterID = "";
$UserName = "";
$Password = "";
$UserType = "";
$Dept = "";
$message = "";

$stmt = "SELECT UserMasterID,UserName,Password,UserType,DeptName FROM (usermaster INNER JOIN departmentmaster ON usermaster.DeptID=departmentmaster.DeptID);";
$result = $conn->query($stmt);
if (isset($_POST['btndelete'])) {
    $stmt = "Select * from usermaster where UserMasterID=" . $_POST["UserMasterID"];
    $result = $conn->query($stmt);
}

?>
<form method="post" action="">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">User Information </h1>

                </div>
                <?php
                if (isset($_GET['message'])) {
                    ?>
                    <script>
                        alert("")
                    </script>

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
                        <a href='UserMaster.php' class="btn btn-info">Add New User</a>
                    </div>
                    <div class="card-body">
                        <?php

                        if ($result->num_rows > 0) {

                            ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>UserName</th>
                                            <th>Password</th>
                                            <th>UserType</th>


                                            <th>Department Name</th>

                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>UserName</th>
                                            <th>Password</th>
                                            <th>UserType</th>

                                            <th>Department Name</th>






                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {


                                            echo "<tr>";

                                            echo "<td>" . $row['UserName'] . "</td>";
                                            echo "<td>" . $row['Password'] . "</td>";
                                            echo "<td>" . $row['UserType'] . "</td>";

                                            echo "<td>" . $row['DeptName'] . "</td>";

                                            echo "<td><a href='UserMaster1.php?UserMasterID=" . $row["UserMasterID"] . "' class='btn btn-info'>Edit</a></td>";
                                            echo "<td><a href='UserDelMas.php?UserMasterID=" . $row["UserMasterID"] . "' class='btn btn-danger' id='delete' onclick='Delete()'>Delete</a>
                                             <input type='hidden' value='" . $row["UserMasterID"] . "' name='UserMasterID' id='UserMasterID' /> 
                                            </td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </tbody>

                                </table>
                                <script>
                                    function Delete() {
                                        var v1 = document.getElementById('UserMasterID').value;
                                        //document.write(v1);
                                        //v1 = $DeptID;
                                        self.location = 'UserDelMas.php?UserMasterID=' + v1;
                                    }
                                </script>
                            </div>

                            <?php
                        } else {
                            echo "<center><h2 style='color:red' >No User Record found</h2></center>";
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
include('includes/scripts.php');
include('includes/footer.php');

?>