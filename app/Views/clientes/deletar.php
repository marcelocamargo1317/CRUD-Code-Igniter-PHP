<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/clientes/deletar" method="post">
    <?= csrf_field() ?>

    <label for="CPF">CPF</label>
    <textarea name="cpf" cols="45" rows="4"><?= set_value('cpf') ?></textarea>
    <br>
    <input type="submit" name="submit" value="Deletar cliente">
</form>