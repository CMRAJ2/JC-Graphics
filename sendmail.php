<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];



$servername = "localhost";
$username = "id13364119_jcgraphics";
$password = "roomnog6BH1!";
$dbname = "id13364119_sendmail";

$conn = new mysqli($servername, $username, $password, $dbname);

$email_from = 'info@jcgraphics.com';
$email_subject = "New Form Submission";
$email_body = "Username: $name.\n" . "Email: $email.\n" . "Subject: $subject.\n" . "Message: $message.\n";
$to = "chandramohanraj2386@gmail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";
mail($to,$email_subject,$email_body,$headers);
header("Location: contact.html");

if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed: " . $conn->connect_error);
} else {
  $stmt = $conn->prepare("INSERT INTO jcgraphics_client(name, email, subject, message) values(?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $subject, $message);
  $execval = $stmt->execute();
  echo $execval;
  echo "Thank You for Contact Us.";
  $stmt->close();
  $conn->close();
}
?>