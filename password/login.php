<?php
    include("head.php");
?>
<div class="container-fluid">
    <div id="headline" class="row mt-5">
        <div class="col-12 text-center">
            <h2>Black Orchid Staff Login</h2>
        </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <form id="login_form" method="POST" action="">
    <div class="row mt-5">
        <div class="col-4"></div>  <!-- spacer -->
        <div id="form-container" class="col-4">
            User Name: <input type="text" id="username" name="username" class="form-control" value="" placeholder="Enter User Name" required/><br/>
            Password: <input type="password" id="password" name="password" class="form-control" value="" placeholder="Enter Password" required/><br/>
            <button type="submit" id="submit" class="btn btn-primary float-right">Submit</button>
        </div>  <!-- /#form-container -->
    </div>  <!-- /.row -->
</form>
</body>
<script>
    var this_page = "login";
    var page_title = 'Black Orchid | Login';
		
    $(document).ready(function(){ 
            document.title = page_title;
            navbar_update(this_page);
            
            $("#login_form").submit(function(event){
                event.preventDefault();
                $.post("auth.php",
                       $("#login_form").serialize(),
                       function(data){
                       	    //handle messages here
                            if(data.status){
                                $("#form-container").html(data.success);
                                right_navbar_update(data.role);
                            }else{
                                $("#form-container").html(data.failed);
                            }
                           },
                       "json"
                ); //post
            }); //submit 
            
        }); //document.ready
        
    function right_navbar_update(role){
        var html = "";
        if (role > 0) {
            html =  '<li id="register_item" class="nav-item">'+
                    '<a id="register_link" class="nav-link" href="register.php">register</a>'+
                    '</li>';
        }
		html +=  '<li id="appointments_item" class="nav-item">'+
                    '<a id="appointments_link" class="nav-link" href="appointments.php">appointments</a>'+
                    '</li>';

        html += '<li id="logout_item" class="nav-item">'+
                '<a id="logout_link" class="nav-link" href="logout.php">logout</a>'+
                '</li>';		
        $("#right_navbar").html(html);
    }
    
</script>
</html>