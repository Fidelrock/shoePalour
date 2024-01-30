<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $stmt = $conn->prepare("SELECT Username, Email, Password FROM user WHERE Email = ?");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($username, $storedEmail, $hashed_password);
                $stmt->fetch();

                if (password_verify($password, $hashed_password)) {
                    echo '<script>alert("Login successful!");
                    window.location.href = "products.php";
                    </script>';
                } else {
                    echo "Invalid password";
                }
            } else {
                echo "User not found";
            }
        } else {
            die("Error: " . $stmt->error);
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="Login.css" />
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Login</button>
            <p>You don't have Account? <a href="form.html">Register</a></p>
        </form>
    </div>
</body>

</html>