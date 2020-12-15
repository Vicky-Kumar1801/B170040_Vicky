 <?php
        $con = mysqli_connect('localhost','root','','vicky'); 
        $query2 = "select * from users";
        $data = mysqli_query($con, $query2);
        $total = mysqli_num_rows($data);          
    

?> 


<html>

<head>

<link href="font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/875301f134.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
    $("#frm2").submit(function(event) {
        event.preventDefault();
        var fn= $("#fn").val();
        var ln = $("#ln").val();
        var eml = $("#eml").val();
        var eml2 = $("#eml2").val();
        var subm = $("#subm").val();

        $(".form-message").load("log.php", {
            fn:fn,
            ln:ln,
            eml:eml,
            eml2:eml2,
            subm:subm
        });
    });
});

</script>
<style>


form {
	text-align: center;
}

.input-error {
    box-shadow: 0 0 5px red;
}

.form-success {
    color:green;
}
.form-error {
    color:red;
}
.form-message {
    font-family:arial;
    font-size:16px;
    font-weight:600;
    text-align:center;
}
.login_box {
	font-family: 'Bellota-LightItalic', sans-serif;
	position: relative;
	margin-right: auto;
	margin-left: auto;
	top: 7%;
	width: 35%;
	background-color: #ffffff;
	border: 1px solid #EDEDED;
	border-radius: 7px;
	padding: 5px;
	opacity: 0.98;
}

.login_header {
	font-family: 'Bellota-LightItalic', sans-serif;
	width: 100%;
	height: 90px;
	background-color: #3498db;
	color: #fff;
	text-align: center;
	border-top-left-radius: 7px;
	border-top-right-radius: 7px;
}

.login_header h1 {
	font-family: 'Bellota-BoldItalic', sans-serif;
	margin-top: 0;
	margin-bottom: 0;
	color: #2C6C96;
	text-shadow: #73B6E2 0.5px 0.5px 0px;
	font-size: 250%;
}

input[type="submit"] {
	background-color: #3498db;
	border: 1px solid #3498db;
	border-radius: 3px;
	margin: 5px 0 10px 0;
	padding: 5px 10px 5px 10px;
	color: #2C6C96;
	text-shadow: #73B6E2 0.5px 0.5px 0px;
	font-family: 'Bellota-BoldItalic', sans-serif;
	font-size: 100%;
}

input[type="text"], input[type="email"], input[type="password"] {
	border: 1px solid #e5e5e5;
	margin-top: 5px;
	width: 70%;
	height: 35px;
	margin-bottom: 10px;
	padding-left: 5px;
}

input[type="text"]:hover, input[type="email"]:hover, input[type="password"]:hover {
	border-color: #3498db;
}

#second{
    display:none;
}

body {
    background-image:url('desktop.jpg');
    background-size: 100%;
	width: 100%;
	height: 100%;
	min-width: 950px;
}
</style>


</head>
<body>
    <div class="login_box">

        <div class="login_header">
            <h1>Vicky</h1>
            
        </div>
        <br>
            <div id="second">

                <form action="" method="POST">
                    <table class="table">
                        <thead>
                            <tr>
                            
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if($total !=0)
                            {
                                while($result = mysqli_fetch_assoc($data))
                                {
                                    $nm = $result['name'];
                                    $id = $result['eid'];
                                    $eml = $result['email'];
                                    $dt = $result['doj'];
                        ?>
                            <tr>
                            
                            <td><?php echo $nm; ?></td>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $eml; ?></td>
                            <td><?php echo $dt; ?></td>
                            </tr>
                            <?php

                                }
                            }
                            ?>    
                            
                        </tbody>
                    </table><br>
                    
                    <input id="signup" type="submit" name="login_button" value="Login">
                    <br>
                    

                </form>
            </div>    
    





                <div id="first">

                    <form id="frm2" action="" method="POST">
                        <input id="fn"  type="text" name="reg_fname" placeholder="Name">
                        <br>
                       
                        <input id="ln"  type="text" name="reg_lname" placeholder="Enter your id">
                        <br>

                        <input id="eml" type="email" name="reg_email" placeholder="Email">
                        <br>

                        <input id="eml2" type="date" name="reg_email2" placeholder="Date of join">
                        <br>
                       
                        
                        

                        <input id="subm" type="submit" name="register_button" value="Register">
                        <br>
                        
                         <h1 style="color:black;" class="form-message"></h1> <br>
                        
                    </form>
                </div>

    </div>            


<script>
$(document).ready(function() {

$("#signup").click(function() {
    $("#second").slideUp("slow", function(){
        $("#first").slideDown("slow");
    });
});

$("#subm").click(function() {
    $("#first").slideUp("slow", function(){
        $("#second").slideDown("slow");
    });
});


});


</script>
</body>


</html>