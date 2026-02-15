<?php
include 'db.php';

if(isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $email, $mot_de_passe]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Utilisateur</title>
</head>
<body>
    <h1>Ajouter un utilisateur</h1>
    <form method="POST">
        Nom: <input type="text" name="nom" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Mot de passe: <input type="password" name="mot_de_passe" required><br><br>
        <input type="submit" name="submit" value="Ajouter">
    </form>
    <a href="index.php">Retour</a>
</body>
</html>