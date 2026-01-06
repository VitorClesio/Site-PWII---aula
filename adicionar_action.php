<?php

require 'config.php';

$name = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0) {
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $name);
        $sql->bindParam(':email', $email);
        $sql->execute();
    
        header("Location: index.php");
        echo "Usuário adicionado com sucesso!";
    } else {
        header("Location: adicionar.php");
    }

}else {
    header("Location: adicionar.php");
}      
?>