<?php
    include("head.php");
?>
<style>
    .error_msg { display:none;color:#C00; }
</style>
<div class="container-fluid">
    <div id="headline" class="row mt-5">
        <div class="col-12 text-center">
            <h2>Black Orchid Staff Registration</h2>
        </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <form id="register_form" method="POST" action="">
    <div class="row mt-5">
        <div class="col-4"></div>  <!-- spacer -->
        <div id="form-container" class="col-4">
            <div>First Name: <input type="text" id="firstName" name="firstName" class="form-control" value="" placeholder="Enter First Name" required/></div>
            <div>Last Name: <input type="text" id="lastName" name="lastName" class="form-control" value="" placeholder="Enter Last Name" required/></div>
            <div>Nick Name: <input type="text" id="nickName" name="nickName" class="form-control" value="" placeholder="Enter Nick Name"/></div>
            <div>Phone Number: <br>
            <small>Format: 123-456-7890</small>
            <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" value="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter Phone Number" required/></div>
            <div class="mt-3">E-mail: <input type="email" id="email" name="email" class="form-control" value="" placeholder="Enter E-mail" required/></div>
            <div id="email_exists" class="error_msg"></div>
            <div id="email_validate" class="error_msg"></div>
            <div>User Name: <input type="text" id="username" name="username" class="form-control" value="" placeholder="Enter User Name" required/></div>
            <div id="username_length" class="error_msg"></div>
            <div id="username_exists" class="error_msg"></div>
            <div class="mt-3">Password: <input type="password" id="password" name="password" class="form-control" value="" placeholder="Enter Password" required/></div>
            <div id="password_length" class="error_msg"></div>
            <div>
                <label for="hour">Role: </label>
                    <select type="number" class="form-control" id="role" name="role">
                                    <option value="0">Staff</option>
                                    <option value="1">Management</option>
                    </select>
            </div>
            <div class="mt-5"><button type="submit" id="submit" class="btn btn-primary float-right">Submit</button></div>
        </div>  <!-- /#form-container -->
    </div>  <!-- /.row -->
</form>
</body>
<script>
    var this_page = "login";
    var page_title = 'Black Orchid | Registration';
		
    $(document).ready(function(){ 
            document.title = page_title;
            navbar_update(this_page);

            $("#register_form").submit(function(event){
                event.preventDefault();
                $.post( "hash.php",
                $("#register_form").serialize(),
                        function(data){
                            if(data.status){
                                $("#form-container").html(data.success);
                                right_navbar_update();
                            }else{
                                if(data.errors){
                                    // handle error messages here
                                    for (var key in data){
                                        switch(key){
                                            case "status":
                                            case "errors":
                                            case "success":
                                            case "failed":
                                                break;
                                            default: $("#"+key).html(data[key]);
                                                     $("#"+key).css("display","block");
                                                break;
                                        } //switch
                                    } //for-in
                                }else{
                                    $("#form-container").html(data.failed);  //registration failed, but without errors
                                } //if data.errors
                            } //if data.status
                        },  //callback function
                        "json"
                    ); //post
            }); //submit
        }); //document.ready

        function right_navbar_update(){
            var html = '<li id="logout_item" class="nav-item">'+
                       '<a id="logout_link" class="nav-link" href="logout.php">logout</a>'+
                       '</li>';
							
            $("#right_navbar").html(html);
        }
</script>
</html>