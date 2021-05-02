<?php
include("n413connect.php");
include("head.php");
?>


<div class="container-fluid">
        <div id="headline" class="row mt-5">
            <div class="col-12 text-center">
            <h2>Black Orchid Booking</h2>
            </div> <!-- /.col-12 -->
        </div> <!-- /.row -->
		<form method="POST" action="booking_post.php">
        <div class="row mt-5">
        <div class="col-3"></div>  <!-- spacer -->
        <div id="form-container" class="col-5">
				First Name: <input type="text" id="firstName" name="firstName" class="form-control" value="" placeholder="Enter First Name" required/><br/>
				Last Name: <input type="text" id="lastName" name="lastName" class="form-control" value="" placeholder="Enter Last Name" required/><br/>
				E-mail: <input type="email" id="email" name="email" class="form-control" value="" placeholder="Enter E-mail" required/><br/>
				Phone Number: <br>
        <small>Format: 123-456-7890</small>
        <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" value="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter Phone Number" required/><br/>
		<div class="form-row">
    <div class="form-group col-md-12">
      <label for="date">Date & Time:</label>
      <input type="datetime-local" class="form-control" id="datetime" name="datetime" min="0"  max="14" required>
    </div>
  </div>
				Comment: <textarea id="comment" name="comment" class="form-control" value="" placeholder="Add your desired services, barber, and comments here:"></textarea><br/>
				<button type="submit" id="submit" class="btn btn-dark float-right">Submit</button>
                </div>  <!-- /#form-container -->
    </div>  <!-- /.row --> 
		</form>
       
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