<?php
include("n413connect.php");
include("head.php");

$sql = "SELECT * FROM `services`";
$result = mysqli_query($link, $sql);
$records = array();
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
    $records[] = $row;
}


?>
 <style>
        .cursor-pointer {cursor:pointer;}
    </style>
<div class="container-fluid">
        <div id="headline" class="row mt-5">
            <div class="col-12 text-center">
<h2>Barber Services</h2>

            </div> <!-- /.col-12 -->
        </div> <!-- /.row -->
        <?php
        foreach ($records as $record){
            echo '
            <div class="row mt-3">
            <div class="col-2"></div>  <!-- spacer -->
            <div class="col-2"><b>'.$record["name"].'</b></div>
            <div class="col-3"> </div>  <!-- spacer -->
            <div class="col-1"><b>$'.$record["cost"].'</b></div>
            </div>  <!-- /.row -->
            <div class="row">
            <div class="col-2"></div>  <!-- spacer -->
            <div class="col-5">'.$record["description"].'</div>
            </div>  <!-- /.row -->
            ';
            
        } //foreach
        ?>
</div> <!-- /.container-fluid -->


</body>
    <script>
    var this_page = "services";
    var page_title = "Black Orchid Barber Services"
    $(document).ready(function(){
                document.title = page_title;
                navbar_update(this_page);
            }); //ready    
            
    </script>
</html>