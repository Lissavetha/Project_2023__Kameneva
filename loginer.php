<?php  
 require_once('db.php'); 
 
$login = $_POST['login']; 
$password = $_POST['password']; 
 
$sql = "SELECT * FROM Users WHERE login = '$login'"; 
$result = $conn->query($sql); 
 
if ($result->num_rows > 0) { 
    $user=$result->fetch_assoc(); 
    if (password_verify($password,$user['password'])){ 
        //Создание сессии и переменных сессии: 
                session_start(); 
                $_SESSION['auth']=true; 
                $_SESSION['login']= $user['login']; 
               // Header("Location:index.php"); 
               echo "Добро пожаловать, " . $user['login'] . "!"; 
 
    
} 
} else { 
    echo "Нет такого пользователя"; 
} 
 
?>