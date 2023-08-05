<?php

    require_once("include/dbconn.php");

    if(isset($_POST['Update']))
    {
        $UserID = $_GET['ID'];
        $FullName = $_POST['Full_name'];
        $UserName = $_POST['User_name'];
        $EmailAddress = $_POST['Email_Address'];
        $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);

        $querry = "UPDATE users SET fullname = '".$FullName."' , username='".$UserName."', emailaddress='".$EmailAddress."', password ='".$Password."' WHERE usrID = '".$UserID."'" ;

        $result = mysqli_query($ConnStrx,$querry);

        if ($result)
        {
            header("location:view.php");
        }
        else
        {
            echo "Please Check your Query";
        }

    }
   
?>