<?php
include('includes/connect.php');


if (isset($_GET['UserMasterID'])) {
  $sql = "Delete from usermaster where UserMasterID=" . $_GET["UserMasterID"];
  if ($conn->query($sql) === TRUE) {
    header("location: UserMas.php?message=Record Deleted SuccessFully");

  } else {
    echo " Message doesn't Deleted ";
  }
}
?>