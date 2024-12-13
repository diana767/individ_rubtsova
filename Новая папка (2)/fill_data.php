<?php
session_start();
$conn = new mysqli('127.0.0.1', 'root', '', 'user_managements');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $info = $_POST['info'];
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("INSERT INTO data (user_id, info) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $info);
    $stmt->execute();
    echo "Данные успешно добавлены!";
}
?>

<h1>Заполнить данные</h1>
<form method="POST">
    Информация: <textarea name="info" required></textarea><br>
    <input type="submit" value="Отправить">
</form>