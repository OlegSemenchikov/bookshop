<h2>Добавление новой книги</h2>

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

<form action='/book/create' method='POST'>
    <p>Заголовок книги:<br />
        <input type='text' name='title' style='width:420px;'>
    </p>
    <p>Количество страниц:<br />
        <input type='text' name='pages' style='width:420px;'>
    </p>
    <p>Год издания книги:<br />
        <input type='text' name='year' style='width:420px;'>
    </p>
    <p>Стоимость книги:<br />
        <input type='text' name='price' style='width:420px;'>
    </p>
    <p>
        <input type='submit' name='button' value='Добавить'>
    </p>
</form>