<?php
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM utilisateurs ORDER BY id DESC");
$stmt->execute();
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <a href="ajouter.php">Ajouter un utilisateur</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach($utilisateurs as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['nom']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
                <a href="modifier.php?id=<?= $user['id'] ?>">Modifier</a> | 
                <a href="supprimer.php?id=<?= $user['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>