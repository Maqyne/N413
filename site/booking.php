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
				Phone Number: <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" value="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter Phone Number" required/><br/>
				<small>Format: 123-456-7890</small><br><br>
               
                <div class="form-row">
    <div class="form-group col-md-6">
      <label for="date">Date</label>
      <input type="date" class="form-control" id="date" name="date" >
    </div>
    <div class="form-group col-md-2">
      <label for="hour">Time</label>
      <select type="number" class="form-control" id="hour" name="hour">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="minute">&nbsp;</label>
      <select type="number" class="form-control" id="minute" name="minute" >
                        <option value="00">00</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                    </select>
    </div>
    <div class="form-group col-md-2">
      <label for="am_pm"> &nbsp;</label>
      <select type="text" class="form-control" id="am_pm" name="am_pm" >
                        <option value="am">am</option>
                        <option value="pm">pm</option>
                    </select>
    </div>
  </div>
				Comment: <textarea id="comment" name="comment" class="form-control" value="" placeholder="Add your comment here:"></textarea><br/>
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