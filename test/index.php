<html>
    <head>
        <title>
            CRUD            
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    
    </head>
    <body>
    <a href="create.php"><div class="btn btn-primary" style="float:right;">
    Create New</div></a>
        <?php
        require_once ('../config.php');
        $sql="SELECT * FROM employees";
      if ($result=mysqli_query($link,$sql)){
       if(mysqli_num_rows($result)>0){
       
        echo "<h2>Crud Table</h2>";
    echo "<table class='table'>";
        echo "<thead>";
        echo  "<tr>";
        echo  "<th>ID</th>";
        echo  "<th>Name</th>";
        echo  "<th>Address</th>";
        echo  "<th>Salary</th>";
        echo  "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while( $row=mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            
            
            echo "<td>" . $row['salary']."</td><td>";
            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
        echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
       }else{
           echo "no records were found";
       }
       
      }
      else{
          echo "Error $sql. " . mysqli_error($link);
      }
     
    
     ?>
    
    </body>
</html>