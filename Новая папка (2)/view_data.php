<?php
session_start();
$servername = "127.0.0.1"; // или ваш сервер
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "user_managements"; // замените на имя вашей базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM data");
?>

<h1>Просмотр данных</h1>
<table style="border-collapse: collapse; border: 1px solid black;">
    <tr style="border-bottom: 1px solid black;">
        <th style="padding: 5px;">ID</th>
        <th style="padding: 5px;">Информация</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr style="border-bottom: 1px solid black;">
            <td style="padding: 5px;"><?php echo $row['id']; ?></td>
            <td style="padding: 5px;"><?php echo $row['info']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<?php
$conn->close(); // Закрытие подключения к базе данных
?>