<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Set email parameters
    $to = 'aravindsprint@gmail.com'; // Replace with your email address
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    // Compose the email
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Here are the details:\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // Log the email details for debugging
    error_log("Email details:\nTo: $to\nSubject: $subject\nHeaders: $headers\nBody: $email_body");

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo 'Email sent successfully.';
    } else {
        error_log('Failed to send email.');
        echo 'Failed to send email.';
    }
} else {
    echo 'Invalid request method.';
}
?>
