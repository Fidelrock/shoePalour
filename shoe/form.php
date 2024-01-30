
<?php
/*$username=$_POST["text"];
$email=$_POST["email"];
$password=$_POST["password"];





$servername="localhost";
$dbuser="root";
$password="";
$databasename="web";


$conn = new mysqli($servername,$dbuser,$password,$databasename);
if($conn->connect_error) {
    # code...
    die("connection Failed:".$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into user(Username,Email,Password)
    values(?,?,?)");
    $stmt->bind_param("sss",$username,$email,$password);
    $stmt->execute();
    echo"registration successfully";
    $stmt->close();
    $conn->close();

}*/


$username = filter_var($_POST["text"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

$servername = "localhost";
$dbuser = "root"; // Replace with your actual database user
$dbpassword = ""; // Replace with your actual database password
$databasename = "web";

$conn = new mysqli($servername, $dbuser, $dbpassword, $databasename);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user(Username, Email, Password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {

        echo '<script>alert("Registration successful!");
        window.location.href = "Login.php";
        </script>';
    } else {
        die("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
