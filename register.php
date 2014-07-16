<?php
$dbhost = 'localhost:3036';
$dbuser = 'register';
$dbpass = 'register333';
$email_to = "uri@cuponza.co";
$email_subject = "new registration lead to cuponZa";
$email_from = $_POST['email']; // required
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if(!preg_match($email_exp,$email_from)) {
 
    echo "this email address doesn't seem right...";
        die();
  }
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = "INSERT INTO LEAD ".
       "(EMAIL,registration_date) ".
       "VALUES ( '$email_from',NOW() )";

mysql_select_db('cuponza');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die("You already registered with this email address, we'll keep you informed");
}
mysql_close($conn);
$headers = 'From: registration@cuponza.co'."\r\n". 
'Reply-To: '.$email_from."\r\n" . 
'X-Mailer: PHP/' . phpversion();
$email_message .= "New lead from: ".$email_from;
@mail($email_to, $email_subject, $email_message, $headers); 
$email_to = "felipe@cuponza.co";
@mail($email_to, $email_subject, $email_message, $headers); 
echo "ok";
?>