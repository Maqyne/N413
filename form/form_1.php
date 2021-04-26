<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
		<title>Full Stack Amp Jam Form Project</title>
		<style>
			body	{ font-family:Arial; }
			h2	{ text-align:center;margin-top:50px; }
			#form-container { width:30%;margin-left:40%;margin-top:100px; }
			input	{ font-size:18px;margin-bottom:20px; }
			textarea{height:100px;width:300px;margin-bottom:30px;font-size:16px; }
			#submit	{float:right;}
		</style>
	</head>       
	<body>
		<h2>Full Stack Amp Jam Form Project</h2>
		<form method="POST" action="n413post.php">
			<div id="form-container">
				First Name: <input type="text" id="firstName" name="firstName" value="" placeholder="Enter First Name" required/><br/>
				Last Name: <input type="text" id="lastName" name="lastName" value="" placeholder="Enter Last Name" required/><br/>
				E-mail: <input type="email" id="email" name="email" value="" placeholder="Enter E-mail" required/><br/>
				Phone Number: <input type="tel" id="phoneNumber" name="phoneNumber" value="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter Phone Number" required/><br/>
				<small>Format: 123-456-7890</small><br><br>
				Comment: <textarea id="comment" name="comment" value="" placeholder="Add your comment here:"></textarea><br/>
				<input type="submit" id="submit" value="Submit" />
			</div>        
		</form>
	</body>
</html>
        