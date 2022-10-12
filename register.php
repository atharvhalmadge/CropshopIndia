<?php
$name=$_POST['name'];
$mobileNumber=$_POST['mobile_number'];
$password=$_POST['password'];

if (!empty($name)|| !empty($mobile_number)|| !empty($password))
{
     $host = "localhost";
     $dbUsername ="root";
     $dbPassword = "";
     $dbname = "Users";

     $conn =new mysqli($host, $dbUsername, $dbPassword, $dbname);

     if (mysqli_connect_error()){
         die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());

     }
     else{
            $SELECT = "SELECT mobile_number From user Where mobile_number = ? Limit 1";
            $INSERT = "INSERT Into register ('name', 'mobile_number', 'password') VALUES ('?', '?', '?')";
        $stmt = $conn->prepare($SELECT);
        $stmt -> bind_param("s", $mobile_number);
        $stmt -> execute();
        $stmt -> bind_result($mobile_number);
        $stmt -> store_result();
        $rnum = $stmt->num_rows;

            if($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare("INSERT Into register (name, mobile_number, password) VALUES (?, ?, ?)");
            $stmt -> bind_param("sss", $name, $mobile_number, $password);
            $stmt->execute();
            echo "New Record Inserted Successfully";
        }
        else{
            echo "You Have already Registered.";
        }
        $stmt->close();
        $conn->close();
     }
}
else{
    echo "All fields are required";
    die();

}


?>
