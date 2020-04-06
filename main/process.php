<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="form-group"><?php

                            session_start();
                            if ($_SESSION['username'] == "") {
                                header("Location:../logout.php");
                            }
                            $row = null;
                            $host = "localhost";
                            $user = "root";
                            $pass = "root";
                            $dbname =  $_SESSION['name'];
                            $cons = new mysqli($host, $user, $pass, $dbname);
                            // echo "Error";
                            $sql =   $_POST['hidden1'];
                            $result = $cons->query($sql);
                            if ($cons->query($sql)) {
                                $data  =  explode(" ", $sql);
                                if ($data[0] == "SELECT" || $data[0] == "Select" || $data[0] == "select") { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>CUST_CODE</th>
                            <th>CUST_NAME</th>
                            <th>CUST_CITY</th>
                            <th>CUST_COUNTRY</th>
                            <th>GRADE</th>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['CUST_CODE'] ?></td>
                                <td><?php echo $row['CUST_NAME'] ?></td>
                                <td><?php echo $row['CUST_CITY'] ?></td>
                                <td><?php echo $row['CUST_COUNTRY'] ?></td>
                                <td><?php echo $row['GRADE'] ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            <?php }
                                if ($data[0] == "UPDATE" || $data[0] == "Update" || $data[0] == "update") {
                                    echo "<h1>UPDATE SUCCESSES</h1>";
                                } ?>
        <?php
                            } else {
                                echo "<h1>Error</h1>";
                            }
        ?>
    </div>
</body>

</html>
<!-- for ($i = 1; $i < count($data); $i++) { -->
<!-- } -->