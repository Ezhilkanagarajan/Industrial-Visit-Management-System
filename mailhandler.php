<?php 
if(isset($_POST['submit'])){
    $to = $_POST['email1']; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['name'];
    
    $subject = $_POST['subject'];
  
    $message = $_POST['message'];
    

    $headers = "From:" . $from;
    
    mail($to,$subject,$message,$headers);
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

