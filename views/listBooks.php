<h2>Список всех книг</h2>

<?php if($data&&isset($data['messageFail'])){ ?>
    <p style="color:red"><?= $data['messageFail'];?></p>
<?php } elseif($data&&isset($data['messageSuccess'])) { ?>
    <p style="color:green"><?= $data['messageSuccess'];?></p>
<?php }?>

<?php //debug($data);?>

<?php use System\View;
try {
    View::render('topMenuAdmin');
}catch (\ErrorException $e) {
    echo 'Извините, произошла ошибка: ',  $e->getMessage(), ".\n";
}?>


<div>
    <?php if(count($data)>0){

        $i = 0;
        foreach ($data as $item): if (!is_array($item)){break;}?>
            <div>
                <span><?= ++$i; ?></span>
                <span>"<?= $item['title']; ?>"</span>
                <span><?= (isset($item['pages'])&&($item['pages'] != ""))?("| Количество страниц: ".$item['pages']):''; ?></span>
                <span><?= (isset($item['year'])&&($item['year'] != ""))?("| Год издания: ".$item['year']):''; ?></span>
                <span><?= (isset($item['price'])&&($item['price'] != ""))?("| Цена: ".$item['price']):''; ?></span>
                <form action='/book/edit' method='POST'>
                    <input type='hidden' name='id' value='<?= $item['id_book']; ?>'>
                    <p>
                        <input type='submit' name='button' value='Редактировать'>
                    </p>
                </form>
                <hr>
            </div>

            <br/>
    <?php endforeach;} else {?>
        <p>
            <span>В данный момент в магане НЕТ книг.</span>
        </p>
    <?php }?>

        <p>
            <a href='/book/create'>Создать новую книгу</a>
        </p>
</div>