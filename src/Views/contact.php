<?= component('header') ?>

<div class="container" id="view-contact-container">
    <?= component('back-btn') ?>
    <h1 id="main-title"> <?= $contact['name'] ?> </h1>
    <p class="bold">Telefone: </p>
    <p><?= $contact['phone'] ?></p>
    <p class="bold">Observações: </p>
    <p><?= $contact['observations'] ?></p>
</div>

<?= component('footer') ?>