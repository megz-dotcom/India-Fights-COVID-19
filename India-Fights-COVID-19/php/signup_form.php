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
	$adhar=$_POST['adhar'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$state=$_POST['state'];

	//check whether this username exist or not
	$existSql = "SELECT * FROM signup WHERE email = '$email'";
	$result = mysqli_query($conn,$existSql);
	$numExistRows = mysqli_num_rows($result);
	if($numExistRows>0)
	{
		echo "Error: Sorry Username already Exists...(";
	}
	else
	{
        $sql_query="INSERT INTO signup (fname,lname,phone,adhar,address,email,password,gender,state) VALUES ('$fname','$lname','$phone','$adhar','$address','$email','$password','$gender','$state')";

	    if(mysqli_query($conn,$sql_query))
	    {
		    //echo "New Details Entry inserted successfully !";  
		    echo 'Registration is successful...:) Please login with your new credentials <a href="index.html">CLICK HERE</a> ';

	    }
	    else
	    {
	        echo "Error: ". $sql."".mysqli_error($conn);
	    }
	    mysqli_close($conn);
    }
}
?>