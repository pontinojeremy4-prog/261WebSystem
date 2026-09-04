<?php
include 'connect.php';
if (isset($_POST['submit'])) {
        $code = mysqli_real_escape_string($conn, $_POST['code']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $insert_sql = "INSERT INTO school (code, description, address)
                        VALUES ('$code', '$description', '$address')";

        if (mysqli_query($conn, $insert_sql)) {
            echo "<p>Record added successfully.</p>";
            header("Location: index.php");
        } else {
            echo "<p>Error adding record: " . mysqli_error($conn) . "</p>";
        }
    }

    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $delete_sql = "DELETE FROM school WHERE id = '$id'";

        if (mysqli_query($conn, $delete_sql)) {
            echo "<p>Record deleted successfully.</p>";
            header("Location: index.php"); 
        } else {
            echo "<p>Error deleting record: " . mysqli_error($conn) . "</p>";
        }
    }
?>