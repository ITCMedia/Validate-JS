<?php
if (isset($_POST['name_fake'])) {$spam = $_POST['name_fake'];}
if (isset($_POST['page_url'])) {$pageCheck = $_POST['page_url'];}
if (empty($spam) && !empty($pageCheck)) 
{
	$headers .= "Content-type:text/html; charset = utf-8";
	$body = '';
	if(empty($_POST)) exit(); 
	foreach($_POST as $key => $value) {
		if($key == 'name') {
			$body .= "ФИО: ";
			$body .= strip_tags($value);
			$body .= "\n<br>"; 
		}		
		if($key == 'email') {
			$body .= "Электронная почта: ";
			$body .= strip_tags($value);
			$from .= strip_tags($value);
			$body .= "\n<br>";
		}	
		if($key == 'phone') {
			$body .= "Телефон: ";
			$body .= strip_tags($value);
			$body .= "\n<br>";
		}	
		if($key == 'form_type') {
			$body .= "Название формы: ";
			$body .= strip_tags($value);
			$body .= "\n<br>";
		}	
		if($key == 'page_url') {
			$body .= "Страница отправки сообщения: ";
			$body .= htmlspecialchars($value);
			$body .= "\n<br>";
		}	
	}
	if($from == ''){
		$from .= "admin@site.ru";
	} 
	mail ("byRonni3@yandex.ru", "Сообщение с формы на сайте - Имя_сайта", $body, $headers, "-f " . $from);
}
else{
	
}
?>