<?php
header('Content-type: application/json; charset=utf-8');
date_default_timezone_set('UTC');
$message = '';
$email = '<укажите email>';

$f_id4213 = strip_tags($_POST['id4213']);
if ($f_id4213)
 $message .= "Ваш телефон или email: $f_id4213\n";

$f_id4214 = strip_tags($_POST['id4214']);
if ($f_id4214)
 $message .= "Ваш вопрос: $f_id4214\n";
  
$subject = "Сообщение с сайта";
if ($message)
{
	$un   = strtoupper(uniqid('id4212', true));
	$head = "From:<$email>\n";
	$head .= "Mime-Version: 1.0\n";
	$head .= "Content-Type:multipart/mixed;";
	$head .= "boundary=\"----------".$un."\"\n\n";

	$body = "------------".$un."\nContent-Type:text/plain; charset=\"utf-8\"\n";
	$body .= "Content-Transfer-Encoding: 8bit\n\n$message\n\n";
  $subj = '=?utf-8?B?'.base64_encode($subject).'?=';
  if (mail($email, $subj, $body, $head))
  	print('{"error": 0}');
  else
  	print('{"error": 1}');
//  	print('');
}
else 
	print('{"error": 2}');
?>