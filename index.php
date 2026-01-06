<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="adicionar.php">Adicionar Usuário</a>

<br><br>

<table border="1" width="400">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($lista as $usuario): ?>
    <tr>
        <td><?= $usuario['id']; ?></td>
        <td><?= $usuario['nome']; ?></td>
        <td><?= $usuario['email']; ?></td>

        <td>
            <a href="editar.php?id=<?= $usuario['id']; ?>">[Editar]</a>
            <a href="excluir.php?id=<?= $usuario['id']; ?>" onclick="return confirm('Deseja apagar o usuário?')">[Excluir]</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
