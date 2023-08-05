<?php
require_once("include/dbconn.php");
$UserID = $_GET['ID'];
$query = "SELECT * FROM users WHERE usrId = '".$UserID."'";

$result = mysqli_query($ConnStrx, $query);
while($row = mysqli_fetch_assoc($result))
{
    $UserID = $row['usrID'];
    $FullName = $row['fullname'];
    $UserName = $row['username'];
    $EmailAddress = $row['emailaddress'];
    $password = password_hash($row['password'], PASSWORD_BCRYPT);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="update.php?ID=<?php echo $UserID ?>" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Full Name" name="Full_name" value=<?php echo $FullName ?> required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="User_name" value=<?php echo $UserName ?> required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email Address" name="Email_Address" value=<?php echo $EmailAddress ?> required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="Password" value=<?php echo $password ?> required>
            </div>
            <input type="submit" class="btn btn-primary" name="Update" value="Update Record">
        </form>
    </div>

    <!-- Add Bootstrap JS and other scripts as needed -->
    <!-- Optional: You can also add Bootstrap JS for additional functionality -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>


