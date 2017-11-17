<?php  
session_start();  
$host = "localhost";  
$username = "root";  
$password = "root";  
$database = "logistic";  
$message = "";  
try  
{  
     $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
     if(isset($_POST["login"]))  
     {  
          if(empty($_POST["username"]) || empty($_POST["password"]))  
          {  
               $message = '<label>All fields are required</label>';  
          }  
          else  
          {  
               $query = "SELECT * FROM users WHERE username = :username AND password = :password";  
               $statement = $connect->prepare($query);  
               $statement->execute(  
                    array(  
                         'username'     =>     $_POST["username"],  
                         'password'     =>     $_POST["password"],  
                    )  
               );  
               $count = $statement->rowCount();  
               if($count > 0)  
               {  
                    $_SESSION["username"] = $_POST["username"]; 
                     
                    $result = $statement->fetch(PDO::FETCH_ASSOC);
                    $admin = $result['admin'];
                 if($admin == 1) {
                    $_SESSION["admin"] = $result["admin"];
                    header("location:admin.php");                      
                 }else{
                    $_SESSION["admin"] = $result["admin"]; 
                    header("location:user.php");  
                                       
                 }  
               }  
               else  
               {  
                    $message = '<label>Wrong Data</label>';  
               }  
          }  
     }  
}  
catch(PDOException $error)  
{  
     $message = $error->getMessage();  
}  
?>
<!DOCTYPE html>  
<html>  
     <head>  
          <title>Webslesson Tutorial | PHP Login Script using PDO</title>  
          <link rel="stylesheet" href="css/bootstrap.css" />
          <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
          <link rel="stylesheet" href="css/style.css" />
          <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
     </head>  
     <body>  
          <br />  
          <div class="container" style="width:500px;">  
               <?php  
               if(isset($message))  
               {  
                    echo '<label class="text-danger">'.$message.'</label>';  
               }  
               ?>  
               <h3 align="">PHP Login Script using PDO</h3><br />  
               <form method="post">  
                    <label>Username</label>  
                    <input type="text" name="username" class="form-control" />  
                    <br />  
                    <label>Password</label>  
                    <input type="password" name="password" class="form-control" />  
                    <br />  
                    <input type="submit" name="login" class="btn btn-info" value="Login" />  
               </form>  
          </div>  
          <br />  
          <script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/script1.js"></script>

     </body>  
</html>  
