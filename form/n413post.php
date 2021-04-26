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
        
        $firstName = "";
		$lastName = "";
        $email = "";
		$phoneNumber = "";
        $comment = "";
        
        if(isset($_POST["firstName"])) { $firstName = sanitize($_POST["firstName"]); }
		if(isset($_POST["lastName"])) { $lastName = sanitize($_POST["lastName"]); }
    	if(isset($_POST["email"])) { $email = sanitize($_POST["email"]); }
		if(isset($_POST["phoneNumber"])) { $phoneNumber = sanitize($_POST["phoneNumber"]); }
        if(isset($_POST["comment"])) { $comment = sanitize($_POST["comment"]); }		
        
        $sql = "INSERT INTO `form_responses` (`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `comment`, `timestamp`) 
				VALUES (NULL, '".$firstName."', '".$lastName."', '".$email."', '".$phoneNumber."', '".$comment."', current_timestamp())";



        $result = mysqli_query($link, $sql);
        
    ?>
    
    <!DOCTYPE html>
    <html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
		<title>Full Stack Amp Jam Form Project</title>
		<style>
			body	{ font-family:Arial; }
			h2	{ text-align:center;margin-top:50px; }
			#message-container { width:30%;margin-left:40%;margin-top:100px; }
			.signoff{ float:right;font-style:italic;margin-top:30px; }
		</style>
	</head>       
	<body>
		<h2>Full Stack Amp Jam Form Project</h2>
		<div id="message-container">
		<?php
			if($result){
			    echo '<p>Thank you for submitting your comment. <br/>';
			}else{
			    echo '<p>Sorry, but something went wrong.  Please try again later. <br/>';
			}
		?>
		    <span class="signoff">The Web Site Team</span></p>
		</div>
	</body>
</html>
        