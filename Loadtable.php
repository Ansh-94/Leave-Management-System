<?php
include('includes/connect.php');
$f = $_POST['FID'];
$sql = "SELECT TL.LeaveType,Date, COUNT(*) Total FROM facultyleaveallocation as FA,typeofleave as TL WHERE FA.TypeOfLeaveID=TL.TypeOfLeaveID AND FacultyInfoID=$f GROUP  BY LeaveType,Date WITH ROLLUP ";
$result = mysqli_query($conn, $sql);
$output = "";
$i = 1;
if (mysqli_num_rows($result) > 0) {
    $output .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                  <tr>
                       <th>Sr_NO</th>
                       <th>Leave Date</th>
                       <th>Leave Type</th>
                       <th>Total</th>

                   </tr>
               </thead>
               <tbody>';


    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Date'] == "") {

            $output .= "<tr>
      <td>" . $i++ . "</td>
      <td colspan=2 text-align='center'> Total </td>
      <td>" . $row['Total'] . "</td>
       </tr></thead><tbody>";
        } else {

            $output .= "<tr>
		<td>" . $i++ . "</td>
		<td>" . $row['Date'] . "</td>
		<td>" . $row['LeaveType'] . "</td>
		<td>" . $row['Total'] . "</td>";
        }
        $output .= "</tr>";
    }

    $output .= "</tbody> </table>";
    echo $output;
} else {
    echo "<center><h2 style='color:red' >No Faculty Record found</h2></center>";
}
?>