<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FirstName = $_POST["first_name"];
    $Surname = $_POST["last_name"];
    $Email = $_POST["email_address"];
    $Reason = $_POST["user_ques_type"];
    $Date = $_POST["date"];
    $Comment = $_POST["comments"];



    // Databas connection
    $conn = new mysqli("localhost", "root", "", "trinidex");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO submissions (FirstName, Surname, Email,Reason,Date,Comment)
        VALUES (?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("ssssss", $FirstName, $Surname, $Email,$Reason,$Date,$Comment);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Thank you for your message!";
        } else {
            echo "Error in registration: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>
