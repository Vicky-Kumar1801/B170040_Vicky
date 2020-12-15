<?php

if(isset($_POST['subm'])) {
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $em = $_POST['eml'];
    $em2 = $_POST['eml2'];

    

    
    $errorEmpty = false;
    $errorEmail = false;

    if(empty($fn) || empty($ln) || empty($em) || empty($em2)) {
        echo "<span class='form-error'>Please fill all fields!!</span>";
        $errorEmpty = true;
    } 
    elseif(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Please enter valid email id!</span>";
        $errorEmail = true;
    }
    else {
        $con = mysqli_connect('localhost','root','','vicky');       
        $query = "insert into users (name,eid,email,doj) values ('$fn','$ln','$em','$em2')";
        $res = mysqli_query($con,$query);
        echo "<span class='form-success'>Signup Successfull</span>";
    }
}
else {
    echo "there was an error";
}
?>

<script>

 $("#fn , #ln , #eml, #eml2 ").removeClass("input-error");
    var errorEmpty = "<?php echo $errorEmpty; ?>";;
    var errorEmail = "<?php echo $errorEmail; ?>";

    if(errorEmpty == true){
        $("#fn , #ln , #eml").addClass("input-error");
    }

    if(errorEmail == true){
        $("#eml").addClass("input-error");
    }

    if(errorEmpty == false && errorEmail == false){
        $("#fn , #ln , #eml" ).val("");
    }
    $(document).ready(function() {

$("#subm").click(function() {
    $("#second").slideUp("slow", function(){
        $("#first").slideDown("slow");
    });
});

$("#signin").click(function() {
    $("#first").slideUp("slow", function(){
        $("#second").slideDown("slow");
    });
});


});
</script>

