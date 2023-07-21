<?= component('header') ?>

<div class="container">
    <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') : ?>
        <p id="msg"> <?= $_SESSION['message'] ?> </p>
    <?php endif ; ?>
    <h1 id="main-title">Minha Agenda</h1>
    <?php if (count($contacts) > 0) : ?>
        <table class="table" id="contacts-table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col"></th>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <td scope="row"><?= $contact['id'] ?></td>
                        <td scope="row"><?= $contact['name'] ?></td>
                        <td scope="row"><?= $contact['phone'] ?></td>
                        <td scope="row">
                            <a href="<?= getBaseUrl() ?>/contact/<?= $contact['id'] ?>"><i class="fas fa-eye check-icon"></i></a>
                            <a href="<?= getBaseUrl() ?>/contact/edit/<?= $contact['id'] ?>"><i class="far fa-edit edit-icon"></i></a>
                            <form class="delete-form" action="<?= getBaseUrl() ?>/delete/<?= $contact['id'] ?>" method="post">
                                <button class="delete-btn" type="submit"><i class="fas fa-times delete-icon"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p id="empty-list-text">Ainda não existe contatos na sua agenda, <a href="<?= getBaseUrl()?>/create">Clique aqui para adicionar</a></p>
    <?php endif ; ?>
</div>

<?= component('footer') ?>