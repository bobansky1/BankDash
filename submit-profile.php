<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $dob = htmlspecialchars($_POST['dob']);
    $present_address = htmlspecialchars($_POST['present_address']);
    $permanent_address = htmlspecialchars($_POST['permanent_address']);
    $city = htmlspecialchars($_POST['city']);
    $postal_code = htmlspecialchars($_POST['postal_code']);
    $country = htmlspecialchars($_POST['country']);

    if (empty($name) || empty($username) || empty($email)) {
        echo "Please fill in all required fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Здесь можно подключить базу данных и сохранить данные
    try {
        $dsn = "mysql:host=localhost;dbname=your_db_name;charset=utf8";
        $pdo = new PDO($dsn, 'your_db_user', 'your_db_password');

        $sql = "INSERT INTO users (name, username, email, password, dob, present_address, permanent_address, city, postal_code, country)
                VALUES (:name, :username, :email, :password, :dob, :present_address, :permanent_address, :city, :postal_code, :country)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':dob' => $dob,
            ':present_address' => $present_address,
            ':permanent_address' => $permanent_address,
            ':city' => $city,
            ':postal_code' => $postal_code,
            ':country' => $country
        ]);

        echo "Profile saved successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
