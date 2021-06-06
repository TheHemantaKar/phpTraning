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

        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];

            #fatching the data into php from   
            $sql = " SELECT * FROM user_data WHERE user_id=$user_id ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            #update the data into the dtabase
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $website = $_POST["website"];
                $gender = $_POST["gender"];

                $sql = "UPDATE `user_data` SET user_name='$name',user_email='$email',user_website='$website',user_gender='$gender' WHERE user_id='$user_id'";

                $row = $conn->query($sql);
                if ($conn->query($sql) === TRUE) {
                    echo "New record updated successfully";
                    header('location:http://localhost/phpTraning/fatchData.php');
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }

        ?>

            <div class="container mt-5">
                <h2>User Data Updated Form</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?user_id=' . $_GET['user_id']; ?>" class="form-horizental php_fom_update">

                    <div class="form-group"><label>Name:</label> <input type="text" class="form-control" name="name" value="<?php echo $row['user_name']; ?>"></div>

                    <div class="form-group"><label>E-mail:</label> <input type="text" class="form-control" name="email" value="<?php echo $row['user_email']; ?>"></div>

                    <div class="form-group"><label>Website:</label> <input type="text" class="form-control" name="website" value="<?php echo $row['user_website']; ?>"></div>

                    <div class="form-group">
                        <label>Gender:</label>
                        <br /><input type="radio" name="gender" value="0" <?php echo ($row["user_gender"] == 0) ?  "checked" : "";  ?>> Female
                        <br /><input type="radio" name="gender" value="1" <?php echo ($row["user_gender"] == 1) ?  "checked" : "";  ?>> Male
                        <br /><input type="radio" name="gender" value="2" <?php echo ($row["user_gender"] == 2) ?  "checked" : "";  ?>> Other
                        <br /><br />
                    </div>
                    <div class="form-group text-right"><input type="submit" class="btn btn-primary" name="submit" value="Submit"></div>
                </form>
            </div>
        <?php
        }
        ?>

    </body>

</html>