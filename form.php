<?php

session_start();

$con = new mysqli('localhost','root','','se');

$brand=$frame=$hp=$motor_type=$mobile=$address=$problem="";

$username=$_SESSION['username'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

$brand=$_REQUEST['brand'];
$frame=$_REQUEST['frame'];
$hp=$_REQUEST['hp'];
$motor_type=$_REQUEST['motor_type'];
$mobile=$_REQUEST['mobile'];
$address=$_REQUEST['address'];
$problem=$_REQUEST['problem'];

        $sql = "INSERT INTO repairs(username,brand,frame,hp,type,mobile,address,problem) values('$username','$brand','$frame','$hp','$motor_type','$mobile','$address','$problem');";

            if ($con->query($sql) === TRUE) 
            {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('request submitted succesfully');
                window.location.href='form1.php';
                </script>");
            }
             else {
                echo "Error: " . $sql . "<br>" . $conn->error;
             }
}
    $con->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
     <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="requestform">
             <div>
                 <label for="brand">Motor Brand Name</label>
                 <input type="text" id="brand" name="brand" placeholder="Enter your motor brand name" >
             </div>  
             <div>
                 <label for="frame">Motor Frame Number</label>
                 <input type="text" id="frame" name="frame" placeholder="Enter your motor frame number">
             </div>  
             <div>
                 <label for="hp">Motor HP</label>
                 <input type="text" id="hp" name="hp" placeholder="Enter your motor hp">
             </div>  
             <div>
                 <label for="motor_type">Motor Type</label>
                 <input type="text" id="motor_type" name="motor_type" placeholder="Eg:pump motor,dc motor..">
             </div> 
             <div>
                 <label for="mobile">Mobile Number</label>
                 <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" >
                 <label for="address" class="text-sm">Address</label>
                 <input type="text" id="address" name="address" placeholder="Enter your address for pick up" >
             </div>  
             <div>
                 <label for="problem">Problem</label>
                 <input type="text" id="problem" name="problem" placeholder="Enter your motor problem" >
             </div>   
             <div>
                <input type="submit" value="submit">
             </div>    
        </form>
    </div>
</body>
</html>