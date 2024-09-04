
<?php
      include('includes/connect.php');
  
   if(isset($_GET['YearID']))
   {
         $sql = "UPDATE yearmaster set Flag=1 WHERE YearID=".$_GET['YearID']; 
         if($conn->query($sql) === TRUE){

               header("location: YearMas.php?message=Record Deleted SuccessFully");
          }
          else
          {
            echo " Message doesn't Deleted ";
          }

      }
 ?>
