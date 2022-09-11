<?php

$name=$_POST['name'];
$mark=$_POST['mark'];
$address=$_POST['address'];

$server_name= 'localhost';

//user name
$user_name='root';

//paswd
$password='';

//db_name
$db_name='school';

//connection
$conn=new mysqli($server_name,$user_name, $password, $db_name);

//check connection
if($conn->connect_error){
    echo "there was an error connection to db".$conn->connect_error;
}else {
    echo "the connection was successful";
}



//insert info
$stmt=$conn->prepare("insert into student (name, mark, address) values (?,?,?)");
$stmt->bind_param("sis",$name, $mark, $address);//wite it every time we want to add info

$stmt->execute();
$stmt->close();

?>