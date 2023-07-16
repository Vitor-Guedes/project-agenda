<?php

$query = 'INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)';
$stmt = $connection->prepare($query);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':phone', $_POST['phone']);
$stmt->bindParam(':observations', $_POST['observations']);

try {
    $stmt->execute();
    $_SESSION['message'] = 'Contato criado com sucesso!';

    header("Location: $BASE_URL");
} catch (Exception $e) {
    $_SESSION['message'] = 'Error: ' . $e->getMessage();
}