<?php
$Name=$_POST['Name'];

$Email=$_POST['Email'];
$Rating=$_POST['Rating'];

$Feedback=$_POST['Feedback'];
$Queries=$_POST['Queries'];
$conn=new mysqli('localhost','root','sreya@0312','mini');
if($conn->connect_error){
    die('connection Failed :'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into Feedback(Rating,Name,Email,Feedback,Queries) values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$Rating,$Name,$Email,$Feedback,$Queries);
    $stmt->execute();
    echo "feedback sent... Your query will be answered through your registered emailid";
    $stmt->close();
    $conn->close();
}


?>