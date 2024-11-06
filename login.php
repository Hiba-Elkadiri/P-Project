<?php
session_start();
$loginError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email == "hibaelkadiri055@gmail.com" && $password == "Hiba1234") { 
        $_SESSION['user'] = $email; 
        header("Location: home.php"); 
        exit();
    } else {
        $loginError = "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here!</title>
    <style>
    
body {
    font-family: Arial, sans-serif;
    background-color: #f3f4f6;
    background-image: url('prjPhotos/p1.jpg');
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-image: linear-gradient(to right, #4caf50, #81c784);
}

.container {
    background-color: #ffffff;
    width: 100%;
    max-width: 400px;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

h1 {
    text-align: center;
    color: #333333;
    margin-bottom: 24px;
    font-size: 24px;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #4caf50;
    outline: none;
}

.error {
    color: red;
    font-size: 0.9em;
    text-align: left;
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: bold;
    color: white;
    background-color: #4caf50;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

a {
    color: #4caf50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
    color: #388e3c;
}


.container:hover {
    transform: scale(1.02);
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if ($loginError): ?>
            <p class="error"><?php echo $loginError; ?></p>
        <?php endif; ?>
        <form action="home.php" method="post">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            
            <button  name="submit" type="submit" class="signupbtn">Login</button>
        </form>
    </div>
</body>
</html>
