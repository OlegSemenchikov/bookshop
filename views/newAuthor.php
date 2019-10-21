<h2>Добавление нового автора</h2>

<?php use System\View;
try {
    View::render('topMenuAdmin');
}catch (\ErrorException $e) {
    echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
}?>

<?php if($data&&isset($data['message_fail'])){ ?>
    <p style="color:red"><?= $data['message_fail'];?></p>
<?php } elseif($data&&isset($data['message_success'])) { ?>
    <p style="color:green"><?= $data['message_success'];?></p>
<?php }?>

<form action='/author/create' method='POST'>
    <p>ФИО атора книги:<br />
        <input type='text' name='name' style='width:420px;'>
    </p>
    <p>
        <input type='submit' name='button' value='Добавить'>
    </p>
</form>
