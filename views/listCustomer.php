<h2>Список всех покупателей</h2>

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
        foreach ($data as $item): ?>
            <div>
                <span><?= ++$i; ?></span>
                <span><?= $item['name']; ?></span>
            </div>

            <br/>
        <?php endforeach;} else {?>
        <p>
            <span>В данный момент в магане НЕТ информации по покупателям.</span>
        </p>
    <?php }?>

    <p>
        <a href='/customer/create'>Добавить нового покупателя</a>
    </p>
</div>
