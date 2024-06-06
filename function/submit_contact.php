<?php
require 'db_connection.php';  // Database connection
require 'utilities.php';
require 'email_function.php';
require 'email_config.php';
require 'contact_function.php';

try {
    // Sanitize and validate form data
    $name = clean_input($_POST['name']);
    $email = validate_email($_POST['email']) ? $_POST['email'] : null;
    $subject = isset($_POST['subject']) ? clean_input($_POST['subject']) : null;
    $message = clean_input($_POST['message']);

    // Check if all required fields are filled
    if (!$name || !$email || !$message) {
        throw new Exception("All fields are required except subject.");
    }

    // SQL statement to insert data into contact table
    $sql = "INSERT INTO contact (name, email, subject, message) 
            VALUES (:name, :email, :subject, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':subject' => $subject,
        ':message' => $message
    ]);
    
    // Sending email to the company
    $to = COMPANY_EMAIL;
    $emailSubject = "New Contact Message: $subject";
    $emailMessage = "Dear Team,\n\n"
                  . "You have received a new message through the contact form on your website.\n\n"
                  . "From: $name\n"
                  . "Email: $email\n"
                  . "Subject: $subject\n"
                  . "Message:\n$message\n\n"
                  . "Please respond to the sender as soon as possible.\n\n"
                  . "Best regards,\n"
                  . "Your Website Contact Form";
    $headers = "From: $email\r\n";  // Include additional headers

    // Additional headers to prevent email from being marked as spam
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

    if (!sendEmail($to, $emailSubject, $emailMessage, $headers)) {
        throw new Exception("Failed to send email.");
    }

    // Redirect to a thank you page upon success
    header("Location: ../contact.html?success=true");
    exit();
} catch (PDOException $e) {
    // Database error handling
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    // Other error handling
    echo "Error: " . $e->getMessage();
}
?>
