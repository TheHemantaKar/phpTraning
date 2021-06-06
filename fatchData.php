<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>User Table </title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <?php
        include('dbconnection.php');

        $sql = "SELECT * FROM user_data ORDER BY user_id ASC";
        $result = $conn->query($sql);
        $i = 0;

        if ($result->num_rows >= 0) {
            echo " <div class='cointainer m-5'><h2>User Table Data</h2> <table class='table table-striped table-dark'><tr><th>SL No.</th><th>Name</th><th>Email</th><th>Website</th><th>Gender</th><th>Action</th></tr>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $i++;
                if ($row["user_gender"] == 0) {
                    $gender = "Female";
                } else if ($row["user_gender"] == 1) {
                    $gender = "Male";
                } else {
                    $gender = "Others";
                }

                echo '<tr><td> ' . $i . ' </td><td> ' . $row["user_name"] . ' </td><td> ' . $row["user_email"] . ' </td><td> ' . $row["user_website"] . ' </td><td>' . $gender . '</td><td><button type="button"  class="btn btn-success php_edit" ><a href="phpupdate.php?user_id=' . $row['user_id'] . ' " class="text-white text-decoration-none"> Edit</a></button> <button type="button" class="btn btn-warning php_delete"><a href="delete.php?user_id=' . $row['user_id'] . ' " class="text-dark text-decoration-none"> Delete </a></button></td></tr>';
            }
            echo "</table></div>";
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
        <script>
            $(document).on('click', '.php_edit', function() {
                var user_id = $(this).attr('user_id');
            });
        </script>
    </body>

</html>