<?php
$servername = "localhost";
$username ="root";
$password ="";
$dbname="utilisateurs";

$conn= new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/", $password)){
    die("Le mot de passe doit contenir au moins 8 caractère, un chiffre et un caractère spécial.");
}

if ($password != $confirm_password){
    die("Les mots de passe ne correspondent pas.");
}

$sql = "INSERT INTO utilisateurs (first_name, last_name, email, password) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

if ($stmt->execute()){
    echo "Inscription réussie";
} else{
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>