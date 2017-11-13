# A-2

<?php
  session_start();


  $conn = new mysqli("localhost", "aolle_albert", "abcd1234", "aolle_A-2");

  if ($conn->connect_errno) {
      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }



  if (isset($_POST)&&
          !empty($_POST['nom'])&&
          !empty($_POST['email'])&&
          !empty($_POST['password'])&&
          !empty($_POST['rpassword'])&&
        $_POST['password']===$_POST['rpassword']) {

            $nom=htmlspecialchars($_POST['nom']);
            $email=htmlspecialchars($_POST['email']);
            //encriptamos password
            $pass=md5(htmlspecialchars($_POST['password']));

            $dades=array(
              'nom'=>$nom,
              'email'=>$email,
              'pass'=>$pass
            );



            mysqli_query($conn, "INSERT INTO Usuarios (username, password, email)
            VALUES ('$nom', '$pass', '$email') ");

            mysqli_query($conn, "INSERT INTO todo (email)
            VALUES ('$email') ");


          }







 ?>
 <html>
   <head>
     <meta charset="utf-8">
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <title>Sign up</title>
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
     <h1>LOGIN</h1>';

     <form  action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
       <p>Nom:<input type="text" name="nom"></p>
       <p>Email:<input type="email" name="email"></p>
       <p>Password:<input type="password" name="password"></p>
       <p>Repetir Password:<input type="password" name="rpassword"></p>
      <p><input type="submit" name="submit" value="Sign up"></p>
     </form>

     <a href="index.php">Volver a la pagina principal</a>
   </br>
     <a href="signin.php">Logearse</a>

     <div>

   </body>
 </html>
