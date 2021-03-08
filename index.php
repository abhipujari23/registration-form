<?php
$insert = false;
if(isset($_POST['first_name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("Connection to this database failed due to".mysqli_connect_error());
    }

    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $area = $_POST['area'];
    $email = $_POST['email'];
    $area_code = $_POST['area_code'];
    $phone = $_POST['phone'];
    $beginner = $_POST['bn'];
    $subject = $_POST['subject'];
    $sql = "INSERT INTO `studentinfo`.`details` (`first_name`, `last_name`, `location`, `email`, `area_code`, `phone`, `subject`, `is_beginner`,`date`) VALUES ('$fname', '$lname', '$area', '$email', '$area_code', '$phone', '$subject', '$beginner', current_timestamp());";
    if($con->query($sql) == true){
        $insert = true;
        //echo "Successfully updated!";
    }else{
        echo "Error : $con->error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="regform"><h1>Registration Form</h1></div>
    <div class="main">
        <form action = "index.php" method = "POST">
        
            <div id="name">
                <h2 class = "name">Name</h2>
                <input class = "firstname" type = "text" name = "first_name"><br>
                <label class = "firstlabel">First Name</label>
                <input class = "lastname" type = "text" name = "last_name"><br>
                <label class = "lastlabel">Last Name</label>
            </div>

            <h2 class = "name">Area</h2>
            <input class = "area" type = "text" name = "area">

            <h2 class = "name">Email</h2>
            <input class = "email" type = "text" name = "email">

            <h2 class = "name">Phone</h2>
            <input class = "code" type="text" name = "area_code">
            <label class = "area-code">Area Code</label>
            <input class = "number" type="text" name = "phone">
            <label class = "phone-number">Phone Number</label>

            <h2 class = "name">Subject</h2>
            <select class = "option" name = "subject">
    <option disabled="disabled" selected="selected">--Choose Option--</option>
    <option>Science</option>
    <option>Commerce</option>
    <option>Arts</option>
</select>

<h2 id="student">Are you beginner ?</h2>
<label class="radio-btn">

    <input class="radio-one" type="radio" name = "bn" checked="checked" value="Yes">
    <span class="checkmark"></span>
    Yes
</label>

<label class="radio-btn">

    <input class="radio-two" type="radio" name="bn" value="No">
    <span class="checkmark"></span>
    No
</label>
<?php
if($insert == true){
echo "<h2 class = 'confirmation'>Your Application has been submitted!</h2>";
$con->close();
}
?>
<Button type="submit">Register</Button>

        </form>
    </div>
    
</body>
</html>