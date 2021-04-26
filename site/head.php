<!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
            <title>Black Orchid</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
    
            <script src="js/jquery-3.4.1.min.js" type="application/javascript"></script>
            <script src="js/bootstrap.min.js" type="application/javascript"></script>
            <script src="js/bootstrap.min.js.map" type="application/javascript"></script>
            <script>
            function navbar_update(this_page){
               $("#"+this_page+"_item").addClass('active');
               $("#"+this_page+"_link").append(' <span class="sr-only">(current)</span>');
            }
            </script>
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
               <a class="navbar-brand" href="index.php">
               <img src="https://in-info-web4.informatics.iupui.edu/~kylperry/n413/black%20orchid/logo.png" alt="logo">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                     <li id="home_item" class="nav-item">
                        <a id="home_link" class="nav-link" href="index.php">home <span class="sr-only">(current)</span></a>
                     </li>
                     <li id="staff_item" class="nav-item">
                        <a id="staff_link" class="nav-link" href="staff.php">our staff</a>
                     </li>
                     <li id="services_item" class="nav-item">
                        <a id="services_link" class="nav-link" href="services.php">services</a>
                     </li>
                     <li id="booking_item" class="nav-item">
                        <a booking_link class="nav-link" href="booking.php">booking</a>
                     </li>
                     
                  </ul>
               </div>
            </nav>