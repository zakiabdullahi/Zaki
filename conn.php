<?php 

$conn=new mysqli("localhost","root","","mydb");

if($conn->error){

    echo $conn->error;
}else{
    // echo "success";
}
?>