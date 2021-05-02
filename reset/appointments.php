<?php
include("n413connect.php");
include("head.php");

$appointments = array();
    $sql = "SELECT *
            FROM `bookings`
            WHERE `datetime` >= timestamp(curdate()) and checkin = 0
            ORDER BY `datetime` ASC";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
        $appointments[] = $row;
    }
?>

<div class="container-fluid">
    <div id="headline" class="row mt-5">
        <div class="col-12 text-center">
        <?php
            if(count($appointments) > 0){
                echo '<h1>Scheduled Appointments</h1>';
            }else{
                echo '<h2>There are no messages at this time.</h2>';
            }
        ?>
        </div> <!-- /.col-12 -->
    </div> <!-- /.row --> 
    
    <?php 
    if(isset($_SESSION["user_id"])){
        foreach($appointments as $appointment){
            echo'
            <div class="row mt-3">
                <div class="col-2"></div>  <!-- spacer -->
                <div class="col-2">'.$appointment["firstName"].' '.$appointment["lastName"].'<br/>
                    <a href="mailto:'.$appointment["email"].'">'.$appointment["email"].'</a><br/>
                    ['.$appointment["datetime"].']
                </div>
                <div class="col-5 p-2 bg-light border rounded">'.$appointment["comment"].'</div>
                <div class="col-1 p-2 bg-light border rounded">
                <a class="record-item" data-appointment-id="'.$appointment["id"].'" data-toggle="modal" href="#editModal">Check-in | Edit</a>
                </div>
                
            </div> <!-- /.row -->';
            
        } //foreach
    } else{
        echo'
        <div class="row mt-3">  
            <div class="col-12 text-center"><h3>You are not authorized to view the appointments.</h3></div>
        </div> <!-- /.row -->';
    } //else if       
    ?>
 </div> <!-- /.container-fluid -->

 
<script>
    var this_page = "appointments";
    var page_title = 'Black Orchid | Appointments';
		
    $(document).ready(function(){ 
        document.title = page_title;
        navbar_update(this_page);

        $(".record-item").on("click", function(){
            window.appointmentId = $(this).data('appointment-id');
            console.log("window.appointmentId", window.appointmentId);
        });
    }); //document.ready
</script>

<!-- --------------------------  Edit Appointment Modal  ------------------------- -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Appointment Check-in and Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> 
            </div> <!-- /.modal-header -->
            <div class="modal-body">
                <!-- form markup goes here -->
                <form id="update_form" name="update_form" class="form-horizontal" method="" action="" >
                <div class="row">
        <div class="col-12">
        <div class="row" style="padding:2em;">
            <label for="checkin">Checked-in: </label>
                    <select type="number" class="form-control" id="checkin" name="checkin">
                                    <option value="0">Edit Appointment: Date|Time</option>
                                    <option value="1">Check-in: Date|Time</option>
                    </select>
            </div> <!--  /.form-group  -->
            <div class="row" style="padding:2em;">
                <label for="date">Date & Time:</label>
                <input type="datetime-local" class="form-control" id="datetime" name="datetime" min="0"  max="14" required>
            </div> <!--  /.form-group  -->           
        </div> <!-- /.row -->   
       
                <div class="col-11">
                    <button type="submit" class="btn btn-dark float-right" >Update</button>
                    <div id="user_message" style="display:none;color:#990000;"></div>
                </div>  <!-- /.col-11 -->
            
        </div> <!-- /col-12 -->
    </div> <!-- /.row --> 
</form>
</div>  <!-- /.modal-body -->
         </div>  <!-- /.modal-content -->
    </div>  <!-- /.modal-dialog -->
</div>  <!-- /.modal --> 

<script type="text/javascript"> 
    // Attach a submit handler to the form
    $( "#update_form" ).submit(function( event ) {
        event.preventDefault();
        $.post("update_appointment.php",
        {id:window.appointmentId ,datetime:$("#datetime").val(), checkin:$("#checkin").val()},
            function(data){
                console.log(data, 'postdata');
                // $("#editModal").modal("hide");
                window.location.reload(true);
            }            
        ); //post
    });//submit
</script> 


</body>
</html>