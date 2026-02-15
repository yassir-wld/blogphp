<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE utilisateurs SET nom = ?, email = ? WHERE id = ?");
    $stmt->execute([$nom, $email, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Utilisateur</title>
</head>
<body>
    <h1>Modifier l'utilisateur</h1>
    <form method="POST">
        Nom: <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>
        <input type="submit" name="submit" value="Modifier">
    </form>
    <a href="index.php">Retour</a>
</body>
</html>