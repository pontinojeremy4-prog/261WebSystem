<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
</head>
<body>
    <?php
    include "connect.php";
    if(isset($_POST['id'])) {
    
    $sql ="SELECT * FROM school WHERE id = " . $_POST['id'];
    
        if(isset($_GET['search']) && !empty($_GET['search'])) {
            $sql .= " WHERE school.code LIKE '%" . $_GET['search']
                . "%' OR school.description LIKE '%"
                . $_GET['search'] . "%'";
        }
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
    ?>


    <table>
        <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <tr>
            <td>Enter Code:</td>
            <td><input type="text" name="code" placeholder="enter code" value="<?php echo isset($row['code']) ? $row['code'] : ''; ?>"></td>
        </tr>

        <tr>
            <td>Enter Description:</td>
            <td><input type="text" name="description" placeholder="enter description" value="<?php echo isset($row['description']) ? $row['description'] : ''; ?>"></td>
        </tr>

        <tr>
            <td>Enter Address:</td>
            <td><input type="text" name="address" placeholder="enter address" value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>"></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit"
                       name="subUpdate"
                       onclick="return confirm('Are you sure you want to update this record?');"
                       value="Update">
            </td>
        </tr>
        </form>
    </table>
<?php
    } else {
        echo "No records found to edit.";
    }
    ?>
</body>
</html>