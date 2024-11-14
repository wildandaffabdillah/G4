<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $name = htmlspecialchars(trim($_POST["name"]));
    $studentID = htmlspecialchars(trim($_POST["student_id"]));
    $major = htmlspecialchars(trim($_POST["major"]));
    $arrivalDate = htmlspecialchars(trim($_POST["arrival_date"]));
    $problemText = htmlspecialchars(trim($_POST["text"]));


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }


    $to = "dafkaihan10@gmail.com"; 

    $subject = "New Form Submission from $name";

    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Student ID: $studentID\n";
    $message .= "Major: $major\n";
    $message .= "Arrival Date: $arrivalDate\n";
    $message .= "Problem: $problemText\n";


    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";


    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {

    echo "Invalid request method.";
}
?>
