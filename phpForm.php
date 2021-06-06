<!DOCTYPE HTML>  
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>User From </title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
        <?php 
            include('dbconnection.php');
            //Defiend variables and set to empty
            $name = $email = $website  = $gender = " ";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = test_input($_POST["name"]);
                $email = test_input($_POST["email"]);
                $website = test_input($_POST["website"]);
                $gender = test_input($_POST["gender"]);

                $sql = "INSERT INTO user_data (user_name, user_email, user_website, user_gender) VALUES ('$name', '$email', '$website', '$gender')";

                if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header('location:http://localhost/phpTraning/fatchData.php');
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return  $data;
            }
           
        ?>
        <div class="container mt-5">
            <h2>User Form Submition</h2>
            <form method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']);?>" class="form-horizental php_fom_update">
                <div class="form-group"><label>Name:</label> <input type="text" class="form-control" name="name" value='<?php echo  $name;?>'></div>
               
                <div class="form-group"><label>E-mail:</label> <input type="text" class="form-control" name="email" value="<?php echo  $email;?>"></div>
                
                <div class="form-group"><label>Website:</label> <input type="text" class="form-control" name="website" value="<?php echo  $website;?>"></div>
               
                <div class="form-group">
                    <label>Gender:</label>
                    <br/><input type="radio" name="gender" value="0"> Female
                    <br/><input type="radio" name="gender" value="1"> Male
                    <br/><input type="radio" name="gender" value="2"> Other
                    <br><br>
                </div>
                <div class="form-group text-right"><input type="submit" class="btn btn-primary" name="submit" value="Submit" onClick="myFunction()"></div>  
            </form>
        </div>
        <script>
            function myFunction() {
                window.location.href="http://localhost/phpTraning/fatchData.php";
            }
        </script>
    </body>
</html>