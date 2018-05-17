<?php
error_reporting(E_ALL);
$link = mysqli_connect("localhost","root","anmol1998")  or die("failed to connect to server !!");
mysqli_select_db($link,"dbms");
if(isset($_REQUEST['submit']))
{
$errorMessage = "";
$el=$_POST['el'];
$ml=$_POST['ml'];
$cl=$_POST['cl'];
#$tl=$_POST['tl'];
$emp_id=$_POST['emp_id'];
 
// Validation will be added here

if ($errorMessage != "" ) {
echo "<p class='message'>" .$errorMessage. "</p>" ;
}
else{
//Inserting record in table using INSERT query
$insqDbtb="INSERT INTO `dbms`.`leaves` (`EL`, `ML`,`CL`,`emp_id`) VALUES ('".$el."', '".$ml."','".$cl."','".$emp_id."')";
mysqli_query($link,$insqDbtb) or die(mysqli_error($link));
}
}
$sql = "SELECT EL, ML, CL FROM leaves WHERE emp_id='".$emp_id=$_POST['emp_id']."'";

$result = $link->query($sql);
/*$result = mysqli_fetch_array($result);
$result3 = $result[0] + $result[1] + $result[2];

$sql2="UPDATE leaves set leaves_taken='".$result3."' WHERE emp_id='".$emp_id=$_POST['emp_id']."'";

$result2= $link->query($sql2);*/
$total=$el+$ml+$cl;
//$sal="SELECT basic_pay FROM salary WHERE emp_id='".$emp_id"'";
//$deduction=($sal/30)*($ml+$cl);
//$finalSal=$sal-$deduction;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> EL: ". $row["EL"]. " ML: ". $row["ML"]. "CL " . $row["CL"] . "total " . $total . "<br>";
    }
} else {
    echo "0 results";
}

?>
