<?php
    include("n413connect.php");


    $id = 0;
    $datetime = '';
    $checkin = '';
	
    if(isset($_POST["id"])) { $id = intval($_POST["id"]); } 
    if(isset($_POST["datetime"])) { $datetime = $_POST["datetime"]; } 
    if(isset($_POST["checkin"])) { $checkin = intval($_POST["checkin"]); } 
    
    $sql = "UPDATE bookings set `datetime` = '".$datetime."', checkin = '".$checkin."'  WHERE id = '".$id."' ";

    $result = mysqli_query($link, $sql); 
    

    session_write_close();
?>
    