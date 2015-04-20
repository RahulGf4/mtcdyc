<?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Thank you for contact us. As early as possible  we will contact you '
	);

    $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $subject = @trim(stripslashes($_POST['subject'])); 
    $message = @trim(stripslashes($_POST['message'])); 

    $email_from = $email;
    $email_to = 'email@email.com';//replace with your email

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;

    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register for DYC 2015</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    

</head><!--/head-->

<body>

    <header id="header">
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                     <a class="navbar-brand" href="index.html">Mtcdyc</a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                         <li ><a href="index.html">Home</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="services.html">History</a></li>
                        <li class="active"><a href="register.html">Register here</a></li>
                        <li><a href="blog.html">Check in</a></li> 
                        <li><a href="contact-us.html">Contact</a></li>                                    
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    <section id="about-us">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Register Here</h2>
        <form role="form" id="registerForm" name="registerForm" novalidate="novalidate">
        <div class="box-border">
        <div class="row">
            <div class="col-md-2">
                <label>Vicar</label>
            </div>
             <div class="col-md-3">
             <div class="form-group">
                <input type="text" class="form-control" name="vicarName" id="vicarName" placeholder="Enter Your Name" required>
            </div></div>
             <div class="col-md-3">
             <div class="form-group">
                <input type="text" class="form-control" name="vicarNo" id="vicarNo" placeholder="Enter Mobile No" required>
            </div></div>
             <div class="col-md-3">
             <div class="form-group">
                <input type="email" class="form-control" name="vicarEmail" id="vicarEmail" placeholder="Enter Email Id" required>
            </div></div>
        </div>
        <br />
         <div class="row">
            <div class="col-md-2">
                <label>Youth Secretary / Youth In-charge</label>
            </div>
             <div class="col-md-3">
             <div class="form-group">
                <input type="text" class="form-control" name="youthName" id="youthName" placeholder="Enter Your Name" required>
            </div></div>
             <div class="col-md-3">
             <div class="form-group">
                <input type="text" class="form-control" name="youthNo" id="youthNo" placeholder="Enter Mobile No" required>
            </div></div>
             <div class="col-md-3">
              <div class="form-group">
                <input type="email" class="form-control" name="youthEmail" id="youthEmail" placeholder="Enter Email Id" required></div>
            </div>
        </div>
        </div>
        <div class="box-border">
             <div class="row"> 
             <div class="form-group text-center"><label>Travel Details</label></div>
            <div class="col-md-2">
                <label>Arrival</label>
            </div>
             <div class="col-md-2">
             <div class="form-group">
                <select class="form-control" name="arrivalType" required >
                    <option value="">Transport Type</option>
                    <option value="1">Air</option>
                    <option value="2">Train</option>
                    <option value="3">Bus</option>
                </select>
                </div>
            </div>
             <div class="col-md-3">
             <div class="form-group">
                <input type="text" class="form-control" name="arrivalPlace" id="arrivalPlace" placeholder="Station name / Location of Arrival" required>
            </div></div>
             <div class="col-md-2">
             <div class="input-group">
                  <span class="input-group-addon" ><i class="glyphicon glyphicon-time"></i></span>
                <input id="arrivalTime" name="arrivalTime" type="text" class="form-control">
                </div>
             
            </div>
        </div>
        <div class="row">
         <div class="col-md-2">
                <label>Departure</label>
            </div>
            <div class="col-md-2">
             <div class="form-group">
                <select class="form-control" name="departType" required>
                    <option value="">Transport Type</option>
                    <option value="1">Air</option>
                    <option value="2">Train</option>
                    <option value="3">Bus</option>
                </select>
                </div>
            </div>
             <div class="col-md-3">
             <div class="form-group">
                <input type="text" class="form-control" name="departName" id="departName" placeholder="Station name / Location of Arrival" required>
            </div></div>
             <div class="col-md-2">
                <div class="input-group">
                  <span class="input-group-addon" ><i class="glyphicon glyphicon-time"></i></span>
                <input id="departTime" name="departTime" type="text" class="form-control" required>
                </div>
            </div>
            </div>
        </div>
      
    <div class="box-border">
         <div class="row">
         <div class="col-md-12 text-center"> <div class="form-group"><label> Details of Visiting Elders </label></div></div>
          <div class="col-md-12 text-center">  <div class="col-md-3">
                <label>Name (with Title)</label>
            </div><div class="col-md-3">
                <label>Mobile Number</label>
            </div><div class="col-md-2">
                <label>With / Without Family</label>
            </div><div class="col-md-3">
                <label>No. of Dependents</label>
            </div></div>
              <div class="col-md-12"> 
             <div class="col-md-3">
             <div class="form-group">
                <input type="text" class="form-control" name="visName1" id="visName1" placeholder="Enter Your Name" required>
            </div></div>
            <div class="col-md-3">
             <div class="form-group">
                <input type="text" class="form-control" name="visNo1" id="visNo1" placeholder="Enter Mobile No" required>
            </div></div>
             <div class="col-md-2">
             <div class="form-group">
                <select class="form-control"  name="visFamily1" required>
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>

            </div></div>
             <div class="col-md-3">
              <div class="form-group">
                <input type="email" class="form-control" name="visEmail1" id="visEmail1" placeholder="Enter Email Id" required></div>
            </div></div>
        </div> </div>
    <div class="box-border">
       <div class="row participantsDetails">
         <div class="col-md-12 text-center"> <div class="form-group"><label> Details of Participants</label></div></div>
          <div class="col-md-12 text-center">  <div class="col-md-3">
                <label>Name </label>
            </div><div class="col-md-2">
                <label>Mobile Number</label>
            </div><div class="col-md-1">
                <label>Age</label>
            </div><div class="col-md-2">
                <label>Gender</label>
            </div>
            <div class="col-md-3">
                <label>Email ID</label>
            </div></div>
              <div class="col-md-12"> 
             <div class="col-md-3">
             <div class="form-group">
                <input type="text" class="form-control" name="pName1" id="pName1" placeholder="Enter Your Name" required>
            </div></div>
                <div class="col-md-2">
             <div class="form-group">
                <input type="text" class="form-control" name="pNo1" id="pNo1" placeholder="Your Mobile No" required>
            </div></div>
            <div class="col-md-1">
             <div class="form-group">
                <input type="text" class="form-control" name="pAge1" id="pAge1" placeholder="Age" required>
            </div></div>
             <div class="col-md-2">
             <div class="form-group">
                <select class="form-control" name="pSex1" required>
                    <option value="">Select</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>

            </div></div>
             <div class="col-md-3">
              <div class="form-group">
                <input type="email" class="form-control" name="pEmail1" id="pEmail1" placeholder="Enter Email Id" required></div>
            </div></div>
        </div> 
        <div class="row ">
        <div class="col-md-9" ></div>
        <div class="col-md-1" ><button class="btn btn-info add_field_button">Add More</button></div>

    <div>
        
    </div> <br /><br />
