<!DOCTYPE html>
<html>

<head>
    <title>Corte Salandini management webapp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <html lang="it">

</head>

<body>
  <h1>This friendly php will help you!</h1>
  <p><?php echo "Hello Mond!";?></p>
  <?php
    $sub = 'category';
    
   /* if ($_GET['sub'] != null)
    {
      $sub = $_GET['sub'];
    }*/
    
    generateTable ($sub);
  
    $con = mysqli_connect("127.9.180.130:3306","adminbNNmtdG","fkBtFscRAGRI","mysql");
    $getTable = "SELECT * FROM listino";
    if (mysqli_connect_errno()) 
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Check connection
    if (mysqli_connect_errno()) 
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    function generateTable ($which)
    {
      $query = ('SELECT DISTINCT ' . $which . ' FROM listino');
      echo $query;
      $result = mysqli_query($con, $query);
      
      echo '<table border="1">
      <tr>
      
        <th>' . $which . '</th>
      
      </tr>';
      
      while($row = mysqli_fetch_array($result)) 
      {
        echo "<tr>";
        
        echo '<td> <a href="'. $_SERVER["PHP_SELF"] . '?sub=' . $row['' . $which . ''] . '">' . $row['' . $which . ''] . '</td>';
        
        echo "</tr>";
      }
      
      echo "</table>";
    }
    
    mysqli_close($con);
  ?>

  <footer>
    <div class="logo"><a href="https://www.openshift.com/"></a></div>
  </footer>
</body>

