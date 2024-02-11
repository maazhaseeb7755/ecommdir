<?php
//class.emailer.php
class EmailUtil { 
private $sender; 
private $recipients; 
private $subject; 
private $body; 
private $headers;

function __construct($sender) 
{ 
$this->sender = $sender; 
$this->recipients = array(); 
}

public function addRecipients($recipient) 
{
array_push($this->recipients, $recipient); 
}

public function setSubject($subject) 
{ 
$this->subject = $subject; 
} 

public function setBody($body) 
{ 
$this->body = $body; 
} 

public function setHeader($header) 
{ 
$this->headers = $header; 
} 
public function sendEmail() 
{ 

foreach ($this->recipients as $recipient) 
{ 
$result = mail($recipient, $this->subject, $this->body, $this->headers );
 if ($result) echo "Mail successfully sent to {$recipient}<br/>"; 
   
     }
  
   }
 
 }
 ?>
