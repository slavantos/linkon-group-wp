<?php

$name = $_POST['name'];
$phone = $_POST['phone'];


$name = htmlspecialchars(stripslashes($name));
$phone = htmlspecialchars(stripslashes($phone));


if (mail($myEmail, "Заявка с веб-сайта Линкон групп", "Имя: " . $name . ";\nТелефон: " . $phone . ";\n\n--\nЭто сообщение было отправлено с веб-сайта " . $_SERVER['SERVER_NAME'] ." " . $_SERVER['HTTP_REFERER'] ,"From: Линкон групп   \r\n"))

?>