<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
</head>
<body>

    <table>
        <form action="process.php" method="POST">
        <tr>
            <td>Enter Code:</td>
            <td><input type="text" name="code" placeholder="enter code"></td>
        </tr>

        <tr>
            <td>Enter Description:</td>
            <td><input type="text" name="description" placeholder="enter description"></td>
        </tr>

        <tr>
            <td>Enter Address:</td>
            <td><input type="text" name="address" placeholder="enter address"></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit"
                       name="submit"
                       onclick="return confirm('Are you sure you want to submit?');"
                       value="Submit">
            </td>
        </tr>
        </form>
    </table>


    
    <br>

    <form method="GET" action="index.php">

        <input type="text"
               name="search"
               placeholder="Search Code"
               value="<?php
                   if (isset($_GET['search'])) {
                       echo htmlspecialchars($_GET['search']);
                   }
               ?>">

        <input type="submit" value="Search">


        <a href="index.php">
            <button type="button">Show All</button>
        </a>

    </form>


    <?php

    include 'connect.php';

    
    $search = "";

    if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
    }


    $sql = "SELECT
                school.id,
                school.`code` as school_code,
                school.description as school_description,
                school.address as school_address
            FROM
                school";


    if ($search != "") {
        $sql .= " WHERE school.`code` LIKE '%$search%'";
    }


    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {

        echo "<table border='1'>";

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Code</th>";
        echo "<th>Description</th>";
        echo "<th>Address</th>";
        echo "<th>Action</th>";
        echo "</tr>";


        while ($row = mysqli_fetch_object($result)) {
            echo "<tr>";
            echo "<td>" . $row->id . "</td>";
            echo "<td>" . $row->school_code . "</td>";
            echo "<td>" . $row->school_description . "</td>";
            echo "<td>" . $row->school_address . "</td>";
            echo "<td>
                    <a href='process.php?action=delete&id=" . $row->id . "'
                       onclick=\"return confirm('Are you sure you want to delete this record?');\">
                       Delete
                    </a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>

</body>
</html>
