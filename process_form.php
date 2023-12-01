<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data using $_POST superglobal
    $notes_5000 = $_POST["notes_5000"];
    $notes_1000 = $_POST["notes_1000"];
    $notes_500 = $_POST["notes_500"];
    $notes_100 = $_POST["notes_100"];
    $notes_50 = $_POST["notes_50"];
    $notes_20 = $_POST["notes_20"];
    $notes_10 = $_POST["notes_10"];
    $others = $_POST["others"];
    // Retrieve other input field values similarly using $_POST

    // You can perform additional validation or processing of the data here

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "notes_count";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the selected table (use the selected table name from the dropdown)
    $table_name = $_POST["insert_into"];
    $sql = "INSERT INTO $table_name (`Id`, `5000`, `1000`, `500`, `100`, `50`, `20`, `10`, `Others`) VALUES ('NULL','$notes_5000','$notes_1000','$notes_500','$notes_100','$notes_50','$notes_20','$notes_10','$others')";
    // Replace '...' with the rest of the column names

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect the user back to the form page or show an error message.
    echo "Form not submitted.";
}
?>