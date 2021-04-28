<?php
include("n413connect.php");
include("head.php");

$sql = "SELECT * FROM `barbers`";
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
<h2>Our Family</h2>

            </div> <!-- /.col-12 -->
        </div> <!-- /.row -->
        <?php
        foreach ($records as $record){
            echo '
            <div class="row record-item mt-3 cursor-pointer" data-id="'.$record["id"].'" data-name="'.$record["name"].'">
            
            <div class="col-3  mx-auto"><img src="'.$record["image"].'" width="100%"/></div>
            
            </div>  <!-- /.row -->';
        } //foreach
        ?>
</div> <!-- /.container-fluid -->


</body>
    <script>
    var this_page = "staff";
    var page_title = "Black Orchid Family"
    $(document).ready(function(){
                document.title = page_title;
                navbar_update(this_page);

                $(".record-item").on("click", function(){
                var id = $(this).data('id');
                show_detail(id);
            }); //on()
        }); //document.ready

    function show_detail(id){
    window.location.assign("detail.php?id="+id);
}

            
    </script>
</html>