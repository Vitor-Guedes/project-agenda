<?= component('header') ?>

<div class="container" >
    <?= component('back-btn') ?>
    <h1 id="main-title">Editar Contato</h1>
    <form id="create-form" action="<?= getBaseUrl() ?>/update/<?= $contact['id'] ?>" method="post">
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Nome do contato" required value="<?= $contact['name'] ?>">
        </div>
        <div class="form-group">
            <label for="phone">Telephone</label>
            <input class="form-control" type="text" name="phone" id="phone" placeholder="Teelefone do contato" required value="<?= $contact['phone'] ?>">
        </div>
        <div class="form-group">
            <label for="observations">Observações</label>
            <textarea name="observations" id="" cols="30" rows="5" class="form-control" placeholder="Digite uma observação"><?= $contact['observations'] ?></textarea>
        </div>
        <button class="btn btn-primary">Atualizar</button>
    </form>
</div>

<?= component('footer') ?>