<h2>Добавление нового автора</h2>

<?php use System\View;
try {
    View::render('topMenuAdmin');
}catch (\ErrorException $e) {
    echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
}?>

<?php if($data&&isset($data['messageFail'])){ ?>
    <p style="color:red"><?= $data['messageFail'];?></p>
<?php } elseif($data&&isset($data['messageSuccess'])) { ?>
    <p style="color:green"><?= $data['messageSuccess'];?></p>
<?php }?>

<form action='/author/create' method='POST'>
    <p>Фамилия атора книги:<br />
        <input type='text' name='surname' style='width:420px;'>
    </p>
    <p>Имя атора книги:<br />
        <input type='text' name='name' style='width:420px;'>
    </p>
    <p>Отчество атора книги:<br />
        <input type='text' name='patronymic' style='width:420px;'>
    </p>
    <p>
        <input type='submit' name='button' value='Добавить'>
    </p>
</form>
