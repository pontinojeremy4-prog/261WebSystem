<!-- crud/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
</head>
<body>
    <table>
        <form action="index.php" method="POST">
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
            <td><input type="submit" name="submit" onclick="return confirm('Are you sure you want to submit?');" value="Submit"></td>
        </tr>
        </form>
    </table>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "jpcs");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully";
    }

    if (isset($_POST['submit'])) {
        $code = mysqli_real_escape_string($conn, $_POST['code']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $insert_sql = "INSERT INTO school (code, description, address)
                        VALUES ('$code', '$description', '$address')";

        if (mysqli_query($conn, $insert_sql)) {
            echo "<p>Record added successfully.</p>";
        } else {
            echo "<p>Error adding record: " . mysqli_error($conn) . "</p>";
        }
    }

    $sql = "SELECT
                school.id,
                school.`code` as school_code,
                school.description as school_description,
                school.address as school_address
            FROM
                school
            ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Code</th>";
        echo "<th>Description</th>";
        echo "<th>Address</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_object($result)) {
            echo "<tr>";
            echo "<td>" . $row->id. "</td>";
            echo "<td>" . $row->school_code . "</td>";
            echo "<td>" . $row->school_description. "</td>";
            echo "<td>" . $row->school_address. "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>
</body>
</html>