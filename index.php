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
    $sub = 1;
    $lay = "category";
    
    if ($_GET['lay'] != null)
    {
      $lay = $_GET['lay'];
      $sub = 1;
    }
    
    if ($_GET['sub'] != null)
    {
      $sub = $_GET['sub'];
    }
    
    generateTable ($sub, $lay);

    function generateTable ($which, $layer)
    {
      
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
      
      $layersSucc = array(
        "category" => "section",
        "section" => "product"
      );
      
      $layersPrev = array(
        "category" => 1,
        "section" => "category",
        "product" => "section"
      );
      
      $query = ('SELECT DISTINCT ' . $layer . ' FROM listino WHERE ' . $layersPrev($layer) . " = " . $which);
      echo $query;
      $result = mysqli_query($con, $query);
      
      echo '<table border="1">
      <tr>
      
        <th>' . $layer . '</th>
      
      </tr>';
      
      var_dump ($row);
      var_dump ($result);
      
      while($row = mysqli_fetch_array($result)) 
      {
        $prerow = $row["$layer"];
        $tabgen = ('<td> <a href = "'. $_SERVER["PHP_SELF"] . '?sub=' . $layersSucc($layer) . '&lay=' . $prerow . '">' . $prerow . '</td>');
        
        echo '<tr>' . $tabgen . '</tr>';
      }
      
      echo "</table>";
    }
    
    mysqli_close($con);
  ?>

  <footer>
    <div class="logo"><a href="https://www.openshift.com/"></a></div>
  </footer>
</body>

