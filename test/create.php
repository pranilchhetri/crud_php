<?php
    require_once '../config.php';
    
    $name=$salary=$address="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
            $name=$_POST['name'];
            $salary=$_POST['salary'];
            $address=$_POST['address'];
            $sql = "INSERT INTO employees (name,address,salary) VALUES (?,?,?)";
            if($stmt = mysqli_prepare( $link,$sql)){
                mysqli_stmt_bind_param($stmt,"sss",$param_name,$param_address,$param_salary);

                $param_name=$name;
                $param_address=$address;
                $param_salary=$salary;
            }
            if(mysqli_stmt_execute($stmt)){
                header("location:index.php");
                exit();
            }
            else{
                echo "something went wrong!";
            }
            
            // Close statement
        mysqli_stmt_close($stmt);
            
    }
    mysqli_close($link);
?>

<h1>Create new</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

<input type="text" name="name" placeholder="Name">
<input type="text" name="address" placeholder="Address">

<input type="number" name="salary" placeholder="Salary">

<input type="submit" class="btn btn-primary">


</form>
<a href="index.php">
<button class="btn btn-primary">Cancel</button></a>

<a href="index.php">
<button class="btn btn-primary">go back</button></a>