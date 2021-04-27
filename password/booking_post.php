<?php
include("n413connect.php");
include("head.php");


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
$date = "";
$hour = "";
$minute = "";
$am_pm = "";
$comment = "";

if(isset($_POST["firstName"])) { $firstName = sanitize($_POST["firstName"]); }
if(isset($_POST["lastName"])) { $lastName = sanitize($_POST["lastName"]); }
if(isset($_POST["email"])) { $email = sanitize($_POST["email"]); }
if(isset($_POST["phoneNumber"])) { $phoneNumber = sanitize($_POST["phoneNumber"]); }
if(isset($_POST["date"])) { $date = sanitize($_POST["date"]); }
if(isset($_POST["hour"])) { $hour = sanitize($_POST["hour"]); }
if(isset($_POST["minute"])) { $minute = sanitize($_POST["minute"]); }
if(isset($_POST["am_pm"])) { $am_pm = sanitize($_POST["am_pm"]); }
if(isset($_POST["comment"])) { $comment = sanitize($_POST["comment"]); }		

$sql = "INSERT INTO `bookings` (`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `date`, `hour`, `minute`, `am_pm`, `comment`, `timestamp`) 
        VALUES (NULL, '".$firstName."', '".$lastName."', '".$email."', '".$phoneNumber."', '".$date."', '".$hour."', '".$minute."', '".$am_pm."', '".$comment."', current_timestamp())";



$result = mysqli_query($link, $sql);
?>

<div class="container-fluid">
    <div id="headline" class="row mt-5">
        <div class="col-12 text-center">
        <h2>Appointment Submission</h2>
        </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <div class="row mt-5">
        <div class="col-4"></div>  <!-- spacer -->
    <div id="message-container" class="col-4 text-center">
		<?php
			if($result){
			    echo '<p>Thank you for booking with us, we look forward to your appointment! <br/>';
			}else{
			    echo '<p>Sorry, but something went wrong.  Please try again later. <br/>';
			}
		?>
		    <span class="mt-5 float-right">The Black Orchid Team</span></p>
		</div>
        </div> <!-- /.row --> 
        </div>  <!-- /.container-fluid -->
        </body>
    <script>
    var this_page = "booking";
    var page_title = "Black Orchid Booking"
    $(document).ready(function(){
                document.title = page_title;
                navbar_update(this_page);
            }); //ready         
    </script>
</html>