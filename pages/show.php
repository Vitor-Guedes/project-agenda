<?php 
    $stmt = $connection->prepare('SELECT * FROM contacts WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $contact = $stmt->fetch();
?>

<div class="container" id="view-contact-container">
    <?php require_once('../templates/backbtn.php') ?>
    <h1 id="main-title"> <?= $contact['name'] ?> </h1>
    <p class="bold">Telefone: </p>
    <p><?= $contact['phone'] ?></p>
    <p class="bold">Observações: </p>
    <p><?= $contact['observations'] ?></p>
</div>
