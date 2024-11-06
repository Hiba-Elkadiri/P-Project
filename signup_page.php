<?php
session_start();
$errors = [];
$successMessage = "";

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["psw"];
    $password_repeat = $_POST["psw-repeat"];

    // Vérifications des champs
    if (empty($firstName)) {
        $errors['firstName'] = "Le prénom est requis.";
    }
    if (empty($lastName)) {
        $errors['lastName'] = "Le nom est requis.";
    }
    if (!preg_match("/@gmail\.com$/", $email)) {
        $errors['email'] = "L'email doit se terminer par '@gmail.com'.";
    }
    if (!preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password) || strlen($password) < 8) {
        $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères, incluant des lettres majuscules, minuscules et des chiffres.";
    }
    if ($password !== $password_repeat) {
        $errors['password_repeat'] = "Le mot de passe et le mot de passe de confirmation ne correspondent pas.";
    }

    // Si tout est correct
if (empty($errors)) {
    $_SESSION['user'] = $email; // Stockez l'email de l'utilisateur dans la session
    header("Location: login.php"); // Redirigez vers la page de connexion
    exit(); // Assurez-vous d'arrêter l'exécution du script
}

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Here!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(255, 255, 255, 0.9); /* Fond blanc avec transparence */
            display: flex;
            justify-content: center; /* Centre horizontalement */
            align-items: center; /* Centre verticalement */
            height: 100vh; /* Hauteur de la fenêtre */
            margin: 0;
            background-image: url('prjPhotos/p4.jpg');
        }


        .container {
    background: rgba(255, 255, 255, 0.8); /* Fond blanc avec transparence */
    background-image: url('prjPhotos/p4.jpg');
    border-radius: 10px; /* Arrondi des coins */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Ombre portée */
    padding: 40px; /* Espacement interne */
    max-width: 400px; /* Largeur maximale du conteneur */
    width: 100%; /* Largeur responsive */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transition pour effet de survol */
    opacity: 0; /* Initialement invisible pour l'animation d'entrée */
    animation: fadeIn 0.5s forwards; /* Animation d'entrée */
}

/* Animation d'entrée */
@keyframes fadeIn {
    from {
        opacity: 0; /* Commence transparent */
        transform: translateY(20px); /* Déplace vers le bas */
    }
    to {
        opacity: 1; /* Devient visible */
        transform: translateY(0); /* Rétablit la position */
    }
}

.container:hover {
    transform: scale(1.02); /* Agrandissement léger au survol */
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3); /* Ombre plus prononcée au survol */
}


        /* Styles pour les messages d'erreur et de succès */
        .error {
            color:red;
            font-size: 0.9em;
            text-align: left;
        }
        .success {
            color: green;
            text-align: center;
            font-size: 1.1em;
            margin-bottom: 10px;
        }

        /* Form header */
h1 {
  text-align: center;
  color: #333333;
}

p {
  text-align: center;
  color: #666666;
}

/* Input fields styling */
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 12px;
  margin: 8px 0 20px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-color: #007bff;
  outline: none;
}

/* Checkbox */
input[type="checkbox"] {
  margin-right: 10px;
}

/* Buttons styling */
button {
  width: 100%;
  padding: 12px;
  margin-top: 10px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Cancel button */
.cancelbtn {
  background-color: #f44336;
  color: white;
}

.cancelbtn:hover {
  background-color: #d32f2f;
  transform: translateY(-2px);
}

/* Signup button */
.signupbtn {
  background-color: #4CAF50;
  color: white;
}

.signupbtn:hover {
  background-color: #45a049;
  transform: translateY(-2px);
}

/* Links styling */
a {
  color: dodgerblue;
}

a:hover {
  text-decoration: underline;
}

/* Animation for input labels */
label {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
  opacity: 0;
  transform: translateY(-10px);
  transition: opacity 0.3s ease, transform 0.3s ease;
}

input:focus + label {
  opacity: 1;
  transform: translateY(0);
}

/* Checkbox text */
.container p {
  font-size: 12px;
  color: #555;
  text-align: center;
  margin-top: 20px;
}

/* Floating effect on hover */
.container:hover .signupbtn, .container:hover .cancelbtn {
  animation: float 1s ease infinite alternate;
}

@keyframes float {
  to {
    transform: translateY(-5px);
  }
}

/* Error and success message styling */
.error {
  color: red;
  text-align: center;
}

.success {
  color: green;
  text-align: center;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
      
        <?php if ($successMessage): ?>
            <p class="success"><?php echo $successMessage; ?></p>
        <?php endif; ?>
    
        <form action="" method="post" style="border:1px solid #ccc">
            <label for="firstName"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="firstName" required value="<?php echo htmlspecialchars($firstName ?? ''); ?>">
            <?php if (isset($errors['firstName'])): ?>
                <p class="error"><?php echo $errors['firstName']; ?></p>
            <?php endif; ?>
    
            <label for="lastName"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lastName" required value="<?php echo htmlspecialchars($lastName ?? ''); ?>">
            <?php if (isset($errors['lastName'])): ?>
                <p class="error"><?php echo $errors['lastName']; ?></p>
            <?php endif; ?>
    
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required value="<?php echo htmlspecialchars($email ?? ''); ?>">
            <?php if (isset($errors['email'])): ?>
                <p class="error"><?php echo $errors['email']; ?></p>
            <?php endif; ?>
    
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <?php if (isset($errors['password'])): ?>
                <p class="error"><?php echo $errors['password']; ?></p>
            <?php endif; ?>
    
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            <?php if (isset($errors['password_repeat'])): ?>
                <p class="error"><?php echo $errors['password_repeat']; ?></p>
            <?php endif; ?>
    
            <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me

            </label>
    
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    
            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button name="submit" type="submit" class="signupbtn">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>
