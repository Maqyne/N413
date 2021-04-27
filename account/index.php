<?php
include("n413connect.php");
include("head.php");

$sql = "SELECT * FROM `barbers`
            ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
?>

<div class="container-fluid">
        <div id="headline" class="row mt-5">
            <div class="col-12 text-center">
                <h1>Black Orchid Barber Lounge</h1>
            </div> <!-- /col-12 -->
        </div> <!-- /row -->
    </div> <!-- /container-fluid --> 
    <div id="subtitle" class="row">
            <div class="col-12 text-center">
                <h3>Meet the Barbers</h3>
            </div> <!-- /col-12 -->
            </div> <!-- /row -->
            
            <div class="col-4 mx-auto text-center"> <!-- image -->  
                <a href="staff.php">
                    <img src="<?php echo $row["image"]; ?>" width="100%"; /><br/>
                    <h2><?php echo $row["name"]; ?></h2></a>
            </div><!-- image placeholder -->  
            
        </div> <!-- /row -->
    </div> <!-- /container-fluid --> 

    </body>
    <script>
    var this_page = "home";
    var page_title = "Black Orchid Barber Lounge"
    $(document).ready(function(){
                document.title = page_title;
                navbar_update(this_page);
            }); //ready
    </script>
</html>