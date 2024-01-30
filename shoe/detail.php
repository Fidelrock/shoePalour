<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$regno=$_POST["regno"];
$email=$_POST["email"];
$age=$_POST["age"];

$conn = new mysqli("localhost","root","","detail");


if ($fname==null) {
    # code...
    echo"enter Firstname";
}elseif($email==null){
    echo"enter email";
}elseif($lname==null){
    echo"enter lastname";
}
elseif($conn->connect_error) {
    # code...
    die('connection Failed:'.$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into tbdetail(first_name,last_name,regno,email,age)
    values(?,?,?,?,?)");
    $stmt->bind_param("ssssi",$fname,$lname,$regno,$email,$age);
    $stmt->execute();
    echo"registration successfully";
    $stmt->close();
    $conn->close();

}