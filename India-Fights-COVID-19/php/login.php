<?php
$login = false;
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
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    
    $sql="Select * from signup where email='$email' AND password='$password'";
    $result=mysqli_query($conn, $sql);
    $num =mysqli_num_rows($result);
    if ($num == 1)
    {
        $login = true;
        echo 'Login is successfull...:) Well-Come to INDIA Fights COVID 19 <a href="phome.html">CLICK HERE</a> ';
    }
        
    else{
        echo 'Error: Invalid Credentials...( please login again <a href="http://localhost:1238/healthcare%20app%20frontend/index.html">LOGIN HERE</a> ';
    }
}
    
?>