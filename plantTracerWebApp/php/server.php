<?php

    $username = "";
    $password_unsafe = "";
    $errors = array();
    //connect to the database
    $db = mysqli_connect('162.144.115.100', 'planttr', 'PlantTracer2017!*(', 'oasznymy_planttracer_app');

    if(isset($_POST['register'])) {
        $username = mysql_real_escape_string($_POST['uname']);
        $password_unsafe = mysql_real_escape_string($_POST['psw']);
        $confirm = mysql_real_escape_string($_POST['pswconfirm']);
        
        //Ensure that form fields are filled properly
        /*
        if(empty ($username)){
            array_push($errors, "Username is required");
        }
        if(empty ($password_unsafe)){
            array_push($errors, "Password is required");
        }
        
        if(empty ($confirm)){
            array_push($errors, "Password confirmation is required");
        }
        */
        
        if($password_unsafe != $confirm){
            array_push($errors, "The two passwords do not match");
        }
        
        if(count($errors) == 0){
            //Encrypt password
            $password = md5($password_unsafe);
            $sql = "INSERT INTO plant_tracing (user, researcher) VALUES ('$username', '$password')";
            mysqli_query($db, $sql);
        }
    }
?>

