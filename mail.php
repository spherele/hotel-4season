<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Здесь вы можете добавить логику обработки данных и отправки письма

    // Пример ответа сервера
    $response = "Ваша заявка успешно отправлена!";
    echo $response;
} else {
    // Возвращаем ошибку, если запрос не является POST
    http_response_code(400);
    echo "Ошибка: Неверный метод запроса.";
}
?>

