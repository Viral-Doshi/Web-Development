<?php
session_start();

if ($_POST['submit'] == 'Log In'){

    $name = $_POST['IGN'];
    $pwd = $_POST['pwd'];

    if ($name && $pwd) {
        require("db_connect.php");

        $user_check = "SELECT * FROM accounts WHERE fifa_name = '$name' AND pwd = '$pwd'";
        $result = mysqli_query($conn, $user_check) or die("Login Failed : ".mysqli_error($conn));

        //Check whether user or not
        if(mysqli_num_rows($result)){

            unset($_SESSION['login_error']);
            $_SESSION['IS_USER'] = 1;
            $_SESSION['Game_Name'] = $name;

            header("location: home_page.php");
        }
        else{
            $admin_check = "SELECT * FROM USERS WHERE USER_ID = '$name' AND PWD = '$pwd'";
            $result = mysqli_query($conn, $admin_check) or die("Login Failed : ".mysqli_error($conn));

            //Check whether admin or not
            if(mysqli_num_rows($result)){

                unset($_SESSION['login_error']);
                $_SESSION['IS_ADMIN'] = 1;

                header("location: admin_home.php");
            }
            //Login Error
            else {
                $_SESSION['login_error'] = "Game Name or Password Incorrect";
                header("location: login.php");
            }
        }
    }
    else {
        $_SESSION['login_error'] = "Game Name or Password Missing!!";
        header("location: login.php");
    }
}
else{
    $_SESSION['login_error'] = "Please LogIn First to Continue";
    header("location: login.php");
}

?>
