<html>
<head>
    <style>
        #table1 {
            width: 100%;
        }

        #table1 th, #table1, #table1 td {
            border: 1px solid blue;
            border-collapse: collapse;
        }

        td img {
            width: 100px;
            height: 100px;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
<?php
///database connection
try {
    ///trying to establish connection with the MySQL database server
    $conn = new PDO("mysql:host=localhost:3306;dbname=clickandcapture;", "root", "");
    ///setting errormode so that when error occurs it will give us an exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    ?>
    <script>
        window.alert("Database not connected");
    </script>
    <?php
}

/// data fetching
$userquery = "SELECT * FROM user";
$returnvalue = $conn->query($userquery);
///extracting only the table(2D array) from the return value
$table = $returnvalue->fetchAll();

///print_r($table);
?>

<table id="table1">
    <!--			showing the table headers 		-->
    <thead>
    <tr>
        <th>ID</th>
        <th>Photographer's Name</th>
        <th>Gallery</th>
        <th>Image</th>
        <th>Price</th>
        <th>project</th>
        <th>Upload Date</th>
    </tr>
    </thead>

    <tbody>
    <?php
    ///$table is a two dimensional array, first loop will return each row of the table
    for ($i = 0; $i < count($table); $i++) {
        $row = $table[$i];
        ?>

        <tr>
            <td><?php echo $row[0] ?></td>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
            <td><img src="<?php echo $row[3] ?>"></td>
            <td><?php echo $row[4] ?></td>
            <td><?php echo $row[5] ?></td>
            <td><?php echo $row[6] ?></td>
        </tr>

        <?php
    }

    ?>
    </tbody>
</table>


</body>
</html>