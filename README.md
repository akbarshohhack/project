<?php
function getUser($id) {
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }

    $conn->close();
}
try {
    // Kodni bajarish
    $user = getUser(1);
    if ($user) {
        echo "Foydalanuvchi: " . $user['name'];
    } else {
        throw new Exception("Foydalanuvchi topilmadi");
    }
} catch (Exception $e) {
    echo "Xatolik: " . $e->getMessage();
}
