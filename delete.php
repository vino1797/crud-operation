<?php
  include 'database.php';
  if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    $sql="DELETE FROM userdata WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    if($result){
        header('Location: user_view.php');
    }else{
        die(mysqli_error($conn));
    }
  }
?>