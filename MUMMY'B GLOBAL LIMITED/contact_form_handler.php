<?php
// contact_form_handler.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set the email recipient (this can be your email address)
    $to = "your-email@example.com";
    
    // Set the email subject
    $subject = "New Contact Form Submission from $name";

    // Compose the email body
    $body = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <h2>Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong> $message</p>
    </body>
    </html>
    ";

    // Set content-type for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for reaching out! We'll get back to you shortly.";
    } else {
        echo "There was an error sending your message. Please try again.";
    }
}
?>
