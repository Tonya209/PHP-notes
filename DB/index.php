<?php

    //connect to DB
    //server  name
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
        echo "the was an error connection to db".$conn->connect_error;
    }else {
        echo "the connection was successful";
    }

    $sql = "select * from student";
    $results= $conn->query($sql);
//check if query returned result
    if ($results->num_rows>0){
        while($row=$results->fetch_assoc()){
            echo "Name: ".$row['name']."</br>";
            echo "Mark: ".$row['mark']."</br>";
            echo "Address: ".$row['address']."</br>";
        }
    }


//insert info
$stmt=$conn->prepare("insert into student (name, mark, address) values (?,?,?)");
$stmt->bind_param("sis",$name, $mark, $address);//wite it every time we want to add info
$name="Marry";
$mark=7;
$address="Zaragoza";
$stmt->execute();
$stmt->close();


//update
$stmt=$conn->prepare("update student set mark=? where name=?");
$stmt->bind_param("is",$mark, $name);
$mark=9;
$name="Marry";
$stmt->execute();
$stmt->close();

//delete
$stmt=$conn->prepare("delete from student where name=?");
$stmt->bind_param("s", $name);
$name="Marry";
$stmt->execute();
$stmt->close();



?>