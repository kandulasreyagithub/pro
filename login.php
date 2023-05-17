<?php
  $EmailId=$_POST['EmailId'];
  $EnterPassword=$_POST['EnterPassword'];
  $conn=new mysqli("localhost","root","niharika1234","project_mini");
  if($conn->connect_error){
    die('Failed to connect :'.$conn->connect_error);
  }
  else{
    $stmt=$con->prepare("select * from register where EmailId=?");
    $stmt->bind_param("s",$EmailId);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0){
       $data=$stmt_result->fetch_assoc();
       if($data['EnterPassword']===$EnterPassword){
        header("location: m.html");
       }
       else{
        echo "<h2>Invalid EmailId or Password</h2>";
       }
    }
    else{
        echo "<h2>Invalid EmailId or Password</h2>";
    }
}
?>