</div>
        </div>
        <input type="submit" id="submitButton" class="btn btn-primary" value="Register" >
          </form>
            </div>
            
        

        </div><!--/.container-->
    </section><!--/about-us-->
    
   
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; Mtcdyc 2015  All Rights Reserved.
                </div>
               
            </div>
        </div>
    </footer><!--/#footer-->
    

    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
             $('#arrivalTime, #departTime').timepicker();
                $("#registerForm").validate({
                    errorPlacement: function(error, element){
                      /* Need to add this function to remove the error default placement */
                    },
                      submitHandler: function(form) {
                        $(form).submit();
                      }
                     });
             $("#submitButton").click(function(e){ 
             
                var datastring = $("#registerForm").serialize();
                console.log(datastring);
            });

    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".participantsDetails"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-md-12"><div class="col-md-3"> <div class="form-group"> <input type="text" class="form-control" name="pName1" id="pName1" placeholder="Enter Your Name" required>   </div></div> <div class="col-md-2"> <div class="form-group">      <input type="text" class="form-control" name="pNo1" id="pNo1" placeholder="Your Mobile No" required>  </div></div><div class="col-md-1"> <div class="form-group"><input type="text" class="form-control" name="pAge1" id="pAge1" placeholder="Age" required> </div></div> <div class="col-md-2"> <div class="form-group"><select class="form-control" name="pSex1" required><option value="">Select</option><option value="1">Male</option>     <option value="2">Female</option>   </select>  </div></div>  <div class="col-md-3">    <div class="form-group"> <input type="email" class="form-control" name="pEmail1" id="pEmail1" placeholder="Enter EmailId" required> </div> </div><a href="#" class="remove_field">x</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
    </script>
</body>
</html>
