<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="covid_web";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//how to check connection
if (!$conn)
{
	die("connection failed:".mysqli_connect_error());

}
if (isset($_POST['save'])) {
    $fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
    $email=$_POST['email'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$state=$_POST['state'];
    $a=$_POST['help_as'];
    
    $help_as=implode(",",$a);
    $note=$_POST['note'];


    $sql_query="INSERT INTO volunteer_registration (fname,lname,phone,email,address,gender,state,help_as,note) VALUES ('$fname','$lname','$phone','$email','$address','$gender','$state','$help_as','$note')";

	if(mysqli_query($conn,$sql_query))
	{
		//echo "New Details Entry inserted successfully !";    
        echo ' <a href="feedback.html">CLICK HERE</a> '; 

	}
	else
	{
		echo "Error: ". $sql."".mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>