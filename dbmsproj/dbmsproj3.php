<?php
$link = mysqli_connect("localhost","root","anmol1998")  or die("failed to connect to server !!");
mysqli_select_db($link,"dbms");
if(isset($_REQUEST['submit']))
{
$errorMessage = "";
$bp=$_POST['bp'];
$da=$_POST['da'];
$hra=$_POST['hra'];
$medical_allowance=$_POST['medical_allowance'];
$welfare_fund=$_POST['welfare_fund'];
$security=$_POST['security'];
$misc_charges=$_POST['misc_charges'];
$emp_id=$_POST['emp_id'];
$earned_leaves=$_POST['earned_leaves'];
 
// Validation will be added here

if ($errorMessage != "" ) {
echo "<p class='message'>" .$errorMessage. "</p>" ;
}
else{
//Inserting record in table using INSERT query
$insqDbtb="INSERT INTO `dbms`.`salary` (`basic_pay`, `da`,`hra`, `medical_allowance`, 
`welfare_fund`, `security`, `misc_charges`, `emp_id`, `earned_leaves`) VALUES ('".$bp."', '".$da."','".$hra."', 
'".$medical_allowance."','".$welfare_fund."','".$security."','".$misc_charges."','".$emp_id."', '".$earned_leaves."')";
mysqli_query($link,$insqDbtb) or die(mysqli_error($link));
}
}
$sql = "SELECT basic_pay, da, hra, medical_allowance,welfare_fund,security,misc_charges,emp_id,earned_leaves FROM salary";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["emp_id"]. " basic_pay: ". $row["basic_pay"]. " da" . $row["da"] ." hra" . $row["hra"] . " medical_allowance" . $row["medical_allowance"] .
		" welfare_fund" . $row["welfare_fund"] ." security" . $row["security"] ." misc_charges" . $row["misc_charges"] ." earned_leaves" . $row["earned_leaves"] ."<br>";
    }
} else {
    echo "0 results";
}
 
?>
