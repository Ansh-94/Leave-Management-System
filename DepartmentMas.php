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
$DeptID = "";
$DeptName = "";
$Flag = "";


$stmt = "Select DeptID,DeptName from departmentmaster Where Flag=0";
$result = $conn->query($stmt);
if (isset($_POST['btndelete'])) {

}
$stmt = "Select DeptID,DeptName from departmentmaster Where Flag=0";
$result = $conn->query($stmt);
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
                    <h1 class="h3 mb-0 text-gray-800">Department Master</h1>

                </div>
                <?php
                if (isset($_GET['message'])) {
                    ?>
                    <script>alert("Are You Want To Sure To Delete ?")</script>

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
                        <a href='DepartmentMaster.php' class="btn btn-info">Add New Department</a>
                    </div>
                    <div class="card-body">
                        <?php

                        if ($result->num_rows > 0) {
                            ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>DeptName</th>


                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>DeptName</th>


                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {

                                            echo "<tr>";
                                            echo "<td>" . $row['DeptName'] . "</td>";

                                            echo "<td><a href='departmentmaster.php?DeptID=" . $row['DeptID'] . "' class='btn btn-info'>Edit</a></td>";
                                            echo "<td><a href='DepartmentMasterDel.php?DeptID=" . $row["DeptID"] . "' class='btn btn-danger' id='delete' onclick='delete()'>Delete</a>
                                             <input type='hidden' value='" . $row['DeptID'] . "' name='DeptID' id='DeptID' /> 
                                            </td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <script>

                                    function delete ()
                                    {
                                        var v1 = document.getElementById('DeptID').value;
                                        //document.write(v1);
                                        //v1 = $DeptID;
                                        self.location = 'DeptDelMas.php?DeptID=' + v1;


                                    }
                                </script>
                            </div>
                            <?php
                        } else {
                            echo "<center><h2 style='color:red' >No student Record found</h2></center>";
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