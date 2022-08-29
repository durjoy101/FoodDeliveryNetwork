<?php
session_start();
//initializing variables
$email="";
$password="";
$errors=array();

//database connection
$db = mysqli_connect('localhost','root','','abc');

//main part
if(isset($_POST['loginAdmin'])){
    $email=mysqli_real_escape_string($db, $_POST['email']);
    $password=mysqli_real_escape_string($db, $_POST['password']);

    if(empty($email)){
        array_push($errors, "Email is required!");
    }
    if(empty($password)){
        array_push($errors, "Password is required!");
    }

    if(count($errors)==0){
        $query="SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $results=mysqli_query($db, $query);
        if(mysqli_num_rows($results)==1){
            header('location:../homepage.php');
        }
        else{
  		    echo 'Invalid inputs';
        }
    }
}
?>