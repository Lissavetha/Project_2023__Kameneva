<?php 
 require_once('db.php'); 
$name = $_POST['name'];
$phone= $_POST['phone'];
$login = $_POST['login']; 
$password = $_POST['password']; 
$repeatpassword = $_POST['repeatpassword']; 
 
 
if ($password != $repeatpassword) { 
    echo "Пароли не совпадают"; 
} else { 
    $passw = password_hash($password, PASSWORD_BCRYPT); 
    $sql = "INSERT INTO Users (name,login,password,phone) VALUES ('$name','$login', '$passw', '$phone')"; 
    if ($conn -> query($sql) === TRUE) { 
        echo "Успешная регистрация"; 
    } 
    else { 
        echo "Ошибка: " . $conn->error; 
    } 
     
} 
 
?>
