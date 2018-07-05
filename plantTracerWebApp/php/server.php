<?php
    session_start();

    $username = "";
    $password_unsafe = "";
    $errors = array();
    //connect to the database
    $db = mysqli_connect('162.144.115.100', 'planttr', 'PlantTracer2017!*(', 'oasznymy_planttracer_app');

    if(isset($_POST['register'])) {
        $username = mysql_real_escape_string($_POST['uname']);
        $password_unsafe = mysql_real_escape_string($_POST['psw_1']);
        $confirm = mysql_real_escape_string($_POST['pswconfirm']);
        
        if($password_unsafe != $confirm){
            array_push($errors, "The two passwords do not match");
        }
        
        if(count($errors) == 0){
            //Encrypt password
            $password = md5($password_unsafe);
            $sql = "INSERT INTO plant_tracing (user, researcher) VALUES ('$username', '$password')";
            mysqli_query($db, $sql);
            
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: database.html'); //Redirect to database page upon successful registration
        }
    }
    //log user in from login page
    if(isset($_POST['login'])){
        $username = mysql_real_escape_string($_POST['uname']);
        $password = mysql_real_escape_string($_POST['psw']);
        
        $password = md5($password);
        $query = "SELECT * FROM plant_tracing WHERE user = '$username' AND password = '$password'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result) == 1){
            //log user in
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: database.html'); //Redirect to database page upon successful login
        }
        else{
            array_push($errors, "Wrong username or password");
        }
    }


    //logout
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }
?>

