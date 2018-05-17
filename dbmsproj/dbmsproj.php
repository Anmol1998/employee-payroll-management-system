<?php
$link = mysqli_connect("localhost","root","anmol1998")  or die("failed to connect to server !!");
mysqli_select_db($link,"dbms");
if(isset($_REQUEST['submit']))
{
$errorMessage = "";
$firstname=$_POST['fname'];
$midname=$_POST['mname'];
$lastname=$_POST['lname'];
$sex=$_POST['sex'];
$dob=$_POST['dob'];
$doj=$_POST['doj'];
$address=$_POST['address'];
$empid=$_POST['empid'];
$phone=$_POST['phone'];
$post=$_POST['post'];
$email=$_POST['email'];
$supervisor_id=$_POST['sup_no'];
$dept_no=$_POST['dept_no'];
 
// Validation will be added here

if ($errorMessage != "" ) {
echo "<p class='message'>" .$errorMessage. "</p>" ;
}
else{
//Inserting record in table using INSERT query
$insqDbtb="INSERT INTO `dbms`.`employee` (`f_name`, `m_name`,`l_name`, `sex`, 
`emp_id`, `dob`, `doj`, `address`, `phone`, `post`,`email_id`, `supervisor_id`,`d_no` ) VALUES ('".$firstname."', '".$midname."','".$lastname."', 
'".$sex."','".$empid."','".$dob."','".$doj."','".$address."', '".$phone."', '".$post."','".$email."','".$supervisor_id."', '".$dept_no."')";
mysqli_query($link,$insqDbtb) or die(mysqli_error($link));
}
}
$sql = "SELECT emp_id, f_name, l_name FROM employee";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["emp_id"]. " - Name: ". $row["f_name"]. " " . $row["l_name"] . "<br>";
    }
} else {
    echo "0 results";
}
 
?>
