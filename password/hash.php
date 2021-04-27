<?php
    include("n413connect.php");
    
    function sanitize($item){
            global $link;
            $item = html_entity_decode($item);
            $item = trim($item);
            $item = stripslashes($item);
            $item = strip_tags($item);
            $item = mysqli_real_escape_string( $link, $item );
            return $item;
    }
    
    $messages = array();
    $messages["status"] = 0;
    $messages["errors"] = 0;
    $messages["username_length"] = "";
    $messages["username_exists"] = "";
    $messages["email_exists"] = "";
    $messages["email_validate"] = "";
    $messages["password_length"] = "";
    $messages["success"] = "";
    $messages["failed"] = "";
        
    $firstName = "";
    $lastName = "";
    $nickName = "";
    $phoneNumber = "";
    $email = "";
    $username = "";
    $password = "";
    $role = "";
        
    if(isset($_POST["firstName"])) { $firstName = sanitize($_POST["firstName"]); }
    if(isset($_POST["lastName"])) { $lastName = sanitize($_POST["lastName"]); }
    if(isset($_POST["nickName"])) { $nickName = sanitize($_POST["nickName"]); }
    if(isset($_POST["phoneNumber"])) { $phoneNumber = sanitize($_POST["phoneNumber"]); }
    if(isset($_POST["role"])) { $role = sanitize($_POST["role"]); }


    if(isset($_POST["username"])) { $username = $_POST["username"]; }
    $username = trim($username);
    if( strlen($username) < 5 ){
    	$messages["error"] = 1;
        $messages["username_length"] = "The Username must be at least 5 characters long.";
    }else{
        $username = sanitize($username);
    }
    
    if(isset($_POST["password"])) { $password = $_POST["password"]; }
    $password = trim($password);
    if( strlen($password) < 8 ){
    	$messages["error"] = 1;
        $messages["password_length"] = "The Password must be at least 8 characters long.";
    }else{
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        if($encrypted_password){ 
            $password = $encrypted_password; 
        }else{
            $messages["errors"] = 1;
            $messages["password_length"] = "Password encryption failed.  You cannot register at this time";
        }
    }
    
    if(isset($_POST["email"])) { $email = $_POST["email"]; }   
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    	$email = sanitize($email);
    }else{
    	$messages["errors"] = 1;
    	$messages["email_validate"] = "There are problems with the e-mail address.  Please correct them.";
    }
    
    if( ! $messages["errors"]){
        $sql = "SELECT * FROM `users_hash` WHERE username = '".$username."'";
        $result = mysqli_query($link, $sql);
        if( mysqli_num_rows($result) > 0){
            $messages["errors"] = 1;
            $messages["username_exists"] = "This Username is already in use.  Please provide a different Username";
        }
        
        $sql = "SELECT * FROM `users_hash` WHERE email = '".$email."'";
        $result = mysqli_query($link, $sql);
        if( mysqli_num_rows($result) > 0){
            $messages["errors"] = 1;
            $messages["email_exists"] = "This E-mail address is already in use.  You cannot register another account for this E-mail.";
        }
    } //if( ! $messages["errors"])
    
    if( ! $messages["errors"]){
        $sql = "INSERT INTO `users_hash` (`id`, `firstName`, `lastName`, `nickName`, `phoneNumber`, `email`, `username`, `password`, `role`) 
                VALUES (NULL, '".$firstName."', '".$lastName."', '".$nickName."', '".$phoneNumber."', '".$email."', '".$username."',  '".$password."', '".$role."')"; 
        $result = mysqli_query($link, $sql); 
        
        $user_id = mysqli_insert_id($link);
        if($user_id){
            session_start();
            $_SESSION["user_id"] = $user_id;
            $_SESSION["role"] = $role;
        } 
    }  //if( ! $messages["errors"])  
    
    if(isset($_SESSION["user_id"])){
        $messages["status"] = "1";
        $messages["success"] = '<h3>You are now Registered and Logged In.</h3>';
    }else{
        $messages["failed"] = '<h3>The Registration was not successful.</h3>
        <div class="col-12 text-center"><a href="register.php"><button type="button" class="btn btn-primary mt-5">Try Again</button></a></div>';
    }  
    
    echo json_encode($messages);
 ?>