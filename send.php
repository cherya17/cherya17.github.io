<?php

if($_POST){ //Проверка отправилось ли наше поля name и не пустые ли они
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = 'education@profilaktika.agency';

    $subject = 'Обратная связь'; //Загаловок сообщения
    $body = '<html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$name.'</p>
                        <p>Почта: '.$email.'</p>
                        <p>Телефон: '.$phone.'</p>                 
                        <p>Сообщение: '.$message.'</p>                 
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
    $headers .= "From: Отправитель <from@example.com>\r\n"; //Наименование и почта отправителя
    mail($to, $subject, $body, $headers); //Отправка письма с помощью функции mail

    $dateMsg = date("d m o");
    $logMsg = "\n Имя: " . $name . "\n Почта: " . $email . "\n Телефон: " . $phone . "\n" . " Сообщение: " .$message . "\n" . " Дата: " . $dateMsg . "\n";
    $file = "logs.txt";
    $Saved_File = fopen($file, 'a+');
    fwrite($Saved_File, $logMsg);
    fclose($Saved_File);
}
