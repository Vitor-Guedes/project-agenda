<?php

$query = 'DELETE FROM contacts WHERE id = :id';
$stmt = $connection->prepare($query);
$stmt->bindParam(':id', $_POST['id']);

try {
    $stmt->execute();
    $_SESSION['message'] = 'Contato deletado com sucesso!';

    header("Location: $BASE_URL");
} catch (Exception $e) {
    $_SESSION['message'] = 'Error: ' . $e->getMessage();
}

?>