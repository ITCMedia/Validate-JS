<?php
if (isset($_POST['name_fake'])) {$spam = $_POST['name_fake'];}
if (isset($_POST['page_url'])) {$pageCheck = $_POST['page_url'];}
if (empty($spam) && !empty($pageCheck)) 
{
	$headers = "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "From: mail@site.ru <ВВЕСТИ НАЗВАНИЕ>\r\n"; // Ввести название и почту отправителя 
	$body = '';
	if(empty($_POST)) exit(); 
	foreach($_POST as $key => $value) {
		if($key == 'name') {
			$body .= "Имя: ";
			$body .= strip_tags($value);
			$body .= "\n<br>"; 
		}		
		if($key == 'surname') {
			$body .= "Фамилия: ";
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
		if($key == 'message') {
			$body .= "Сообщение: ";
			$body .= strip_tags($value);
			$body .= "\n<br>";
		}	
		if($key == 'profession') {
			$body .= "Профессия: ";
			$body .= strip_tags($value);
			$body .= "\n<br>";
		}	
		if($key == 'goods') {
			$body .= "Товар: ";
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
		if($_FILES['attached_file']['error'] == 0){
			$temp = $_FILES['attached_file']['tmp_name'];
			$uploaddir = '/home/k/kenai/zabota32.ru/public_html/attached_files/'; 
			$filename = $_FILES['attached_file']['name'];
			$name_file=md5(time());
			$name_file=substr($name_file,20);
			$name_file .= ".".substr(strrchr($filename,'.'), 1);
			if (move_uploaded_file($_FILES['attached_file']['tmp_name'], $uploaddir.$name_file)){
			$body .= "Прикрепленный файл: ";
				$body .= '<a href="http://zabota32.tmweb.ru/attached_files/'.$name_file.'">'.$name_file.'</a>';
				$body .= "\n<br>";
			$file = true;
			}
		}
	}

	
	mail ("post@site.ru", "Сообщение с формы на сайте - Забота 32", $body, $headers);
}
?>