<?php 

    if (!array_key_exists('submitted', $_POST))
    {
        echo "Please fill out the form.";
    }
    else 
    {
        ini_set('SMTP', 'smtp.gmail.com');
        $to = 'zampetti22@gmail.com';
        $firstname = strip_tags(trim($_POST["FirstName"]));
        $lastname = strip_tags(trim($_POST["LastName"]));
        $message = trim($_POST["Message"]); 
        $subject = "New contact from $firstname $lastname"; 
        $from = strip_tags(trim($_POST["Email"]));
        $header = "From: " . $from . "\r\n";
        
        if(mail($to, $subject, $message, $header))
        {
            echo "Message sent.";
        }
        else
        {
            echo "Message not sent.";
        }
    }
    
?>