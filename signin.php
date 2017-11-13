# A-2

<?php
  session_start();

$conn = new mysqli("localhost", "aolle_albert", "abcd1234", "aolle_A-2");

  if ($conn->connect_errno) {
      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }






  if(isset($_POST)&&
    !empty($_POST['email']) &&
    !empty($_POST['contrasenya'])){

    $email=htmlspecialchars($_POST['email']);
    $pass=md5(htmlspecialchars($_POST['contrasenya']));

    $emailsql="SELECT email, password FROM Usuarios WHERE email='$email'";

    $resultado3=$conn->query($emailsql);
    $row1=$resultado3->fetch_assoc();



    if ($email == $row1['email'] && $pass == $row1['password']) {
            header('Location:todolist.php');

    }else{
      echo "</br>no";
    }

}


   ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Sign In</title>
  </head>
  <style>

  body{

    background-color: gray;


  }


a{
text-decoration: none;
color: black;
text-decoration: underline;


}

#div{
vertical-align: middle;
text-align: right;
width: 50%;
background-color: grey;
position: absolute;

}


  </style>
  <body>

    <div id="div">
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
      <p>Email:<input type="email" name="email"></p>
      <p>Password:<input type="password" name="contrasenya"></p>
      <p><input type="submit" value="Sign in" name="Sign in"></p>
    </form>

    <a href="index.php">Volver a la pagina principal</a>

    <div>

  </body>
</html>
