<?php

require_once("include/dbconn.php");

if (isset($_POST['login'])) {

    $UserName = $_POST['username'];
    $Password = $_POST['password'];
    $HashedPassword = password_hash($Password, PASSWORD_BCRYPT);

    // Use prepared statement to protect against SQL injection
    $query = "SELECT COUNT(*) FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($ConnStrx, $query);
    mysqli_stmt_bind_param($stmt, "ss", $UserName, $HashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);

    if ($count > 0) {
        echo "Login successful";
        header("Location: view.php");
    } 
    else {
        echo "<script>alert('Login Unsucessful');</script>";
    }
} else {
    echo "Login Unsucessful";
}
?>
