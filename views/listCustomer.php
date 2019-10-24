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
                <?php foreach ($item as $k=>$v){
                    if($k == 'id_customer'){ continue;}
                        if(isset($v)&&($v != "")){?>
                        <span><?= ((($k == 'phone')&&($v != ""))?('тел.:'):'').$v; ?></span>
                <?php } }?>
                <form action='/customer/info' method='POST'>
                    <input type='hidden' name='id' value='<?= $item['id_customer']; ?>'>
                    <p>
                        <input type='submit' name='button' value='Подробнее'>
                    </p>
                </form>
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
