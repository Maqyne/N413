<?php
include("n413connect.php");
include("head.php");

$appointments = array();
    $sql = "SELECT * FROM `bookings`
            ORDER BY date ASC";
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
    if($_SESSION["role"] > 0){
        foreach($appointments as $appointment){
            echo'
            <div class="row mt-3">
                <div class="col-2"></div>  <!-- spacer -->
                <div class="col-2">'.$appointment["firstName"].' '.$appointment["lastName"].'<br/>
                    <a href="mailto:'.$appointment["email"].'">'.$appointment["email"].'</a><br/>
                    ['.$appointment["date"].'&nbsp'.$appointment["hour"].':'.$appointment["minute"].''.$appointment["am_pm"].']
                </div>
                <div class="col-6 p-2 bg-light border rounded">'.$appointment["comment"].'</div>
            </div> <!-- /.row -->';
        } //foreach
    } else{
        echo'
        <div class="row mt-3">  
            <div class="col-12 text-center"><h3>You are not authorized to view the messages.</h3></div>
        </div> <!-- /.row -->';
    } //else if       
    ?>
 </div> <!-- /.container-fluid -->

 </body>
<script>
    var this_page = "appointments";
    var page_title = 'Black Orchid | Appointments';
		
    $(document).ready(function(){ 
            document.title = page_title;
            navbar_update(this_page);
        }); //document.ready
</script>
</html>