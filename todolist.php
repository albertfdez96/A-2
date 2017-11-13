# A-2

<?php

session_start();





  	// connect to database
    $conn = new mysqli("localhost", "aolle_albert", "abcd1234", "aolle_A-2");


  	// insert a quote if submit button is clicked
  	if (isset($_POST) &&
      !empty($_POST['task']) ) {

  			$task = htmlspecialchars($_POST['task']);


        mysqli_query($conn, "INSERT INTO todo (task) VALUES ('$task') ");




  		}




?>


<!doctype html>
<hmtl>
<meta charset="utf-8" />
<head><title>Todo list</title></head>
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
  margin: 2em auto;
width: 75%;
background-color: grey;
position: absolute;

}

.table{
  width: 75%;
  vertical-align: middle;
  text-align: center;
  background-color: black;
  color: white;
  margin: 2em auto;


}

.td{
  width: 75%;
  background-color: white;
  color: black;
  text-align: center;

}


</style>

<body>

<div id="div">
          <form  action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <p>Tarea<input type="text" name="task"><input type="submit" name="submit" value="Añadir tarea"></p>
          </form>


          <table class="table">
            <tr>
                <td class="td">
                  Tarea
                </td>
                <td class="td">
                  Id
                </td>
                <td class="td">
                  Borrar tarea
                </td>
            </tr>
          </table>

          <?php
          if(isset($_POST) &&
            !empty($_POST['task'])) {


              $task2="SELECT task, id FROM todo WHERE task='$task'";

              $resultadotask=$conn->query($task2);
              $resultadotask2=$resultadotask->fetch_assoc();

              $res3=$resultadotask2['task'];
              $res4=$resultadotask2['id'];

              function deletear(){

                mysqli_query($conn, "DELETE FROM todo WHERE id=$res4");


              }

              echo "<table class=\"table\">";
                echo "<tr>";
                  echo "<td class=\"td\">$res3</td>";
                  echo "<td class=\"td\">$res4</td>";
                  echo "<td class=\"td\">

                  <input type=\"button\" onclick=\"deletear()\" value=\"Borrar tarea\">
                  </input>

                  </td>";
                echo "</tr>";
              echo "</table>";
          }
          ?>

  </div>

</body>
</html>
