<?php
session_start();
require_once("connectdb.php"); // This includes your database connection file

if (isset($_POST['submitted'])) {
    if (!isset($_POST['username'], $_POST['password'])) {
        exit('Please fill both the username and password fields!');
    }

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare('SELECT password FROM cvs WHERE username = ?');
    
    // Bind the input parameter
    $stmt->bind_param('s', $_POST['username']);
    
    // Execute the statement
    $stmt->execute();
    
    // Store the result
    $stmt->store_result();

    // Check if the username exists
    if ($stmt->num_rows > 0) {
        // Bind the result variable
        $stmt->bind_result($hashed_password);
        $stmt->fetch(); // Fetch the result

        // Verify the password
        if (password_verify($_POST['password'], $hashed_password)) {
            // Start a session for the logged-in user
            $_SESSION["username"] = $_POST['username'];
            header("Location:viewcv.php");
            exit();
        } else {
            echo "<p style='color:red; font-size: 20px;'>Error logging in, password does not match!</p><br>";
        }
    } else {
        echo "<div id='contact-me'><p style='color:red; font-size: 20px;'>Error logging in, Username not found </p><br></div>";
    }
    
    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="shortcut icon" type="image/x-icon" href="Images/cv.png" />
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/aa1a7f25aa.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="main-header">
            <nav>
                <ul class="nav_links">
                    <?php
                    if (isset($_SESSION["username"])) {
                        $id = $_SESSION['username'];
                        echo "<li><a  class='button' href='profile.php?alpha=$id'>Profile</a></li>";
                        echo "<li><a  class='button' href='logout.php'>Log Out</a></li>";
                    } else {
                        echo "<li><a  class='button' href='register.php'>Sign up</a></li>";
                        echo "<li><a  class='button' href='index.php'>Log In</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <div style="padding: 30px">
        <h2 style="color: rgb(102, 139, 170)">Login</h2>
        <br>
        <form action="index.php" method="post" id="signup-form">
            <p class="form-text">Username:</p>
            <input id="firstname" type="text" name="username" size="15" maxlength="25" /><br><br>
            <p class="form-text">Password:</p>
            <input id="firstname" type="password" name="password" size="15" maxlength="25" />
            <br><br>
            <input id="submit" type="submit" value="Login" style="font-size:15px" />
            <input id="submit" type="reset" value="Clear" style="font-size:15px" /><br>
            <input type="hidden" name="submitted" value="TRUE" /><br>
        </form>
        <p class="reg_user" style="font-size:15px; color: black; font-family: Montserrat">
            Not registered yet? <a id="mailbox-format" href="register.php" style="font-size:15px" >Register here</a>
        </p>
    </div>
    
</body>
</html>
