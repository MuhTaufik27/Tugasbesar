<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "Tubes_prak");

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Proses saat form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Enkripsi password menggunakan MD5
    $hashed_password = md5($password);

    // Insert data ke database
    $sql = "INSERT INTO Registrasi (username, password, email) 
            VALUES ('$username', '$hashed_password', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Registrasi berhasil! Password disimpan dalam format MD5.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Tutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form method="POST" action="form_login.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
