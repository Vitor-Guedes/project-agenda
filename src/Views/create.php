<?= component('header') ?>

<div class="container" >
    <?php component('back-btn') ?>
    <h1 id="main-title">Criar Contato</h1>
    <form id="create-form" action="<?= getBaseUrl() ?>/store" method="post">
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Nome do contato" required>
        </div>
        <div class="form-group">
            <label for="phone">Telephone</label>
            <input class="form-control" type="text" name="phone" id="phone" placeholder="Telefone do contato" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações</label>
            <textarea name="observations" id="" cols="30" rows="5" class="form-control" placeholder="Digite uma observação"></textarea>
        </div>
        <button class="btn btn-primary">Criar</button>
    </form>
</div>

<?= component('footer') ?>