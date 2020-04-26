<?php
function IsInjected($str)
{
  $injections = array('(\n+)',
                      '(\r+)',
                      '(\t+)',
                      '(%0A+)',
                      '(%0D+)',
                      '(%08+)',
                      '(%09+)'
                      );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  
  if(pregj_match($inject,$str))
  {
    return true;
  }
  else
  {
    return false;
  }
}

  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];
  
  $email_from = 'nicolette@nicoletteweissermusic.com';
  $email_subject = "New Form submission";
  $email_body = "You have received a new message from the user $name ($visitor_email).\n".
                "Here is the new message:\n $message".
                

  if(IsInjected($visitor_email))
  {
    echo "Bad email value!";
    exit;
  }
  else
  {  
    $to = "nicolette@nicoletteweissermusic.com";   
    $headers = "From: $email_from \r\n";
    $headers .="Reply-To: $visitor_email \r\n";
    mail($to,$email_subject,$email_body,$headers)
  }
?>
