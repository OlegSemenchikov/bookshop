<h2>Добавление новой книги</h2>

<?php if($data&&isset($data['message_fail'])){ ?>
        <p style="color:red"><?= $data['message_fail'];?></p>
<?php } elseif($data&&isset($data['message_success'])) { ?>
        <p style="color:green"><?= $data['message_success'];?></p>
<?php }?>

<form action='/book/create' method='POST'>
    <p>Заголовок книги:<br />
        <input type='text' name='title' style='width:420px;'>
    </p>
    <p>
        <input type='submit' name='button' value='Добавить'>
    </p>
</form>