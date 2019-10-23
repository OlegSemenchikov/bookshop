<h2>Список всех авторов</h2>

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
                <span><?= $item['surname']; ?></span>
                <span><?= $item['name']; ?></span>
                <span><?= $item['patronymic']; ?></span>

                <?php if(isset($item['arrBooks'])){
                    $n = count($item['arrBooks']); ?>
                        <ol>Количество книг в магазине: <?= $n;?>
                            <?php foreach ($item['arrBooks'] as $val){ ?>
                                <li><?= '"'.$val['title'].'"';?><?php if(isset($val['year'])){ echo " | Год издания: ".$val['year'];}?></li>
                            <? } ?>
                        </ol>
                    <?php } ;?>

            </div>

            <br/>
        <?php endforeach;} else {?>
        <p>
            <span>В данный момент в магане НЕТ информации по авторам.</span>
        </p>
    <?php }?>

    <p>
        <a href='/author/create'>Добавить нового автора</a>
    </p>
</div>