<h2>Редактирование книги<?= (isset($data['title']))?(': "'.$data['title'].'"'):'';?></h2>

<?php use System\View;
try {
    View::render('topMenuAdmin');
}catch (\ErrorException $e) {
    echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
}?>

<?php //debug($data);?>

<?php if($data&&isset($data['messageFail'])){ ?>
    <p style="color:red"><?= $data['messageFail'];?></p>
<?php } elseif($data&&isset($data['messageSuccess'])) { ?>
    <p style="color:green"><?= $data['messageSuccess'];?></p>
<?php }?>

<form action='/book/save' method='POST'>
    <p>Заголовок книги:<br />
        <input type='text' name='title' style='width:420px;' value='<?= (isset($data['title']))?($data['title']):'';?>'>
    </p>
    <p>Количество страниц:<br />
        <input type='text' name='pages' style='width:420px;' value='<?= (isset($data['pages']))?($data['pages']):'';?>'>
    </p>
    <p>Год издания книги:<br />
        <input type='text' name='year' style='width:420px;' value='<?= (isset($data['year']))?($data['year']):'';?>'>
    </p>
    <p>Стоимость книги:<br />
        <input type='text' name='price' style='width:420px;' value='<?= (isset($data['price']))?($data['price']):'';?>'>
    </p>
        <input type='hidden' name='id' value='<?= (isset($data['id_book']))?($data['id_book']):'';?>'>
    <p>
        <input type='submit' name='button' value='Сохранить'>
    </p>
</form>
