<?php

$query = 'UPDATE contacts set name = :name, phone = :phone, observations = :observations WHERE id = :id';
$stmt = $connection->prepare($query);
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':phone', $_POST['phone']);
$stmt->bindParam(':observations', $_POST['observations']);

try {
    $stmt->execute();
    $_SESSION['message'] = 'Contato atualizado com sucesso!';

    header("Location: $BASE_URL");
} catch (Exception $e) {
    $_SESSION['message'] = 'Error: ' . $e->getMessage();
}