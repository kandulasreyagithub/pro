<?php
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$EmailId=$_POST['EmailId'];
$EnterPassword=$_POST['EnterPassword'];
$ConfirmPassword=$_POST['ConfirmPassword'];
$conn=new mysqli('localhost','root','niharika1234','project_mini');
if($conn->connect_error){
    die('connection Failed :'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into register(FirstName,LastName,EmailId,EnterPassword,ConfirmPassword) values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$FirstName,$LastName,$EmailId,$EnterPassword,$ConfirmPassword);
    $stmt->execute();
    echo "registration successful...";
    $stmt->close();
    $conn->close();
}


?>